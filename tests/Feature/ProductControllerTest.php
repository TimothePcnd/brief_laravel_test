<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_create_product(): void
    {
        $response = $this->post(route('products.create'), [
            'name' => 'Kaaris',
            'description' => 'Or noir.',
            'price' => 3500000,
            'stock' => 1,
        ]);

        $response = $this->get('/products');

        $response->assertStatus(200);
        foreach (Product::all() as $product) {
            $response->assertSee($product->name);
        }
    }
}
