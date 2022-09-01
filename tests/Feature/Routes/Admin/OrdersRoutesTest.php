<?php

namespace Tests\Feature\Routes\Admin;

use App\Models\Order;
use Database\Seeders\OrderSeeder;
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
        $this->seed([
            OrderSeeder::class,
        ]);

        $response = $this->get('/admin/orders');

        $response->assertStatus(200)
            ->assertViewIs('admin.orders.index')
            ->assertViewHasAll(['orders']);
    }

    public function testCreate()
    {
        $response = $this->get('/admin/orders/create');

        $response->assertStatus(200)
            ->assertViewIs('admin.orders.create');
    }

    public function testStore()
    {
        $this->seed([
            OrderSeeder::class,
        ]);

        $data = [
            'name' => $this->faker->title(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'description' => $this->faker->realText(),
        ];

        $response = $this->post('/admin/orders', $data);

        $response->assertStatus(201)
            ->assertRedirect(route('admin.orders.index'));

        $this->assertDatabaseHas('orders', $data);
    }

    public function testEdit()
    {
        $this->seed([
            OrderSeeder::class,
        ]);

        $order = Order::query()->first();

        $response = $this->get("/admin/orders/{$order->id}/edit");

        $response->assertStatus(200)
            ->assertViewIs('admin.orders.edit');
    }

    public function testUpdate()
    {
        $this->seed([
            OrderSeeder::class,
        ]);

        $order = Order::query()->first();

        $data = [
            'name' => $order->name,
            'phone' => $order->phone,
            'email' => $order->email,
            'description' => $order->description,
        ];

        $data['description'] = $this->faker->title();

        $response = $this->put("/admin/orders/$order->id", $data);

        $response->assertStatus(302)
            ->assertRedirect(route('admin.orders.index'));

        $this->assertDatabaseHas('orders', $data);
    }

    public function testDelete()
    {
        $this->seed([
            OrderSeeder::class,
        ]);

        $order = Order::query()->first();

        $response = $this->delete("/admin/orders/$order->id");

        $response->assertStatus(302)
            ->assertRedirect(route('admin.orders.index'));

        $this->assertDatabaseMissing('orders', [
            'id' => $order->id
        ]);
    }
}
