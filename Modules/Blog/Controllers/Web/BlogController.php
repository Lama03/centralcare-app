<?php

namespace Modules\Blog\Controllers\Web;

use App\Constants\Statuses;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Modules\Blog\Models\Blog;
use Modules\Blog\Models\BlogCategory;
use Modules\Comment\Constants\CommentStatus;
use Modules\Comment\Models\Comment;
use Modules\Country\Models\Country;
use Modules\Service\Models\Service;
use Modules\Blog\Models\BlogTranslation;
use Modules\Blog\Models\BlogCategoryTranslation;
use Session;
class BlogController extends Controller
{
    private $viewsPath = 'Blog.Resources.views.';

    public function index()
    {
        $articles = Blog::query()->select('blogs.*')->where('status', Statuses::ACTIVE)
                         ->when(request(), function ($query) {
                        $word = request()->get('keyword');
                        $lang = request()->get('lang') ? request()->get('lang') : 'ar';
                        $query->join('blog_translations', function (JoinClause $join) {
                            $join->on('blog_translations.blog_id', '=', 'blogs.id');
                        })->where('blog_translations.locale', $lang);
                        if($word){
                            return $query->whereRaw("(blog_translations.name like '%{$word}%')");
                        }

                        if (request()->get('category')) {
                            return  $query->where('category_id', request()->get('category'));
                        }
                    })->paginate(6);         

        $categories = BlogCategory::get();
        return view($this->viewsPath.'web.index', compact('articles', 'categories'));
    }

    public function category($slug)
    {
        $articlecat = BlogCategory::join('blog_category_translations', function (JoinClause $join) {
            $join->on('blog_category_translations.blog_category_id', '=', 'blog_categories.id');
        })->where('blog_category_translations.locale', app()->getLocale())
            ->where('blog_category_translations.slug', $slug)->first();

        if (!$articlecat) {
            abort(404, 'Not Found');
        }

        $articlecat =  BlogCategory::find($articlecat->blog_category_id);

        $blogSlug = BlogCategoryTranslation::select('slug')->where('locale', '!=', app()->getLocale())->where('blog_category_id',$articlecat->id)->first();

        $articles = Blog::where('status', Statuses::ACTIVE)->orderBy('id','desc')->where('category_id', $articlecat->id)->paginate(6);

        return view($this->viewsPath.'web.category', compact('articles','articlecat','blogSlug'));
    }

    public function details($slug)
    {
        $article = Blog::join('blog_translations', function (JoinClause $join) {
            $join->on('blog_translations.blog_id', '=', 'blogs.id');
        })->where('blog_translations.locale', app()->getLocale())
            ->where('blog_translations.slug', $slug)->first();

        if (!$article) {
            abort(404, 'Not Found');
        }

        $article =  Blog::find($article->blog_id);

        $relatedArticles = Blog::where('status', Statuses::ACTIVE)
            ->where('category_id', $article->category_id)
            ->orderBy('id','desc')
            ->limit(9)
            ->get();

        $comments = Comment::where('status', CommentStatus::APPROVED)->where('blog_id', $article->id)->get();

        $blogSlug = BlogTranslation::select('slug')->where('locale','!=', app()->getLocale())->where('blog_id', $article->id)->first();

        $services = Service::query()->where('status', Statuses::ACTIVE)->whereIn('type_of_place',[1,3])->get();

        $countries = Country::has('branche')->get();

        return view($this->viewsPath.'web.details', compact('article', 'relatedArticles', 'comments','blogSlug','services','countries'));
    }

    public function comment(Request $request) {
        $criteria = [
            'commenter' => 'required',
            'email' => 'required',
            'content' => 'required',
            'phone' => 'required',
        ];

        $request->validate($criteria);
        $comment = new Comment();
        $comment->fill($request->request->all());

        $comment->save();
        Session::flash('success',__('messages.Your comment added'));
        return redirect()->back();
            
    }

}
