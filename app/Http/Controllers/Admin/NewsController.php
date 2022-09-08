<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\CreateRequest;
use App\Http\Requests\Admin\News\EditRequest;
use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index', [
            'news' => News::query()
                ->paginate(config('pagination.admin.news')),
        ]);
    }

    public function create()
    {
        return view('admin.news.create', [
            'categories' => Category::all(),
            'statuses' => News::STATUSES,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function store(CreateRequest $request)
    {
        $news = (new News)->fill($request->validated());

        if ($news->save()) {
            return redirect()->route('admin.news.index')
                ->setStatusCode(201)
                ->with([
                    'type' => 'success',
                    'message' => __('messages.admin.news.create.success'),
                ]);
        }
        return back()->with([
            'type' => 'danger',
            'message' => __('messages.admin.news.create.fail'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => Category::all(),
            'statuses' => News::STATUSES,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param News $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditRequest $request, News $news)
    {
        $news->fill($request->validated());

        if ($news->save()) {
            return redirect()->route('admin.news.index')
                ->with([
                    'type' => 'success',
                    'message' => __('messages.admin.news.update.success'),
                ]);
        }
        return back()->with([
            'type' => 'danger',
            'message' => __('messages.admin.news.update.fail'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(News $news)
    {
        if ($news->delete()) {
            return redirect()->route('admin.news.index')
                ->with([
                    'type' => 'success',
                    'message' => __('messages.admin.news.destroy.success'),
                ]);
        }
        return back()->with([
            'type' => 'danger',
            'message' => __('messages.admin.news.destroy.fail'),
        ]);
    }
}
