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
        $categories = [];

        for ($i = 1; $i <= 5; $i++) {
            $categories[$i] = $faker->word();

        }

        return  [
            'categories' => $categories
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
                'categories' => $category
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

    public function saveDataIntoFile(string $filename, array $data)
    {
        $path = storage_path($filename . '.txt');
        (bool)file_put_contents($path, implode('; ', $data) . PHP_EOL, FILE_APPEND);
    }

}
