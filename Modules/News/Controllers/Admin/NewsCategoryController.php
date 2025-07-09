<?php

namespace Modules\News\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\News\Models\NewsCategory;
use Illuminate\Http\Request;
use Modules\News\Http\Requests\CategoryStoreRequest;
use Modules\News\Http\Requests\CategoryUpdateRequest;

class NewsCategoryController extends Controller
{
    private $viewsPath = 'News.Resources.views.Category.';

    public function index()
    {
        return view($this->viewsPath.'index');
    }

    public function create()
    {
        return view($this->viewsPath.'create');
    }

    public function store(CategoryStoreRequest $request)
    {
        $category = new NewsCategory();
        $category->fill($request->except('_method', '_token'));
        $category->save();

        return redirect()->route('admin.news-categories.index')->with(['success' => 'Updated Successfully']);
    }

    public function edit(NewsCategory $newsCategory)
    {
        return view($this->viewsPath.'edit',['form' => $newsCategory]);
    }

    public function update(NewsCategory $newsCategory, CategoryUpdateRequest $request) {

        $newsCategory->fill($request->except('_method', '_token'));
        $newsCategory->save();

        return redirect()->route('admin.news-categories.index')->with(['success' => 'Updated Successfully']);
    }
}

