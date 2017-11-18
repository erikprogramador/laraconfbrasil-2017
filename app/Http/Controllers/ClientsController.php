<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = auth()
            ->user()
            ->clients()
            ->orderBy('id', 'desc')
            ->paginate(10);

        if (request()->wantsJson()) {
            return response()->json($clients, 200);
        }

        return view('clients', compact('clients'));
    }

    public function create()
    {
        return view('create');
    }

    public function store()
    {
        $client = auth()
            ->user()
            ->clients()
            ->create($this->clientValidate());

        return redirect()->route('clients.show', $client);
    }

    public function show(Client $client)
    {
        return view('show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('edit', compact('client'));
    }

    public function update(Client $client)
    {
        $client->update($this->clientValidate());
        $client->fresh();

        return redirect()->route('clients.show', $client);
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients');
    }

    protected function clientValidate()
    {
        return request()->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|min:3|max:255',
            'location' => 'required|min:3|max:255',
        ]);
    }
}
