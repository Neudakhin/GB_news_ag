<?php

namespace Tests\Feature\Routes\Admin;

use App\Models\Review;
use Database\Seeders\ReviewSeeder;
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
        $this->seed([
            ReviewSeeder::class,
        ]);

        $response = $this->get('/admin/reviews');

        $response->assertStatus(200)
            ->assertViewIs('admin.reviews.index')
            ->assertViewHasAll(['reviews']);
    }

    public function testCreate()
    {
        $response = $this->get('/admin/reviews/create');

        $response->assertStatus(200)
            ->assertViewIs('admin.reviews.create');
    }

    public function testStore()
    {
        $this->seed([
            ReviewSeeder::class,
        ]);

        $data = [
            'name' => $this->faker->title(),
            'text' => $this->faker->realText(),
        ];

        $response = $this->post('/admin/reviews', $data);

        $response->assertStatus(201)
            ->assertRedirect(route('admin.reviews.index'));

        $this->assertDatabaseHas('reviews', $data);
    }

    public function testEdit()
    {
        $this->seed([
            ReviewSeeder::class,
        ]);

        $review = Review::query()->first();

        $response = $this->get("/admin/reviews/{$review->id}/edit");

        $response->assertStatus(200)
            ->assertViewIs('admin.reviews.edit');
    }

    public function testUpdate()
    {
        $this->seed([
            ReviewSeeder::class,
        ]);

        $review = Review::query()->first();

        $data = [
            'name' => $review->name,
            'text' => $review->text,
        ];

        $data['text'] = $this->faker->realText();

        $response = $this->put("/admin/reviews/$review->id", $data);

        $response->assertStatus(302)
            ->assertRedirect(route('admin.reviews.index'));

        $this->assertDatabaseHas('reviews', $data);
    }

    public function testDelete()
    {
        $this->seed([
            ReviewSeeder::class,
        ]);

        $review = Review::query()->first();

        $response = $this->delete("/admin/reviews/$review->id");

        $response->assertStatus(302)
            ->assertRedirect(route('admin.reviews.index'));

        $this->assertDatabaseMissing('reviews', [
            'id' => $review->id
        ]);
    }
}
