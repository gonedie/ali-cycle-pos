<?php

namespace Tests\Feature;

use App\Product;
use App\Stok;
use App\HistoryStok;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\BrowserKitTestCase;

class ManageStoksTest extends BrowserKitTestCase
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
    public function user_can_see_paginated_stok_list()
    {
        $stok1 = factory(HistoryStok::class)->create(['sm_no' => 'SM-0001']);
        $stok2 = factory(HistoryStok::class)->create(['sm_no' => 'SM-0002']);

        $this->loginAsUser();
        $this->visit(route('stok.index'));
        $this->see($stok1->sm_no);
        $this->see($stok2->sm_no);
    }

    /** @test */
    public function user_can_search_stok_by_keyword()
    {
        $this->loginAsUser();
        $stok1 = factory(HistoryStok::class)->create(['sm_no' => '2000']);
        $stok2 = factory(HistoryStok::class)->create(['sm_no' => '2002']);

        $this->visit(route('stok.index'));
        $this->submitForm(trans('stok.search'), ['date' => '2000']);
        $this->seePageIs(route('stok.index', ['date' => 2000]));

        $this->see($stok1->sm_no);
        $this->dontSee($stok2->sm_no);
    }

    /** @test */
    public function user_can_create_a_stok_masuk()
    {
        $product = factory(Product::class)->create(['name' => 'Product 1']);
        $this->loginAsUser();
        $this->visit(route('stok.index'));

        $this->click(trans('stok.create'));
        $this->seePageIs(route('stok.index', ['action' => 'create']));

        $this->type('4', 'stok_masuk');
        $this->type('1000', 'harga_beli');
        $this->type('4000', 'total');
        $this->type($product->id, 'product_id');
        $this->press(trans('stok.create'));

        $this->seePageIs(route('stok.index'));
        $this->see(trans('stok.created'));

        $this->seeInDatabase('history_stoks', [
            'stok_masuk'   => 4,
            'harga_beli'   => 1000,
            'total'        => 4000,
        ]);
    }

}
