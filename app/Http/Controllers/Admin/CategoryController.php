<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\CreateRequest;
use App\Http\Requests\Admin\Categories\EditRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index',  [
            'categories' => Category::query()
                ->paginate(config('pagination.admin.categories')),
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CreateRequest $request)
    {
        $category = (new Category())->fill($request->validated());

        if ($category->save()) {
            return redirect()->route('admin.categories.index')
                ->setStatusCode(201)
                ->with([
                    'type' => 'success',
                    'message' => __('messages.admin.categories.create.success'),
                ]);
        }
        return back()->with([
                'type' => 'danger',
                'message' => __('messages.admin.categories.create.fail'),
            ]);

    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditRequest $request, Category $category)
    {
        $category->fill($request->validated());

        if ($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with([
                    'type' => 'success',
                    'message' => __('messages.admin.categories.update.success'),
                ]);
        }

        return back()->with([
            'type' => 'danger',
            'message' => __('messages.admin.categories.update.fail'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        if ($category->delete()) {
            return redirect()->route('admin.categories.index')
                ->with([
                    'type' => 'success',
                    'message' => __('messages.admin.categories.destroy.success'),
                ]);
        }

        return back()->with([
            'type' => 'danger',
            'message' => __('messages.admin.categories.destroy.fail'),
        ]);
    }
}
