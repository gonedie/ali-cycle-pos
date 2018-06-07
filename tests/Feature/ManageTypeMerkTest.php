<?php

namespace Tests\Feature;

// use Tests\TestCase;
// use Illuminate\Foundation\Testing\WithFaker;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\TypeMerk;
use App\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\BrowserKitTestCase;

class ManageTypeMerkTest extends BrowserKitTestCase
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
    public function user_can_see_type_list()
    {
        $type1 = factory(TypeMerk::class)->create(['nama_type' => 'Type Testing 123']);
        $type2 = factory(TypeMerk::class)->create(['nama_type' => 'Type Testing 456']);

        $this->loginAsUser();
        $this->visit(route('type-merk.index'));
        $this->see($type1->nama_type);
        $this->see($type2->nama_type);
    }

    /** @test */
    public function user_can_create_a_type()
    {
        $this->loginAsUser();
        $this->visit(route('type-merk.index'));

        $this->click(trans('type.create'));
        $this->seePageIs(route('type-merk.index', ['action' => 'create']));

        $this->type('Type 1', 'nama_type');
        $this->press(trans('type.create'));

        $this->seePageIs(route('type-merk.index'));
        $this->see(trans('type.created'));

        $this->seeInDatabase('type_merks', [
            'nama_type' => 'Type 1',
        ]);
    }

    /** @test */
    public function user_can_edit_a_unit()
    {
        $this->loginAsUser();
        $type = factory(TypeMerk::class)->create();

        $this->visit(route('type-merk.index'));
        $this->click('edit-unit-'.$type->id);
        $this->seePageIs(route('type-merk.index', ['action' => 'edit', 'id' => $type->id]));

        $this->type('jajal', 'nama_type');
        $this->press(trans('type.update'));

        $this->see(trans('type.updated'));
        $this->seePageIs(route('type-merk.index'));

        $this->seeInDatabase('type_merks', [
            'nama_type' => 'jajal',
        ]);
    }

    /** @test */
    public function user_can_delete_a_unit()
    {
        $this->loginAsUser();
        $type = factory(TypeMerk::class)->create();

        $this->visit(route('type-merk.index'));
        $this->click('del-unit-'.$type->id);
        $this->seePageIs(route('type-merk.index', ['action' => 'delete', 'id' => $type->id]));

        $this->seeInDatabase('type_merks', [
            'id' => $type->id,
        ]);

        $this->press(trans('app.delete_confirm_button'));

        $this->dontSeeInDatabase('type_merks', [
            'id' => $type->id,
        ]);
    }

    /** @test */
    public function user_can_not_delete_a_unit_that_has_product()
    {
        $this->loginAsUser();
        $product = factory(Product::class)->create();
        $unitId = $product->type_merk_id;

        $this->visit(route('type-merk.index'));
        $this->click('del-unit-'.$unitId);
        $this->seePageIs(route('type-merk.index', ['action' => 'delete', 'id' => $unitId]));

        $this->press(trans('app.delete_confirm_button'));

        $this->see(trans('type.undeleteable'));
        $this->seePageIs(route('type-merk.index', ['action' => 'delete', 'id' => $unitId]));

        $this->seeInDatabase('products', [
            'id' => $unitId,
        ]);
    }
}
