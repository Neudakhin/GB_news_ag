<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Orders\CreateRequest;
use App\Http\Requests\Admin\Orders\EditRequest;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.orders.index', [
            'orders' => Order::query()
                ->paginate(config('pagination.admin.orders'))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $order = (new Order)->fill($request->validated());

        if ($order->save()) {
            return redirect()->route('admin.orders.index')
                ->setStatusCode(201)
                ->with([
                    'type' => 'success',
                    'message' => __('messages.admin.orders.create.success'),
                ]);
        }
        return back()->with([
            'type' => 'danger',
            'message' => __('messages.admin.orders.create.fail'),
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param Order $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit', [
            'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditRequest $request, Order $order)
    {
        $order->fill($request->validated());

        if ($order->save()) {
            return redirect()->route('admin.orders.index')
                ->with([
                    'type' => 'success',
                    'message' => __('messages.admin.orders.update.success'),
                ]);
        }

        return back()->with([
            'type' => 'danger',
            'message' => __('messages.admin.orders.update.fail'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Order $order)
    {
        if ($order->delete()) {
            return redirect()->route('admin.orders.index')
                ->with([
                    'type' => 'success',
                    'message' => __('messages.admin.orders.destroy.success'),
                ]);
        }

        return back()->with([
            'type' => 'danger',
            'message' => __('messages.admin.orders.destroy.fail'),
        ]);
    }
}
