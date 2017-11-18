<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateClientsTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_client_can_be_created()
    {
        $this->browse(function (Browser $browser) {
            $user = factory(User::class)->create();
            $browser->loginAs($user)
                ->visit('/clients/create')
                ->type('name', 'Erik V. Fernandes')
                ->type('email', 'erik@email.com')
                ->type('location', 'Third Street Promenade')
                ->press('Save')
                ->assertSee('Erik V. Fernandes')
                ->assertSee('erik@email.com')
                ->assertSee('Third Street Promenade')
                ->assertDontSee('Create Client');
        });
    }
}
