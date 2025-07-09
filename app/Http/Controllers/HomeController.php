<?php

namespace App\Http\Controllers;

use App\Constants\Statuses;
use Illuminate\Http\Request;
use Modules\Blog\Models\Blog;
use Modules\Doctor\Models\Doctor;
use Modules\Partner\Models\Partner;
use Modules\Service\Models\Service;
use Modules\Branche\Models\Branche;
use Modules\Specificity\Models\Specificity;
use Modules\Slider\Models\Slider;
use Modules\Specificity\Models\Category;
use Modules\Testimonial\Models\Testimonial;
use Modules\Country\Models\Country;
use Modules\Ticket\Constants\TicketPurpose;
use Modules\Ticket\Models\Ticket;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Collection;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {

        $categories = Category::query()->with('translations')->where('status', Statuses::ACTIVE)->get();
        $sliders = Slider::query()->with('translations')->get();
        $doctors = Doctor::query()->with('translations')->where('status', Statuses::ACTIVE)->inRandomOrder()->limit(30)->get();
        $testimonials = Testimonial::query()->with('translations')->where('status', Statuses::ACTIVE)->get();
        $partners = Partner::get();
        $articles = Blog::query()->with('translations')->where('status', Statuses::ACTIVE)->orderBy('id','desc')->inRandomOrder()->limit(9)->get();
        $services = Service::query()->with('translations')->where('status', Statuses::ACTIVE)->whereIn('type_of_place',[1,3])->get();
        $countries = Country::query()->with('translations')->has('branche')->get();

        return view('web.home.index', compact('categories', 'doctors', 'partners', 'articles', 'sliders', 'testimonials', 'services','countries'));
    }

    public function subscribe(Request $request)
    {
        $criteria = [
            'phone' => 'required',
        ];

        $request->validate($criteria);
        try {
            $lead = new Ticket();
            $lead->purpose = TicketPurpose::SUBSCRIBTON;
            $lead->name = "N/A";
            $lead->email = "N/A";
            $lead->topic = "SUBSCRIPTION";
            $lead->content = "SUBSCRIPTION";

            $lead->fill($request->request->all());
            $lead->save();
        } catch (\Exception $exception) {
        }

        Session::flash('success',__('messages.Your phone was sent successfully'));
        return redirect()->route('web.home.index', app()->getLocale() == 'en' ? ['lang' => Session::get('locale')] : '');
    }

    public function search(Request $request)
    {
        $articles = Blog::query()->select('blogs.*')
                ->when(request(), function (Builder $query) {
                    $word = request()->get('keyword');
                    $lang = request()->get('lang') ? request()->get('lang') : 'ar';
                    $query->join('blog_translations', function (JoinClause $join) {
                        $join->on('blog_translations.blog_id', '=', 'blogs.id');
                    })->where('blog_translations.locale', $lang);

                    return $query->whereRaw("(blog_translations.name like '%{$word}%') or blog_translations.content like '%{$word}%'");

                })->where('status', Statuses::ACTIVE)
                ->orderBy('blogs.created_at','DESC')
                ->groupBy('blogs.id')
                ->paginate(6);

        $doctors = Doctor::query()->select('doctors.*')
                ->when(request(), function (Builder $query) {
                    $word = request()->get('keyword');
                    $lang = request()->get('lang') ? request()->get('lang') : 'ar';
                    $query->join('doctor_translations', function (JoinClause $join) {
                        $join->on('doctor_translations.doctor_id', '=', 'doctors.id');
                    })->where('doctor_translations.locale', $lang);

                    return $query->whereRaw("(doctor_translations.name like '%{$word}%') or doctor_translations.description like '%{$word}%'");

                })->where('status', Statuses::ACTIVE)
                ->orderBy('doctors.created_at','DESC')
                ->groupBy('doctors.id')
                ->paginate(6);

        $services = Specificity::query()->select('specificities.*')
                ->when(request(), function (Builder $query) {
                    $word = request()->get('keyword');
                    $lang = request()->get('lang') ? request()->get('lang') : 'ar';
                    $query->join('specificity_translations', function (JoinClause $join) {
                        $join->on('specificity_translations.specificity_id', '=', 'specificities.id');
                    })->where('specificity_translations.locale', $lang);

                    return $query->whereRaw("(specificity_translations.name like '%{$word}%') or specificity_translations.description like '%{$word}%'");

                })->where('status', Statuses::ACTIVE)
                ->orderBy('specificities.created_at','DESC')
                ->groupBy('specificities.id')
                ->paginate(6);

        $CountRezult = count($articles) + count($doctors) + count($services);    

        return view('web.home.search', compact('articles','doctors','services','request','CountRezult'));
    }
}
