<?php

namespace Tests\Unit\Integration;

use App\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function it_has_get_price_method()
    {
        $product = new Product(['harga_jual' => 3000]);

        $this->assertEquals(3000, $product->getPrice());
    }

    /** @test */
    public function product_get_price_method_default_to_cash_price()
    {
        $product = new Product(['harga_jual' => 3000]);

        $this->assertEquals($product->harga_jual, $product->getPrice());
    }

}
