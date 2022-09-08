<?php

namespace Tests\Feature\Routes\Admin;

use App\Models\Category;
use Database\Seeders\CategorySeeder;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoriesRoutesTest extends TestCase
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
            CategorySeeder::class,
        ]);

        $response = $this->get('/admin/categories');

        $response->assertStatus(200)
            ->assertViewIs('admin.categories.index')
            ->assertViewHasAll(['categories']);
    }

    public function testCreate()
    {
        $response = $this->get('/admin/categories/create');

        $response->assertStatus(200)
            ->assertViewIs('admin.categories.create');
    }

    public function testStore()
    {
        $this->seed([
            CategorySeeder::class,
        ]);

        $data = [
            'title' => $this->faker->title(),
            'description' => $this->faker->realText(),
        ];

        $response = $this->post('/admin/categories', $data);

        $response->assertStatus(201)
            ->assertRedirect(route('admin.categories.index'));

        $this->assertDatabaseHas('categories', $data);
    }

    public function testEdit()
    {
        $this->seed([
            CategorySeeder::class,
        ]);

        $category = Category::query()->first();

        $response = $this->get("/admin/categories/{$category->id}/edit");

        $response->assertStatus(200)
            ->assertViewIs('admin.categories.edit');
    }

    public function testUpdate()
    {
        $this->seed([
            CategorySeeder::class,
        ]);

        $category = Category::query()->first();

        $data = [
            'title' => $category->title,
            'description' => $category->text,
        ];

        $data['description'] = $this->faker->realText();

        $response = $this->put("/admin/categories/$category->id", $data);

        $response->assertStatus(302)
            ->assertRedirect(route('admin.categories.index'));

        $this->assertDatabaseHas('categories', $data);
    }

    public function testDelete()
    {
        $this->seed([
            CategorySeeder::class,
        ]);

        $category = Category::query()->first();

        $response = $this->delete("/admin/categories/$category->id");

        $response->assertStatus(302)
            ->assertRedirect(route('admin.categories.index'));

        $this->assertDatabaseMissing('categories', [
            'id' => $category->id
        ]);
    }
}
