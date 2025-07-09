<?php

namespace Modules\News\Controllers\Admin;

use App\Constants\Statuses;
use App\Http\Controllers\Controller;
use App\Http\Services\UploaderService;
use Illuminate\Database\Query\JoinClause;
use Modules\News\Models\NewsCategory;
use Modules\News\Models\News;
use Illuminate\Http\Request;
use Modules\News\Http\Requests\NewsUpdateRequest;
use Modules\News\Http\Requests\NewsStoreRequest;

class NewsController extends Controller
{
    private $viewsPath = 'News.Resources.views.';

    /**
     * @var UploaderService
     */
    private $uploaderService;

    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function index()
    {
        return view($this->viewsPath.'index');
    }

    public function create()
    {
        $currentLocale = config('app.locale');
        $categories = NewsCategory::listsTranslations('name')->get();

        return view($this->viewsPath.'create', compact('categories'));
    }

    public function store(NewsStoreRequest $request) {

        $news = new News();
        $news->fill($request->request->all());

        if ($request->hasFile('image')) {
            $news->image = $this->uploaderService->upload($request->file("image"), "news");
        }

        $news->save();
        return redirect()->route('admin.news.index')->with(['success' => 'Updated Successfully']);
    }

    public function edit(News $News)
    {
        $currentLocale = config('app.locale');
        $categories = NewsCategory::listsTranslations('name')->get();

        return view($this->viewsPath.'edit',['form' => $News,
            'categories' => $categories
            ]);
    }

    public function update(News $news, NewsUpdateRequest $request) {

        $news->fill($request->all());

        if ($request->hasFile('image')) {
            $news->image = $this->uploaderService->upload($request->file("image"), "news");
        }
        $news->save();

        return redirect()->route('admin.news.index')->with(['success' => 'Updated Successfully']);
    }


    public function enable(News $news, Request $request)
    {
        $news->status = Statuses::ACTIVE;
        $news->save();

        return redirect()->route('admin.news.index')->with(['success' => 'Updated Successfully']);
    }

    public function disable(News $news, Request $request)
    {
        $news->status = Statuses::DISABLED;
        $news->save();

        return redirect()->route('admin.news.index')->with(['success' => 'Updated Successfully']);
    }
}

