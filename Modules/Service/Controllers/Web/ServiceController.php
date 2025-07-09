<?php

namespace Modules\Service\Controllers\Web;

use App\Constants\Statuses;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Modules\Blog\Models\Blog;
use Modules\Service\Models\Service;
use Modules\Doctor\Models\Doctor;
use Modules\Specificity\Models\Specificity;

class ServiceController extends Controller
{
    private $viewsPath = 'Service.Resources.views.';

    public function index($slug)
    {
        $service = Service::where('status', 2)
            ->whereHas('translations', function ($query) use($slug) {
            $query
                ->where('locale', app()->getLocale())
                ->where('slug', $slug);
        })->first();

        if (!$service)
            abort(404, 'Not Found');

        $specialties = Specificity::query()->select('specificities.*')
            ->when(request()->get('keyword'), function (Builder $query) {
                $word = request()->get('keyword');

                $query->join('specificity_translations', function (JoinClause $join) {
                    $join->on('specificity_translations.specificity_id', '=', 'specificities.id');
                });

                return $query->whereRaw("(specificity_translations.name like '%{$word}%') or specificities.id = '%{$word}%'");

            })->where('status', Statuses::ACTIVE)
            ->when(request()->get('services'), function (Builder $query) {
                return $query->where('specificities.service_id','=', request()->get('services'));
            })->where('service_id', $service->id)
            ->orderBy(request()->get('sort', 'specificities.created_at'), request()->get('direction', 'DESC'))
            ->orderBy('specificities.id', request()->get('direction', 'DESC'))
            ->with('translations')
            ->paginate(12);

        $doctors = Doctor::with('translations')->where('status', Statuses::ACTIVE)->inRandomOrder()->limit(30)->get();

        $articles = Blog::with('translations')->where('status', Statuses::ACTIVE)->limit(6)->orderBy('created_at', 'DESC')->get();

        return view($this->viewsPath . 'web.index', compact('service','doctors', 'articles', 'specialties'));
    }

    public function details($slug)
    {
        $service = Specificity::join('specificity_translations', function (JoinClause $join) {
            $join->on('specificity_translations.specificity_id', '=', 'specificities.id');
        })->where('specificity_translations.slug', $slug)->first();

        $service =  Specificity::find($service->specificity_id);

        $specialtiesByServices = Specificity::where('service_id', $service->service_id)->where('status', Statuses::ACTIVE)->get()->take(4);

        $articles = Blog::with('translations')->where('status', Statuses::ACTIVE)->limit(6)->orderBy('created_at', 'DESC')->get();

        return view($this->viewsPath.'web.details', compact('service','specialtiesByServices', 'articles'));
    }
}
