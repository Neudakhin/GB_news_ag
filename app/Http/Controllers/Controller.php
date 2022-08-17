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

        for ($i = 1; $i <= 5; $i++) {
            $category[$i] = $faker->word();

        }

        return  [
            'categories' => $category
        ];
    }

    public function getNewsById(int $id)
    {
        $faker = Factory::create();

        $news = [
            'title' => $faker->jobTitle(),
            'author' => $faker->userName(),
            'text' => $faker->text(300),
            'created_at' => now()->format('d.m.Y H:i:s'),
        ];

        return [
            'news' => $news,
        ];
    }

    public function getNewsByCategory(string $category)
    {
        $faker = Factory::create();

        for ($j = 1; $j <= 4; $j++) {
            $news[$j] = [
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'text' => $faker->text(70),
                'created_at' => now()->format('d.m.Y H:i:s'),
            ];
        }

        return [
                'news' => $news,
                'category' => $category
            ];
    }

    public function getAllNews()
    {
        $faker = Factory::create();

        for ($j = 1; $j <= 10; $j++) {
            $news[$j] = [
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'text' => $faker->text(70),
                'created_at' => now()->format('d.m.Y H:i:s'),
            ];
        }

        return [
            'news' => $news,
        ];
    }
}
