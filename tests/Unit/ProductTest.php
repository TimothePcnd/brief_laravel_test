<?php

namespace Tests\Unit;

use App\Models\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_attributes_are_set_correctly()
    {
        // create a new product instance with attributes
        $product = new Product([
            'name' => 'Sample Product Name',
            'description' => 'Sample Product Description',
            'price' => 10.90,
            'stock' => 2,
        ]);

        // check if you set the attributes correctly
        $this->assertEquals('Sample Product Name', $product->name);
        $this->assertEquals('Sample Product Description', $product->description);
        $this->assertEquals(10.90, $product->price);
        $this->assertEquals(2, $product->stock);
    }

    public function test_non_fillable_attributes_are_not_set()
    {
        // Attempt to create a product with additional attributes (non-fillable)
        $product= new Product([
            'name' => 'Sample Product Name',
            'description' => 'Sample Product Description',
            'price' => 10.90,
            'stock' => 2,
            'availability' => 'Yes'
        ]);

        // check that the non-fillable attribute is not set on the product instance
        $this->assertArrayNotHasKey('availability', $product->getAttributes());
    }
}
