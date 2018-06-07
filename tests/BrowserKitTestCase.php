<?php

namespace Tests;

use App\User;

use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

abstract class BrowserKitTestCase extends BaseTestCase
{
    use CreatesApplication;

    public $baseUrl = 'http://localhost';

    protected function loginAsUser()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        return $user;
    }
}
