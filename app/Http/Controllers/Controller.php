<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCategories()
    {
        $faker = Factory::create();
        $category = [];

        for ($i = 0; $i < 5; $i++) {
            $category[] = $faker->word();

        }

        return $category;
    }

    public function getNews(string $category, int $id = null)
    {
        $faker = Factory::create();

        if($id) {
            $news = [
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'text' => $faker->text(100),
                'created_at' => now()->format('d.m.Y H:i:s'),
            ];

            return [
                'news' => $news,
            ];

        } else {
            for ($j = 1; $j <= 4; $j++) {
                $news[$j] = [
                    'title' => $faker->jobTitle(),
                    'author' => $faker->userName(),
                    'text' => $faker->text(100),
                    'created_at' => now()->format('d.m.Y H:i:s'),
                ];
            }

        return [
                'news' => $news,
                'category' => $category
            ];
        }
    }
}
