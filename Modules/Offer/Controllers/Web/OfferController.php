<?php

namespace Modules\Offer\Controllers\Web;


use App\Constants\Statuses;
use App\Constants\BookingStatuses;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Modules\Offer\Models\Offer;
use Modules\Offer\Models\OfferBranche;
use Modules\Offer\Models\OfferBooking;
use Modules\Offer\Models\OfferBrancheTranslation;
use Modules\Service\Models\Service;
use Illuminate\Support\Facades\Redirect;
use Session;
use Validator;

class OfferController extends Controller
{
    private $viewsPath = 'Offer.Resources.views.';

    public function index(Request $request)
    {

        $Alloffers = Offer::query()->select('offers.*')->where('status', Statuses::ACTIVE)
            ->when(request(), function (Builder $query) {
                $word = request()->get('keyword');
                $lang = request()->get('lang') ? request()->get('lang') : 'ar';
                $query->join('offer_translations', function (JoinClause $join) {
                    $join->on('offer_translations.offer_id', '=', 'offers.id');
                })->where('offer_translations.locale', $lang);
                if($word){
                    return $query->whereRaw("(offer_translations.name like '%{$word}%')");
                }

            })
            ->orderBy(request()->get('sort', 'offers.created_at'), request()->get('direction', 'DESC'))
            ->orderBy('offers.id', request()->get('direction', 'DESC'))
        ->paginate(12);

        return view($this->viewsPath . 'web.index', compact('Alloffers'));
    }

    public function lists($slug ,Request $request)
    {
        $lang = $request->lang? $request->lang: 'ar';
        $offers = OfferBranche::join('offer_branche_translations', function (JoinClause $join) {
            $join->on('offer_branche_translations.offer_branche_id', '=', 'offer_branches.id');
        })->where('offer_branche_translations.locale', $lang)
            ->where('offer_branche_translations.slug', $slug)->first();

        $offers =  OfferBranche::find($offers->offer_branche_id);


        $servicesbar = Service::where('status', Statuses::ACTIVE)->whereIn('type_of_place',[2,3])->get();

        //get Auther Slug
        $offerSlug = OfferBrancheTranslation::select('slug')->where('locale','!=',$lang)->where('offer_branche_id',$offers->id)->first();

        //Get Offers

        $Alloffers = Offer::query()->select('offers.*')->where('status', Statuses::ACTIVE)
            ->where('branche_id', $offers->id)
            ->when($request->get('services'), function (Builder $query) {
                return $query->where('offers.service_id','=', request()->get('services'));
            })
            ->orderBy(request()->get('sort', 'offers.created_at'), request()->get('direction', 'DESC'))
            ->orderBy('offers.id', request()->get('direction', 'DESC'))
            ->get();

        return view($this->viewsPath.'web.lists', compact('offers','offerSlug','request','servicesbar','Alloffers'));
    }

    public function bookoffer($id ,Request $request)
    {
        $offer       = Offer::find($id);
        $allOffer    = Offer::where('status', Statuses::ACTIVE)->get();

        return view($this->viewsPath.'web.book', compact('offer','allOffer'));
    }

    public function store(Request $request)
    {
        $criteria = [
            'name' => 'required',
            'phone' => 'required|numeric|min:10',
            'email' => 'required|email',
            #'attendance_date' => 'required|date_format:Y-m-d',
            #'available_time' => 'required',
            #'date_of_birth' => 'required|date_format:Y-m-d',
            'offer_id' => 'required|numeric|min:1',
            'type_pay' => 'required',
        ];

        $Validator = Validator::make($request->all(),$criteria);
        if ($Validator->fails()) {
            Session::flash('error',__('messages.All required data must be entered'));
            return Redirect::back()->withInput($request->all());
        } else {

            try{

                $offerBooking = new OfferBooking();
                $offerBooking->fill($request->request->all());
                $attendance_date = date('Y-m-d',strtotime($request->request->get('attendance_date')));
                $offerBooking->attendance_date = $attendance_date;
                $offerBooking->order_reference = $this->generateUniqueCode();
                $offerBooking->type_pay = $request->request->get('type_pay');
                $offerBooking->save();


                if($offerBooking->type_pay == "Pay online"){

                   return redirect()->route('web.bookings.payment', app()->getLocale() == 'en' ? ['referal_code' => $offerBooking->order_reference,'lang' => Session::get('locale') ] : ['referal_code' => $offerBooking->order_reference]);

                } else {
                    Session::flash('success',__('messages.Your booking has been sent successfully'));
                    return redirect()->route('web.offers.thanks', app()->getLocale() == 'en' ? ['lang' => Session::get('locale')] : '');
                }
            }catch (\Exception $ex) {

                dd($ex);

                Session::flash('error',__('messages.There is an error please make sure to fill in all the required data'));
                return Redirect::back()->withInput($request->all());

            }
        }

    }

    /**

     * Write referal_code on Method

     *

     * @return response()

     */

    public function generateUniqueCode()

    {
        do {

            $referal_code = random_int(100000, 999999);

        } while (OfferBooking::where("order_reference", "=", $referal_code)->first());

        return $referal_code;

    }


    public function payment($referal_code)
    {
        $booking = OfferBooking::where('order_reference', "=", $referal_code)->first();
        if(Session::get('locale') == 'en'){
            $returnUrl = url('/').'/page/offer-thanks'.'/'.'?lang='.Session::get('locale').'';
        } else {
            $returnUrl = url('/').'/page/offer-thanks';
        }

        if($booking->offer->discount > 0){

           $price =  $booking->offer->price_after_discount;
        } else {
           $price =  $booking->offer->price;
        }

        $replace = ['(' , ')' ,'+'];
        $OfferName = str_replace($replace, ' ', $booking->offer->name);

        $requestParams = array(
            'command' => 'PURCHASE',
            'access_code' => env('PAYFORT_ACCESS_CODE'),
            'merchant_identifier' => env('PAYFORT_MERCHANT_IDENTIFIER'),
            'merchant_reference' => $booking->order_reference,
            'amount' => $price * 100,
            'currency' => env('PAYFORT_CURRENCY'),
            'language' => Session::get('locale'),
            'customer_email' => $booking->email,
            'signature' => $this->generatesignatureCode($booking->order_reference,$price * 100,$booking->email,$OfferName),
            'order_description' => $OfferName,
            'return_url' => $returnUrl,
            );

        $redirectUrl = 'https://checkout.payfort.com/FortAPI/paymentPage';

        return view('web.home.payment', ['redirectUrl' => $redirectUrl ,'requestParams' => $requestParams]);
    }

    /**

     * Write referal_code on Method

     *

     * @return response()

     */

    public function generatesignatureCode($reference,$price,$email,$name)
    {
        if(Session::get('locale') == 'en'){
            $returnUrl = url('/').'/page/offer-thanks'.'/'.'?lang='.Session::get('locale').'';
        } else {
            $returnUrl = url('/').'/page/offer-thanks';
        }

        $shaString  = '';
        // array request
        $arrData    = array(
        'command'             => 'PURCHASE',
        'access_code'         => env('PAYFORT_ACCESS_CODE'),
        'merchant_identifier' => env('PAYFORT_MERCHANT_IDENTIFIER'),
        'merchant_reference'  => $reference,
        'amount'              => $price,
        'currency'            => env('PAYFORT_CURRENCY'),
        'language'            => Session::get('locale'),
        'customer_email'      => $email,
        'order_description'   => $name,
        'return_url'          => $returnUrl,
        );
        // sort an array by key
        ksort($arrData);
        foreach ($arrData as $key => $value) {
            $shaString .= "$key=$value";
        }

        // make sure to fill your sha request pass phrase
        $shaString = env('PAYFORT_SHA_REQUEST_PHRASE') . $shaString . env('PAYFORT_SHA_REQUEST_PHRASE');
        $signature = hash('SHA256', $shaString);

        return $signature;


    }

    public function thanks(Request $request)
    {
        if($request->merchant_reference) {

              $booking = OfferBooking::where('order_reference', "=", $request->merchant_reference)->first();

            if($request->response_message == "Success" || $request->response_message == "عملية ناجحة" || $request->status == "14"){

                $booking->status = BookingStatuses::CONFIRMED;
                $booking->notes  = $request->response_message ? $request->response_message : 'عملية ناجحة';
                $booking->save();

            } else {

                $booking->status = BookingStatuses::NOT_CONFIRMED;
                $booking->notes  = $request->response_message ? $request->response_message : 'عملية فاشلة';
                $booking->save();
            }

        }

        return view($this->viewsPath . 'web.thanks');
    }

    //===================TermsAndCondition==================

    public function terms()
    {
        return view($this->viewsPath.'web.terms');
    }

}
