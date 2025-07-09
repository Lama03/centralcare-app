<?php

namespace Modules\Offer\Controllers\Admin;

use App\Constants\Statuses;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\JoinClause;
use App\Http\Services\UploaderService;
use Modules\Offer\Models\Offer;
use Modules\Offer\Models\OfferBranche;
use Illuminate\Http\Request;
use Modules\Service\Models\Service;
use PhpParser\Comment\Doc;
use Modules\Offer\Http\Requests\OfferStoreRequest;
use Modules\Offer\Http\Requests\OfferUpdateRequest;

class OfferController extends Controller
{
    /**
     * @var UploaderService
     */
    private $uploaderService;

    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    private $viewsPath = 'Offer.Resources.views.';

    public function index()
    {
        return view($this->viewsPath.'index');
    }


    public function create()
    {
        $currentLocale = config('app.locale');
        $services = Service::where('status', Statuses::ACTIVE)->listsTranslations('name')->get();

        $branches = OfferBranche::where('status', Statuses::ACTIVE)->listsTranslations('name')->get();

        return view($this->viewsPath.'create', compact('services','branches'));
    }

    public function store(OfferStoreRequest $request) {

        $discount = settings()->get('discount.percentage.offers') ? settings()->get('discount.percentage.offers') : '';
        $price = $request->request->get('price');
        if($discount){
            $price = ((int)$price - ((int)$price * (int)$discount / 100));
        }
        $offer = new Offer();
        $offer->fill($request->request->all());

        if ($request->hasFile('image') ) {
            $offer->image = $this->uploaderService->upload($request->file("image"), "offers");
        }

        if ($request->hasFile('slider_image') ) {
            $offer->slider_image = $this->uploaderService->upload($request->file("slider_image"), "offers");
        }
        if($discount){
            $offer->discount = (int)$discount;
            $offer->price_after_discount = $price;
        }

        $offer->save();

        return redirect()->route('admin.offers.index')->with(['success' => 'Updated Successfully']);
    }


    public function edit(Offer $offer)
    {
        $currentLocale = config('app.locale');
        $services = Service::where('status', Statuses::ACTIVE)->listsTranslations('name')->get();

        $branches = OfferBranche::where('status', Statuses::ACTIVE)->listsTranslations('name')->get();
        return view($this->viewsPath.'edit', ['form' => $offer, 'services' => $services ,'branches' => $branches]);
    }


    public function update(Offer $offer, OfferUpdateRequest $request) {

        $offer->fill($request->request->all());

        if ($request->hasFile('image') ) {
            $offer->image = $this->uploaderService->upload($request->file("image"), "offers");
        }

        if ($request->hasFile('slider_image') ) {
            $offer->slider_image = $this->uploaderService->upload($request->file("slider_image"), "offers");
        }

        $offer->save();

        return redirect()->route('admin.offers.index')->with(['success' => 'Updated Successfully']);
    }

    public function enable(Offer $offer, Request $request) {
        $offer->status = Statuses::ACTIVE;
        $offer->save();

        return redirect()->route('admin.offers.index')->with(['success' => 'Updated Successfully']);
    }

    public function disable(Offer $offer, Request $request) {
        $offer->status = Statuses::DISABLED;
        $offer->save();

        return redirect()->route('admin.offers.index')->with(['success' => 'Updated Successfully']);
    }
}

