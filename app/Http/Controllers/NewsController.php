<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', [
            'news' => News::getAll(),
        ]);
    }

    public function show(int $id)
    {
        return view('news.show', [
            'news' => News::getById($id),
        ]);
    }

    public function category(string $category)
    {
        return view('news.index', [
            'news' => News::getByCategory($category),
            'category' => $category,
        ]);
    }
}
