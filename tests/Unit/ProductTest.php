<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function testCreateProduct()
    {
        // create a new product instance with attributes
        $product = [
            'name' => 'HomePod mini',
            'description' => 'Haut-parleur intelligent avec assistant vocal Siri intégré.',
            'price' => 99.99,
            'stock' => 35,
        ];

        $NewProduct=Product::create($product);

        // check if you set the attributes correctly
        $this->assertEquals('HomePod mini', $NewProduct->name);
        $this->assertEquals('Haut-parleur intelligent avec assistant vocal Siri intégré.', $NewProduct->description);
        $this->assertEquals(99.99, $NewProduct->price);
        $this->assertEquals(35, $NewProduct->stock);

    }

    public function testDeleteProduct()
    {
        $product = [
            'name' => 'HomePod mini',
            'description' => 'Haut-parleur intelligent avec assistant vocal Siri intégré.',
            'price' => 99.99,
            'stock' => 35,
        ];

        $NewProduct=Product::create($product);

        // Récupération de l'id
        $IdProduct = $NewProduct->id;

        // Delete l'id
        $NewProduct->delete();

        // Vérification de la non présence de l'id
        $this->assertDatabaseMissing('products', ['id'=>$IdProduct]);
    }

}
