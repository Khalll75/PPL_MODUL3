<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class showNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group showNote
     */
    public function testShowNote(): void
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
                    ->clickLink('Notes')
                    ->assertPathIs('/notes')
                    ->click('@detail-3')
                    ->assertPathIs('/note/3');
        });
    }
}
