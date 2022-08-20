<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index()
    {
        return view('reviews.index');
    }

    public function create(array $message = null)
    {
        return view('reviews.create', [$message]);
    }


    public function store(Request $request)
    {
        $data = $request->except('_token');
        $this->saveDataIntoFile('reviews', $data);

        return response()->redirectToRoute('reviews.create')
            ->setStatusCode(201);
    }
}
