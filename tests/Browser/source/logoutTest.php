<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class logoutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group logout
     */
    public function testLogout(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Modul 3')
                    ->clickLink(link: 'Log in')
                    ->assertPathIs(path: '/login')
                    ->type(field: 'email', value: 'user@gmail.com')
                    ->type(field: 'password', value: '12340')
                    ->press(button: 'LOG IN')
                    ->assertPathIs(path: '/dashboard')
                    ->click('#click-dropdown')
                    ->clickLink('Log Out')
                    ->assertPathIs('/');
        });
    }
}
