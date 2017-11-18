<?php

namespace Tests\Feature;

use App\User;
use App\Client;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageClientsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_not_get_clients_lists()
    {
        $response = $this->json('GET', '/clients');

        $response->assertStatus(401);
    }

    /** @test */
    public function users_can_get_their_clients()
    {
        $user = factory(User::class)->create();
        $clients = factory(Client::class, 2)->create(['user_id' => $user->id]);

        $this->be($user);

        $response = $this->json('GET', '/clients');

        $response->assertStatus(200);

        $response->assertJsonFragment([
            'id' => $clients->first()->id,
            'name' => $clients->first()->name,
            'email' => $clients->first()->email,
        ]);
    }

    /** @test */
    public function guests_can_not_add_a_client()
    {
        $client = factory(Client::class)->raw();

        $response = $this->post('/clients', $client);

        $response->assertStatus(302);
    }

    /** @test */
    public function users_can_add_clients()
    {
        $client = factory(Client::class)->raw();

        $this->be($user = factory(User::class)->create());

        $response = $this->post('/clients', $client);

        $this->assertDatabaseHas('clients', [
            'name' => $client['name'],
            'email' => $client['email']
        ]);

        $this->assertEquals($user->clients->first()->name, $client['name']);
    }

    /** @test */
    public function clients_must_have_a_name()
    {
        $this->be(factory(User::class)->create());

        $data = [
            'email' => 'someemail@email.com',
            'location' => 'Third Street Promenade',
        ];

        $response = $this->post('/clients', $data);

        $response->assertSessionHasErrors(['name']);
    }

    /** @test */
    public function clients_must_have_a_email()
    {
        $this->be(factory(User::class)->create());

        $data = [
            'name' => 'My name',
            'location' => 'Third Street Promenade',
        ];

        $response = $this->post('/clients', $data);

        $response->assertSessionHasErrors(['email']);
    }

    /** @test */
    public function clients_must_have_a_location()
    {
        $this->be(factory(User::class)->create());

        $data = [
            'name' => 'My name',
            'email' => 'someemail@email.com',
        ];

        $response = $this->post('/clients', $data);

        $response->assertSessionHasErrors(['location']);
    }

    /** @test */
    public function guests_can_not_update_a_client()
    {
        $response = $this->put('/clients/' . 1, []);

        $response = $response->assertStatus(302);
    }

    /** @test */
    public function users_can_update_clients()
    {
        $client = factory(Client::class)->create();

        $this->be($user = factory(User::class)->create());

        $data = [
            'name' => 'My name',
            'email' => 'someemail@email.com',
            'location' => 'Third Street Promenade'
        ];

        $response = $this->put("/clients/{$client->id}", $data);

        $client = $client->fresh();

        $this->assertEquals($client->name, $data['name']);
        $this->assertEquals($client->email, $data['email']);
        $this->assertEquals($client->location, $data['location']);
    }

    /** @test */
    public function guests_can_not_delete_a_client()
    {
        $response = $this->delete('/clients/1');

        $response->assertStatus(302);
    }

    /** @test */
    public function client_can_be_deleted()
    {
        $client = factory(Client::class)->create();

        $this->be(factory(User::class)->create());

        $response = $this->delete("/clients/{$client->id}");

        $this->assertDatabaseMissing('clients', [
            'name' => $client->name,
            'email' => $client->email,
        ]);
    }
}
