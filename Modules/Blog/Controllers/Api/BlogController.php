<?php

namespace Modules\Blog\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Query\JoinClause;
use Modules\Blog\Models\Blog;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $users = Blog::query()
            ->select('blogs.*')
            ->when($request->get('q'), function (Builder $query) {
                $word = request()->get('q');
                $query->join('blog_translations', function (JoinClause $join) {
                    $join->on('blog_translations.blog_id', '=', 'blogs.id');
                })->where('blog_translations.locale', 'ar');

                return $query->whereRaw("(blog_translations.name like '%{$word}%') or blogs.id = '%{$word}%'");
            })
            ->orderBy('blogs.'.request()->get('sort', 'created_at'), request()->get('direction', 'DESC'))
            ->orderBy('blogs.id', request()->get('direction', 'DESC'))
            ->with('category')
            ->groupBy('blogs.id')
            ->paginate(10);

        return response()->json($users);
    }
}
