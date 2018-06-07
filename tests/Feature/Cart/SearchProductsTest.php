<?php

namespace Tests\Feature\Cart;

use App\Cart\CartCollection;
use App\Cart\CashDraft;
use App\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SearchProductsTest extends TestCase
{
    use DatabaseMigrations;
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
    public function retrieving_product_list_by_ajax_post_request()
    {
        // $this->disableExceptionHandling();
        factory(Product::class)->create(['name' => 'Coba Produk 123']);
        factory(Product::class)->create(['name' => 'Produk BMX']);
        $product1 = factory(Product::class)->create(['name' => 'BMX Model 1 ', 'harga_jual' => 2000]);
        $product2 = factory(Product::class)->create(['name' => 'BMX Model 2 ', 'harga_jual' => 3000]);

        $cart = new CartCollection();
        $draft = new CashDraft();
        $cart->add($draft);

        // $user = $this->loginAsUser();

        $response = $this->post(route('api.products.search'), [
            'query'     => 'Bmx',
            'draftType' => $draft->type,
            'draftKey'  => $draft->draftKey,
        ]);

        $response->assertSuccessful();
        $response->assertSee($product1->name);
        $response->assertSee(route('cart.add-draft-item', [$draft->draftKey, $product1->id]));
        $response->assertSee($product2->name);
        $response->assertSee(route('cart.add-draft-item', [$draft->draftKey, $product2->id]));
    }
}
