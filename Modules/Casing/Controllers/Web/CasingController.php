<?php

namespace Modules\Casing\Controllers\Web;

use App\Constants\Statuses;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Modules\Casing\Models\Casing;
use Modules\Casing\Models\CasingCategory;
use Modules\Comment\Constants\CommentStatus;
use Modules\Comment\Models\Comment;
use Modules\Blog\Models\Blog;
use Modules\Doctor\Models\Doctor;
class CasingController extends Controller
{
    private $viewsPath = 'Casing.Resources.views.';

    public function index(Request $request)
    {
        $cases = Casing::where('status', Statuses::ACTIVE)
        ->when(request(), function (Builder $query) {
            $word = request()->get('keyword');
            $lang = request()->get('lang') ? request()->get('lang') : 'ar';
            $query->join('doctor_translations', function (JoinClause $join) {
                $join->on('doctor_translations.doctor_id', '=', 'casings.doctor_id');
            })->where('doctor_translations.locale', $lang);
            if($word){
                return $query->whereRaw("(doctor_translations.name like '%{$word}%')");
            }

        })->when($request->get('doctor'), function (Builder $query) {
            return $query->where('casings.doctor_id','=', request()->get('doctor'));
        }) ;

        $cases = $cases->paginate(6);
        $categories = CasingCategory::get();

        $articles = Blog::where('status', Statuses::ACTIVE)->orderBy('created_at','DESC')->inRandomOrder()->limit(9)->get();
        $Doctors = Doctor::where('status', Statuses::ACTIVE)->get();
        return view($this->viewsPath.'web.index', compact('cases', 'categories','articles','Doctors','request'));
    }
}