<?php

namespace Modules\News\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Query\JoinClause;
use Modules\News\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::query()
            ->select('news.*')
            ->when($request->get('q'), function (Builder $query) {
                $word = request()->get('q');
                $query->join('news_translations', function (JoinClause $join) {
                    $join->on('news_translations.blog_id', '=', 'news.id');
                });

                return $query->whereRaw("(news_translations.name like '%{$word}%') or news.id = '%{$word}%'");
            })
            ->orderBy('news.'.request()->get('sort', 'created_at'), request()->get('direction', 'DESC'))
            ->orderBy('news.id', request()->get('direction', 'DESC'))
            ->with('category')
            ->paginate(10);

        return response()->json($news);
    }
}
