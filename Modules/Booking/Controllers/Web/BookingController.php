<?php

namespace Modules\Booking\Controllers\Web;

use App\Constants\Statuses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Database\Eloquent\Builder;
use Modules\Booking\Models\Booking;
use Modules\Branche\Models\Branche;
use Modules\Doctor\Models\Doctor;
use Modules\Specificity\Models\Specificity;
use Modules\Service\Models\Service;
use Modules\Country\Models\Country;
use Illuminate\Support\Facades\Redirect;
use Session;
use Validator;
class BookingController extends Controller
{
    private $viewsPath = 'Booking.Resources.views.';

    public function index()
    {
        $request = request();

        $doctors = Doctor::with('translations')->where('status', Statuses::ACTIVE)->get();
        $specialities = Specificity::with('translations')->where('status', Statuses::ACTIVE)->get();
        $branches = Branche::with('translations')->where('status', Statuses::ACTIVE)->get();
        $services = Service::with('translations')->where('status', Statuses::ACTIVE)->whereIn('type_of_place',[1,3])->get();
        $countries = Country::has('branche')->with('translations')->get();

        $serviceId = request()->get('service') ? request()->get('service') : 2 ;

        // dd(request()->speciality);

        if ($serviceId) {
            $servicesFirst = Service::find($serviceId);
            $branche = request()->get('branche') ? request()->get('branche') :'';
            if($branche){
                request()->request->set('branche', request()->get('branche'));
            }
            $branches = Branche::with('translations')->where('status', Statuses::ACTIVE)
            ->when($serviceId, function (Builder $query, $serviceId) {
                $query->join('branche_services', 'branche_services.branche_id', '=', 'branches.id');
                return $query->where('branche_services.service_id','=', $serviceId);
            })
            ->get();

            $specialities = Specificity::with('translations')->where('status', Statuses::ACTIVE)->where('service_id',$serviceId)->get();
            // dd($specialities);

            $doctorId = request()->get('doctor') ? request()->get('doctor') :'';
            $specificity = request()->get('speciality') ? request()->get('speciality') :'';

            if($specificity){
                $GetspecificityId = Specificity::find($specificity);
                //Doctors
                $DoctorsID  = $GetspecificityId->doctors->pluck('id');
                $doctors = Doctor::with('translations')->where('status', Statuses::ACTIVE)->whereIn('id',$DoctorsID)->get();
            }

            $GetdoctorId = '';
            if($doctorId){
                $GetdoctorId = Doctor::find($doctorId);
                //Specialities
                if($specificity){
                    $specialitID  = $GetdoctorId->specificities->pluck('id');
                    $specialities = Specificity::with('translations')->where('status', Statuses::ACTIVE)->whereIn('id',$specialitID)->get();
                    request()->request->set('speciality', request()->get('speciality'));
                }else{
                    $specialitID  = $GetdoctorId->specificities->pluck('id');
                    $specialities = Specificity::with('translations')->where('status', Statuses::ACTIVE)->whereIn('id',$specialitID)->get();
                }
            }
        }
        return view($this->viewsPath . 'web.index', compact('services','servicesFirst','countries','specialities', 'doctors','GetdoctorId', 'branches','request'));
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
            'doctor_id' => 'required|numeric|min:1',
            'speciality' => 'required|numeric|min:1',
        ];

        $Validator = Validator::make($request->all(),$criteria);
        if ($Validator->fails()) {
            Session::flash('error',__('messages.All required data must be entered'));
            return Redirect::back()->withInput($request->all());
        } else {

            try{

                $availability =  $this->validateAvailableBooking($request);

                if (!$availability) {

                    return Redirect::to('book-an-appointment'. '/?availability='. 1 . ( app()->getLocale() != 'ar' ? ( '&lang=' . app()->getLocale()) : ''))->withInput($request->all());;
                }

                $booking = new Booking();
                $booking->fill($request->request->all());
                $booking->speciality_id = $request->request->get('speciality');
                $availableTime = $request->request->get('available_time');
                $availableTime = str_replace("-",':',$availableTime);
                $attendance_date = now();
                #$attendance_date = ( $request->request->get('attendance_date') ?? now() ) .' '. \Carbon\Carbon::parse($availableTime)->format('H:i');
                $booking->attendance_date = $attendance_date;
                $booking->save();

                Session::flash('success',__('messages.Your booking has been sent successfully'));
                if(Session::get('locale') == 'en'){
                   return redirect()->route('web.bookings.confirm', ['id' => $booking->id ,'lang' => Session::get('locale')]);
                } else {
                    return redirect()->route('web.bookings.confirm', ['id' => $booking->id]);
                }
            }catch (\Exception $ex) {

                Session::flash('error',__('messages.There is an error please make sure to fill in all the required data'));

               return Redirect::back()->withInput($request->all());
            }
        }
    }

    public function confirm($id)
    {
        $booking = Booking::find($id);

        return view($this->viewsPath . 'web.confirm', ['booking' => $booking]);
    }

    public function validateAvailableBooking(Request $request)
    {
        $availableTime = $request->request->get('available_time');

        $availableTime = str_replace("-",':',$availableTime);

        $attendance_date = $request->request->get('attendance_date') .' '. \Carbon\Carbon::parse($availableTime)->format('H:i');

        $existBooking = Booking::selectRaw('bookings.*')
            ->where('branche_id' , '=', $request->request->get('branche_id'))
            ->where('doctor_id' , '=', $request->request->get('doctor_id'))
            ->where('attendance_date' , '=' , $attendance_date)
            ->first();

        return $availability = $existBooking ? 0 : 1 ;
    }
    public function validateKsaPhone(Request $request)
    {
        $phone = $request->request->get('phone');

        return preg_match('/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/', $phone); // return true

    }
}
