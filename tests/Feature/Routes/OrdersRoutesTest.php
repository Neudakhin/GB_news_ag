<?php

namespace Tests\Feature\Routes;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrdersRoutesTest extends TestCase
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
        $response = $this->get('/orders/');

        $response->assertStatus(200)
            ->assertViewIs('orders.index');
    }

    public function testCreate()
    {
        $response = $this->get('/orders/create');

        $response->assertStatus(200)
            ->assertViewIs('orders.create');
    }

    public function testStore()
    {
        $order = [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'description' => $this->faker->text()
        ];

        $response = $this->post('/orders', $order);

        $response->assertStatus(201)
            ->assertRedirect(route('orders.create'));

        $this->assertDatabaseHas('orders', [
            'name' => $order['name'],
            'phone' => $order['phone'],
            'email' => $order['email'],
            'description' => $order['description'],
        ]);
    }
}
