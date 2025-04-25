<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class editNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group editNote
     */
    public function testEditNote(): void
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
                    ->clickLink('Edit')
                    ->assertPathIs('/edit-note-page/2')
                    ->type('title', 'HALO!!!!')
                    ->type('description', 'SEMOGA BISA.')
                    ->press('UPDATE')
                    ->assertPathIs('/notes');
        });
    }
}
