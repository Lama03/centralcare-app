<?php

namespace Modules\Specificity\Controllers\Api;

use App\Constants\Statuses;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\JoinClause;
use Modules\Doctor\Models\Doctor;
use Modules\Specificity\Models\Specificity;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class SpecificityController extends Controller
{
    public function index(Request $request)
    {
        $users = Specificity::query()
            ->select('specificities.*')
            ->join('services', 'services.id', '=', 'specificities.service_id')
            ->when($request->get('q'), function (Builder $query) {
                $word = request()->get('q');
                $query->join('specificity_translations', function (JoinClause $join) {
                    $join->on('specificity_translations.specificity_id', '=', 'specificities.id');
                });

                return $query->whereRaw("(specificity_translations.name like '%{$word}%') or specificities.id = '%{$word}%'");
            })
            ->orderBy('specificities.'.request()->get('sort', 'created_at'), request()->get('direction', 'DESC'))
            ->orderBy('specificities.id', request()->get('direction', 'DESC'))
            ->with('service')
            ->paginate(10);

        return response()->json($users);
    }

    public function show($lang, $specificity, Request $request)
    {
        $specificity = Specificity::find($specificity);

        return response()->json($specificity);
    }

    public function listDoctorsBySpecialty($lang, $service,$specificity, Request $request)
    {
        $doctors = Doctor::where('status', Statuses::ACTIVE)->where('specialty_id',$service)
            ->when($specificity, function (Builder $query, $specificity) {
                $query->join('doctor_specificities', 'doctor_specificities.doctor_id', '=', 'doctors.id');
                return $query->where('doctor_specificities.specificity_id','=', $specificity);
            })
            ->get();

        return response()->json(['doctors' => $doctors]);
    }
}
