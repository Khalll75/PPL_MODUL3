<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group register
     */
    public function testRegis(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Modul 3')
                    ->clickLink(link: 'Register')
                    ->assertPathIs(path: '/register')
                    ->type(field: 'name', value: 'user')
                    ->type(field: 'email', value: 'user@gmail.com')
                    ->type(field: 'password', value: '12340')
                    ->type(field: 'password_confirmation', value: '12340')
                    ->press(button: 'REGISTER')
                    ->assertPathIs(path: '/dashboard');

        });
    }
}
