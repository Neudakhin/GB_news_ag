<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    public const DRAFT = 'DRAFT';
    public const ACTIVE = 'ACTIVE';
    public const DISABLED = 'DISABLED';

    public static function getAll()
    {
        return DB::table('news')
            ->get();
    }

    public static function getById(int $id)
    {
        return DB::table('news')
            ->where('id', '=', $id)
            ->first();
    }

    public static function getByCategory(string $category)
    {
        return DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->where('categories.title', '=', $category)
            ->select('news.*')
            ->get();
    }
}
