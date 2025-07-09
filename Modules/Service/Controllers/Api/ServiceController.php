<?php

namespace Modules\Service\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Service\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Modules\Specificity\Models\Specificity;
use App\Constants\Statuses;
class ServiceController extends Controller
{
    public function index(Request $request)
    {
            $users = Service::query()
                ->select('services.*')
                ->when($request->get('q'), function (Builder $query) {
                    $word = request()->get('q');

                    return $query->whereRaw("(services.name like '%{$word}%')");
                })
                ->orderBy(request()->get('sort', 'services.created_at'), request()->get('direction', 'DESC'))
                ->orderBy('services.id', request()->get('direction', 'DESC'))
                ->paginate(10);

        return response()->json($users);
    }

    public function listSpecificitiesByServices($lang, $service)
    {
        $services = Service::where('status', Statuses::ACTIVE)->where('id',$service)->has('specialities')->first();
        $specialities = Specificity::where('status', Statuses::ACTIVE)->where('service_id',$service)->get();
        return response()->json(['specialities' => $specialities,'services' => $services]);
    }

}
