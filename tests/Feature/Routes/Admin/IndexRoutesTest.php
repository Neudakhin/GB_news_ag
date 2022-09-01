<?php

namespace Tests\Feature\Routes\Admin;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexRoutesTest extends TestCase
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
    public function testIndex()
    {
        $response = $this->get('/admin/');

        $response->assertStatus(200)
            ->assertViewIs('admin.index');
    }
}
