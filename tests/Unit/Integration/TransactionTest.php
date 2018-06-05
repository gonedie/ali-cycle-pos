<?php

namespace Tests\Unit\Integration;

use App\Transaksi;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TransactionTest extends TestCase
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
    public function it_has_items_count_attribute()
    {
        $transaction = new Transaksi();

        $items = [
            [
                'id'                     => '1',
                'name'                   => 'Test Item',
                'type_merk'              => 'Test unit',
                'price'                  => 1000,
                'qty'                    => 2,
                'item_discount'          => 0,
                'item_discount_subtotal' => 0,
                'subtotal'               => 2000,
            ],
            [
                'id'                     => '2',
                'name'                   => 'Test Item 2',
                'type_merk'              => 'Test unit',
                'price'                  => 1000,
                'qty'                    => 3,
                'item_discount'          => 0,
                'item_discount_subtotal' => 0,
                'subtotal'               => 2000,
            ],
        ];
        $transaction->items = $items;

        $this->assertEquals('2 Item, 5 Pcs', $transaction->items_count);
    }

    /** @test */
    public function it_has_get_exchange_method()
    {
        $transaction = new Transaksi();
        $transaction->payment = 100000;
        $transaction->total = 90000;

        $this->assertEquals(10000, $transaction->getExchange());
    }
}
