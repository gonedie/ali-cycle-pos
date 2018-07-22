<?php

namespace Tests\Unit\Integration;

use App\Cart\CartCollection;
use App\Cart\CashDraft;
use App\Cart\Item;
use App\Product;
use App\Stok;
use App\HistoryStok;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TransactionDraftTest extends TestCase
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
    public function it_can_found_an_item_in_a_draft()
    {
        $cart = new CartCollection();

        $draft = $cart->add(new CashDraft());
        $count = 2;
        $product1 = factory(Product::class)->create(['harga_jual' => 1000]);
        $product2 = factory(Product::class)->create(['harga_jual' => 2000]);
        $item1 = new Item($product1, $count);
        $item2 = new Item($product2, $count);

        // Add items to draft
        $cart->addItemToDraft($draft->draftKey, $item1);
        $cart->addItemToDraft($draft->draftKey, $item2);

        $this->assertTrue($cart->draftHasItem($draft, $product1));
        $this->assertTrue($cart->draftHasItem($draft, $product2));
        $this->assertEquals(6000, $draft->getTotal());

        // Remove an item from draft
        $cart->removeItemFromDraft($draft->draftKey, 1);
        $this->assertFalse($cart->draftHasItem($draft, $product2));

        $this->assertEquals(2000, $draft->getTotal());
    }

    /** @test */
    public function it_has_destroy_method()
    {
        $cart = new CartCollection();
        $draft = $cart->add(new CashDraft());
        $draftKey = $draft->draftKey;
        $this->assertNotNull($draft);
        $draft->destroy();
        $this->assertNull($cart->get($draftKey));
    }

    /** @test */
    public function it_has_get_total_method()
    {
        $cart = new CartCollection();

        $draft = $cart->add(new CashDraft());
        $count = 2;
        $product1 = factory(Product::class)->create(['harga_jual' => 1000]);
        $product2 = factory(Product::class)->create(['harga_jual' => 2000]);
        $item1 = new Item($product1, $count);
        $item2 = new Item($product2, $count);

        // Add items to draft
        $cart->addItemToDraft($draft->draftKey, $item1);
        $cart->addItemToDraft($draft->draftKey, $item2);

        $this->assertEquals(6000, $draft->getTotal());
    }

    /** @test */
    public function it_has_get_total_item_qty_method()
    {
        $cart = new CartCollection();

        $draft = $cart->add(new CashDraft());

        $product1 = factory(Product::class)->create(['harga_jual' => 1000]);
        $product2 = factory(Product::class)->create(['harga_jual' => 2000]);
        $item1 = new Item($product1, 1);
        $item2 = new Item($product2, 3);

        // Add items to draft
        $cart->addItemToDraft($draft->draftKey, $item1);
        $cart->addItemToDraft($draft->draftKey, $item2);

        $this->assertEquals(4, $draft->getTotalQty());
    }

    /** @test */
    public function it_has_get_subtotal_method()
    {
        $cart = new CartCollection();

        $draft = $cart->add(new CashDraft());

        $product1 = factory(Product::class)->create(['harga_jual' => 1000]);
        $product2 = factory(Product::class)->create(['harga_jual' => 2000]);
        $item1 = new Item($product1, 1);
        $item2 = new Item($product2, 3);

        // Add items to draft
        $cart->addItemToDraft($draft->draftKey, $item1);
        $cart->addItemToDraft($draft->draftKey, $item2);

        $this->assertEquals(7000, $draft->getSubtotal());
        $this->assertEquals(7000, $draft->getTotal());
    }

    /** @test */
    public function it_has_payment_and_exchange()
    {
        $cart = new CartCollection();

        $draft = $cart->add(new CashDraft());

        $product1 = factory(Product::class)->create(['harga_jual' => 1000]);
        $product2 = factory(Product::class)->create(['harga_jual' => 2000]);
        $item1 = new Item($product1, 1);
        $item2 = new Item($product2, 3);
        // Add items to draft
        $cart->addItemToDraft($draft->draftKey, $item1);
        $cart->addItemToDraft($draft->draftKey, $item2);

        $draftAttributes = [
            'customer' => [
                'name'  => 'Dian',
                'phone' => '08564182546',
            ],
            'payment' => 10000,
        ];
        $cart->updateDraftAttributes($draft->draftKey, $draftAttributes);

        $this->assertEquals(10000, $draft->payment);
        $this->assertEquals(7000, $draft->getTotal());
        $this->assertEquals(3000, $draft->getExchange());
        $this->assertEquals([
            'name'  => 'Dian',
            'phone' => '08564182546',
        ], $draft->customer);
    }

    /** @test */
    public function it_has_store_method_to_save_to_database()
    {
        $cart = new CartCollection();

        $draft = $cart->add(new CashDraft());

        $product1 = factory(Product::class)->create(['harga_jual' => 1000]);
        $product2 = factory(Product::class)->create(['harga_jual' => 2000]);

        $setStokAwal = factory(Stok::class)->create(['stok_awal' => 5, 'product_id' => $product1->id]);
        $setStokAwal = factory(Stok::class)->create(['stok_awal' => 5, 'product_id' => $product2->id]);

        $item1 = new Item($product1, 1);
        $item2 = new Item($product2, 3);

        // Add items to draft
        $cart->addItemToDraft($draft->draftKey, $item1);
        $cart->addItemToDraft($draft->draftKey, $item2);

        $draftAttributes = [
            'customer' => [
                'name'  => 'Dian',
                'phone' => '08564182546',
            ],
            'payment' => 10000,
        ];
        $cart->updateDraftAttributes($draft->draftKey, $draftAttributes);

        $draft->store();

        $this->assertDatabaseHas('transaksis', [
            'invoice_no' => date('ym').'0001',
            'items'      => '[{"id":'.$product1->id.',"name":"'.$product1->name.'","type_merk":"'.$product1->type_merk->nama_type.'","price":1000,"qty":1,"subtotal":1000},{"id":'.$product2->id.',"name":"'.$product2->name.'","type_merk":"'.$product2->type_merk->nama_type.'","price":2000,"qty":3,"subtotal":6000}]',
            'customer'   => '{"name":"Dian","phone":"08564182546"}',
            'payment'    => 10000,
            'total'      => 7000,
            'user_id'    => 1,
        ]);
    }

    /** @test */
    public function it_has_product_search_method()
    {
        $cart = new CartCollection();

        $draft = $cart->add(new CashDraft());
        $count = 2;
        $product1 = factory(Product::class)->create(['harga_jual' => 1000]);
        $item1 = new Item($product1, $count);

        // Add items to draft
        $cart->addItemToDraft($draft->draftKey, $item1);

        $this->assertEquals($draft->search($product1)->id, $product1->id);
    }

    /** @test */
    public function it_has_search_item_key_for_product_method()
    {
        $cart = new CartCollection();

        $draft = $cart->add(new CashDraft());
        $count = 2;

        $product1 = factory(Product::class)->create();
        $item1 = new Item($product1, $count);
        $cart->addItemToDraft($draft->draftKey, $item1);

        $product2 = factory(Product::class)->create();
        $item2 = new Item($product2, $count);
        $cart->addItemToDraft($draft->draftKey, $item2);

        $product3 = factory(Product::class)->create();
        $item3 = new Item($product3, $count);
        $cart->addItemToDraft($draft->draftKey, $item3);

        $this->assertEquals($draft->searchItemKeyFor($product3), 2);
        $this->assertEquals($draft->searchItemKeyFor($product2), 1);
        $this->assertEquals($draft->searchItemKeyFor($product1), 0);
    }
}
