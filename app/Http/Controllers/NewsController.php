<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(string $category)
    {
        return view('news.index', $this->getNews($category));
    }

    public function show(string $category, int $id)
    {
        return view('news.show', $this->getNews($category, $id));
    }
}
