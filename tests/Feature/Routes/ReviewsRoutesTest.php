<?php

namespace Tests\Feature\Routes;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReviewsRoutesTest extends TestCase
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
        $response = $this->get('/reviews/');

        $response->assertStatus(200)
            ->assertViewIs('reviews.index');
    }

    public function testCreate()
    {

        $response = $this->get('/reviews/create');

        $response->assertStatus(200)
            ->assertViewIs('reviews.create');
    }

    public function testStore()
    {
        $review = [
            'name' => $this->faker->name(),
            'text' => $this->faker->text()
        ];

        $response = $this->post('/reviews', $review);

        $response->assertStatus(201)
            ->assertRedirect(route('reviews.create'));

        $this->assertDatabaseHas('reviews', [
            'name' => $review['name'],
            'text' => $review['text'],
        ]);
    }
}
