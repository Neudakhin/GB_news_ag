<?php

namespace Tests\Feature;

use Database\Seeders\CategorySeeder;
use Database\Seeders\NewsSeeder;
use Database\Seeders\SourceSeeder;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    use RefreshDatabase;

    private $faker;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->faker = Factory::create();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testWelcomeRoutes()
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertViewIs('layouts.main');
    }

    public function testCategoryRoutes()
    {
        $this->seed(CategorySeeder::class);

        $response = $this->get('/categories');

        $response->assertStatus(200)
            ->assertViewIs('categories.index')
            ->assertViewHasAll([
                'categories'
            ]);
    }

    public function testNewsRoutes()
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

        $response = $this->get('/news/1');

        $response->assertStatus(200)
            ->assertViewIs('news.show')
            ->assertViewHasAll([
                'news'
            ]);

        $categoryTitle = DB::table('categories')->pluck('title')->first();
        $response = $this->get("/news/category/{$categoryTitle}");

        $response->assertStatus(200)
            ->assertViewIs('news.index')
            ->assertViewHasAll([
                'news',
                'category'
            ]);
    }

    public function testOrdersRoutes()
    {
        $response = $this->get('/orders/');

        $response->assertStatus(200)
            ->assertViewIs('orders.index');

        $response = $this->get('/orders/create');

        $response->assertStatus(200)
            ->assertViewIs('orders.create');

        $response = $this->post('/orders/store', [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'order' => $this->faker->text()
        ]);

        $response->assertStatus(201)
            ->assertRedirect(route('orders.create'));
    }

    public function testReviewsRoutes()
    {
        $response = $this->get('/reviews/');

        $response->assertStatus(200)
            ->assertViewIs('reviews.index');

        $response = $this->get('/reviews/create');

        $response->assertStatus(200)
            ->assertViewIs('reviews.create');

        $response = $this->post('/reviews/store', [
            'name' => $this->faker->name(),
            'review' => $this->faker->text()
        ]);

        $response->assertStatus(201)
            ->assertRedirect(route('reviews.create'));
    }

    public function testAdminRoutes()
    {
        $this->seed([
            SourceSeeder::class,
            CategorySeeder::class,
            NewsSeeder::class,
        ]);

        $response = $this->get('/admin/');

        $response->assertStatus(200)
            ->assertViewIs('admin.index');

        $response = $this->get('/admin/news');

        $response->assertStatus(200)
            ->assertViewIs('admin.news.index')
            ->assertViewHasAll(['news']);

        $response = $this->get('/admin/news/create');

        $response->assertStatus(200)
            ->assertViewIs('admin.news.create');

        $response = $this->get('/admin/news/auto/edit');

        $response->assertStatus(200)
            ->assertViewIs('admin.news.edit');

        $response = $this->get('/admin/categories');

        $response->assertStatus(200)
            ->assertViewIs('admin.categories.index')
            ->assertViewHasAll(['categories']);

        $response = $this->get('/admin/categories/create');

        $response->assertStatus(200)
            ->assertViewIs('admin.categories.create');

        $response = $this->get('/admin/categories/1/edit');

        $response->assertStatus(200)
            ->assertViewIs('admin.categories.edit');
    }
}
