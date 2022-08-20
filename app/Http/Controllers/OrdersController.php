<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');;
        $this->saveDataIntoFile('orders', $data);

        return response()->redirectToRoute('orders.create')
            ->setStatusCode(201);
    }
}
