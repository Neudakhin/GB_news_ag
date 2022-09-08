<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Eloquent\Builder;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', [
            'news' => News::query()
                ->paginate(config('pagination.news')),
        ]);
    }

    public function show(int $id)
    {
        return view('news.show', [
            'news' => News::query()->findOrFail($id),
        ]);
    }

    public function category(int $id)
    {
        return view('news.index', [
            'news' => News::query()
                ->whereHas('category', function (Builder $query) use ($id) {
                    $query->where('id', '=', $id);
                })->paginate(config('pagination.news')),
            'category' => Category::query()->find($id),
        ]);
    }
}
