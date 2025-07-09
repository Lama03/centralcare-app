<?php

namespace Modules\News\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Query\JoinClause;
use Modules\News\Models\NewsCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = NewsCategory::query()
            ->distinct()
            ->select('news_categories.*')
            ->when($request->get('q'), function (Builder $query) {
                $word = request()->get('q');
                $query->join('news_categories_translation', function (JoinClause $join) {
                    $join->on('news_categories_translation.category_id', '=', 'news_categories.id');
                });

                return $query->whereRaw("(news_categories_translation.name like '%{$word}%') or news_categories.id = '%{$word}%'");
            })
            ->orderBy(request()->get('sort', 'news_categories.created_at'), request()->get('direction', 'DESC'))
            ->orderBy('news_categories.id', request()->get('direction', 'DESC'))
            ->paginate(10);

        return response()->json($categories);
    }
}
