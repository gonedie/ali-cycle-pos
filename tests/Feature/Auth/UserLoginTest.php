<?php

namespace Tests\Feature\Auth;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\BrowserKitTestCase;

class UserLoginTest extends BrowserKitTestCase
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
    public function it_validates_the_login_form()
    {
        $this->visit(route('login'))
            ->type('foobar', 'username')
            ->type('secret', 'password')
            ->press('Login')
            ->dontSeeIsAuthenticated()
            ->seePageIs(route('login'));
        $this->see(trans('auth.failed'));
    }

    /** @test */
    public function user_can_login()
    {
        $user = factory(User::class)->create(['password' => '123456']);

        $this->visit(route('login'));
        $this->type($user->username, 'username');
        $this->type('123456', 'password');
        $this->press('Login');

        $this->seePageIs(route('dashboard.index'));
        $this->see($user->name);

        // $this->dump();

        $this->press('logout-button');
        $this->seePageIs(route('page'));
    }

    /** @test */
    public function it_can_logout_of_the_application()
    {
        $user = factory(User::class)->create(['password' => '123456']);
        $this->actingAs($user)
             ->visit(route('dashboard.index'))
             ->press('logout-button')
             ->seePageis(route('page'))
             ->dontSeeIsAuthenticated();
    }
}
