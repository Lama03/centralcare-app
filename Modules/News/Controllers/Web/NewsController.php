<?php

namespace Modules\News\Controllers\Web;

use App\Constants\Statuses;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Modules\Blog\Models\Blog;
use Modules\News\Models\News;
use Modules\News\Models\NewsCategory;
use Modules\Comment\Constants\CommentStatus;
use Modules\Comment\Models\Comment;
use Modules\Country\Models\Country;
use Modules\Service\Models\Service;
use Modules\News\Models\NewsTranslation;
use Modules\News\Models\NewsCategoryTranslation;
use Session;

class NewsController extends Controller
{
    private $viewsPath = 'News.Resources.views.';

    public function index()
    {
        $articles = News::query()->select('news.*')->where('status', Statuses::ACTIVE)
                         ->when(request(), function ($query) {
                        $word = request()->get('keyword');
                        $lang = request()->get('lang') ? request()->get('lang') : 'ar';
                        $query->join('news_translations', function (JoinClause $join) {
                            $join->on('news_translations.news_id', '=', 'news.id');
                        })->where('news_translations.locale', $lang);
                        if($word){
                            return $query->whereRaw("(news_translations.name like '%{$word}%')");
                        }

                        if (request()->get('category')) {
                            return  $query->where('category_id', request()->get('category'));
                        }
                    })->paginate(6);

        $categories = NewsCategory::get();

        return view($this->viewsPath.'web.index', compact('articles', 'categories'));
    }

    public function category($slug)
    {
        $articlecat = NewsCategory::join('news_category_translations', function (JoinClause $join) {
            $join->on('news_category_translations.news_category_id', '=', 'news_categories.id');
        })->where('news_category_translations.locale', app()->getLocale())
            ->where('news_category_translations.slug', $slug)->first();

        if (!$articlecat) {
            abort(404, 'Not Found');
        }

        $articlecat =  NewsCategory::find($articlecat->news_category_id);

        $newsSlug = NewsCategoryTranslation::select('slug')->where('locale', '!=', app()->getLocale())->where('news_category_id',$articlecat->id)->first();

        $articles = News::where('status', Statuses::ACTIVE)->orderBy('id','desc')->where('category_id', $articlecat->id)->paginate(6);

        return view($this->viewsPath.'web.category', compact('articles','articlecat','newsSlug'));
    }

    public function  details($slug)
    {
        $news = News::join('news_translations', function (JoinClause $join) {
            $join->on('news_translations.news_id', '=', 'news.id');
        })->where('news_translations.locale', app()->getLocale())
            ->where('news_translations.slug', $slug)->first();

        if (!$news) {
            abort(404, 'Not Found');
        }

        $news = News::find($news->news_id);

        $relatedNews = News::where('status', Statuses::ACTIVE)
            ->where('category_id', $news->category_id)
            ->orderBy('id','desc')
            ->limit(9)
            ->get();

        $newsSlug = NewsTranslation::select('slug')->where('locale','!=', app()->getLocale())->where('news_id', $news->id)->first();

        $articles =  Blog::orderBy('id','desc')->limit(9)->get();

        return view($this->viewsPath.'web.details', compact('news', 'relatedNews', 'newsSlug', 'articles'));
    }
}
