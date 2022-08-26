<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutesTest extends TestCase
{
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
        $response = $this->get('/category');

        $response->assertStatus(200)
            ->assertViewIs('category.index')
            ->assertViewHasAll([
                'categories'
            ]);
    }

    public function testNewsRoutes()
    {
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

        $response = $this->get('/news/category/{category}');

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

        $response = $this->get('/admin/category');

        $response->assertStatus(200)
            ->assertViewIs('admin.category.index')
            ->assertViewHasAll(['categories']);

        $response = $this->get('/admin/category/create');

        $response->assertStatus(200)
            ->assertViewIs('admin.category.create');

        $response = $this->get('/admin/category/1/edit');

        $response->assertStatus(200)
            ->assertViewIs('admin.category.edit');
    }
}
