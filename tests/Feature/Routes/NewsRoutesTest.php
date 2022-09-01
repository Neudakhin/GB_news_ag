<?php

namespace Tests\Feature\Routes;

use App\Models\Category;
use App\Models\News;
use Database\Seeders\CategorySeeder;
use Database\Seeders\NewsSeeder;
use Database\Seeders\SourceSeeder;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsRoutesTest extends TestCase
{
    use RefreshDatabase;

    private $faker;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->faker = Factory::create();
    }

    public function testIndex()
    {
        $this->seed([
            SourceSeeder::class,
            CategorySeeder::class,
            NewsSeeder::class,
        ]);

        $response = $this->get('/news');

        $response->assertStatus(200)
            ->assertViewIs('news.index')
            ->assertViewHasAll([
                'news'
            ]);
    }

    public function testShow()
    {
        $this->seed([
            SourceSeeder::class,
            CategorySeeder::class,
            NewsSeeder::class,
        ]);

        $newsId = News::query()->first()->id;

        $response = $this->get("/news/{$newsId}");

        $response->assertStatus(200)
            ->assertViewIs('news.show')
            ->assertViewHasAll([
                'news'
            ]);
    }

    public function testCategory()
    {
        $this->seed([
            SourceSeeder::class,
            CategorySeeder::class,
            NewsSeeder::class,
        ]);

        $categoryId = Category::query()->first()->id;

        $response = $this->get("/news/category/{$categoryId}");

        $response->assertStatus(200)
            ->assertViewIs('news.index')
            ->assertViewHasAll([
                'news',
                'category'
            ]);
    }
}
