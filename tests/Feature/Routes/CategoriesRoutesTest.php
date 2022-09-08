<?php

namespace Tests\Feature\Routes;

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
        $this->seed(CategorySeeder::class);

        $response = $this->get('/categories');

        $response->assertStatus(200)
            ->assertViewIs('categories.index')
            ->assertViewHasAll([
                'categories'
            ]);
    }
}
