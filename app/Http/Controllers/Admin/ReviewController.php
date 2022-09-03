<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Reviews\CreateRequest;
use App\Http\Requests\Admin\Reviews\EditRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.reviews.index', [
            'reviews' => Review::query()
                ->paginate(config('pagination.admin.reviews'))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $review = (new Review)->fill($request->validated());

        if ($review->save()) {
            return redirect()->route('admin.reviews.index')
                ->setStatusCode(201)
                ->with([
                    'type' => 'success',
                    'message' => __('messages.admin.reviews.create.success'),
                ]);
        }
        return back()->with([
            'type' => 'danger',
            'message' => __('messages.admin.reviews.create.fail'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Review $review)
    {
        return view('admin.reviews.edit', [
            'review' => $review
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Review $review
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditRequest $request, Review $review)
    {
        $review->fill($request->validated());

        if ($review->save()) {
            return redirect()->route('admin.reviews.index')
                ->with([
                    'type' => 'success',
                    'message' => __('messages.admin.reviews.update.success'),
                ]);
        }
        return back()->with([
            'type' => 'danger',
            'message' => __('messages.admin.reviews.update.fail'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Review $review)
    {
        if ($review->delete()) {
            return redirect()->route('admin.reviews.index')
                ->with([
                    'type' => 'success',
                    'message' => __('messages.admin.reviews.destroy.success'),
                ]);
        }
        return back()->with([
            'type' => 'danger',
            'message' => __('messages.admin.reviews.destroy.fail'),
        ]);
    }
}
