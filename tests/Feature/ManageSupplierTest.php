<?php

namespace Tests\Feature;

// use Tests\TestCase;
// use Illuminate\Foundation\Testing\WithFaker;
use App\Supplier;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\BrowserKitTestCase;

class ManageSupplierTest extends BrowserKitTestCase
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
    public function user_can_see_supplier_list()
    {
        $supplier1 = factory(Supplier::class)->create([
            'nama'    => 'Supplier 1',
            'tlpn'    => '081872661882',
            'alamat'  => 'Jl.Imam Bonjol'
        ]);
        $supplier2 = factory(Supplier::class)->create([
          'nama'    => 'Supplier 2',
          'tlpn'    => '081872661881',
          'alamat'  => 'Jl.Pandanaran 10'
        ]);

        $this->visit(route('supplier.index'));
        $this->see($supplier1->nama); $this->see($supplier1->tlpn); $this->see($supplier1->alamat);
        $this->see($supplier2->nama); $this->see($supplier2->tlpn); $this->see($supplier2->alamat);
    }

    /** @test */
    public function user_can_create_a_supplier()
    {
        $this->visit(route('supplier.index'));

        $this->click(trans('supplier.create'));
        $this->seePageIs(route('supplier.index', ['action' => 'create']));

        $this->type('Supplier 1', 'nama');
        $this->type('081882873771', 'tlpn');
        $this->type('Jl.Pendanaran', 'alamat');
        $this->press(trans('supplier.create'));

        $this->seePageIs(route('supplier.index'));
        $this->see(trans('supplier.created'));

        $this->seeInDatabase('suppliers', [
            'nama' => 'Supplier 1',
            'tlpn' => '081882873771',
            'alamat' => 'Jl.Pendanaran',
        ]);
    }

    /** @test */
    public function user_can_edit_a_supplier()
    {
        $supplier = factory(Supplier::class)->create();


        $this->visit(route('supplier.index'));
        $this->click('edit-supplier-'.$supplier->id);
        $this->seePageIs(route('supplier.index', ['action' => 'edit', 'id' => $supplier->id]));

        $this->type('Supplier12', 'nama');
        $this->type('08188287379', 'tlpn');
        $this->type('Jl.Pendanaran21', 'alamat');
        $this->press(trans('supplier.update'));

        $this->see(trans('supplier.updated'));
        $this->seePageIs(route('supplier.index'));

        $this->seeInDatabase('suppliers', [
            'nama'    => 'Supplier12',
            'tlpn'    => '08188287379',
            'alamat'  => 'Jl.Pendanaran21',
        ]);
    }

    /** @test */
    public function user_can_delete_a_unit()
    {
        $supplier = factory(Supplier::class)->create();

        $this->visit(route('supplier.index'));
        $this->click('del-supplier-'.$supplier->id);
        $this->seePageIs(route('supplier.index', ['action' => 'delete', 'id' => $supplier->id]));

        $this->seeInDatabase('suppliers', [
            'id' => $supplier->id,
        ]);

        $this->press(trans('app.delete_confirm_button'));

        $this->dontSeeInDatabase('suppliers', [
            'id' => $supplier->id,
        ]);
    }

}
