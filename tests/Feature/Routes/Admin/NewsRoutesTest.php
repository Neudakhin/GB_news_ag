<?php

namespace Tests\Feature\Routes\Admin;

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

        $response = $this->get('/admin/news');

        $response->assertStatus(200)
            ->assertViewIs('admin.news.index')
            ->assertViewHasAll(['news']);
    }

    public function testCreate()
    {
        $response = $this->get('/admin/news/create');

        $response->assertStatus(200)
            ->assertViewIs('admin.news.create');
    }

    public function testStore()
    {
        $this->seed([
            CategorySeeder::class,
        ]);

        $categoryId = Category::query()->first()->id;

        $data = [
            'category_id' => $categoryId,
            'title' => $this->faker->title(),
            'author' => $this->faker->userName(),
            'text' => $this->faker->realText(),
            'status' => 'DRAFT',
        ];

        $response = $this->post('/admin/news', $data);

        $response->assertStatus(201)
            ->assertRedirect(route('admin.news.index'));

        $this->assertDatabaseHas('news', $data);
    }

    public function testEdit()
    {
        $this->seed([
            SourceSeeder::class,
            CategorySeeder::class,
            NewsSeeder::class,
        ]);

        $news = News::query()->first();

        $response = $this->get("/admin/news/{$news->id}/edit");

        $response->assertStatus(200)
            ->assertViewIs('admin.news.edit');
    }

    public function testUpdate()
    {
        $this->seed([
            SourceSeeder::class,
            CategorySeeder::class,
            NewsSeeder::class,
        ]);

        $news = News::query()->first();

        $data = [
            'category_id' => $news->category_id,
            'title' => $news->title,
            'author' => $news->author,
            'text' => $news->text,
            'status' => $news->status,
        ];

        $data['title'] = $this->faker->title();

        $response = $this->put("/admin/news/$news->id", $data);

        $response->assertStatus(302)
            ->assertRedirect(route('admin.news.index'));

        $this->assertDatabaseHas('news', $data);
    }

    public function testDelete()
    {
        $this->seed([
            SourceSeeder::class,
            CategorySeeder::class,
            NewsSeeder::class,
        ]);

        $news = News::query()->first();

        $response = $this->delete("/admin/news/$news->id");

        $response->assertStatus(302)
            ->assertRedirect(route('admin.news.index'));

        $this->assertDatabaseMissing('news', [
            'id' => $news->id
        ]);
    }
}
