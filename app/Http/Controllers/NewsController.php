<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', $this->getAllNews());
    }

    public function show(int $id)
    {
        return view('news.show', $this->getNewsById($id));
    }

    public function category(string $category)
    {
        return view('news.index', $this->getNewsByCategory($category));
    }
}
