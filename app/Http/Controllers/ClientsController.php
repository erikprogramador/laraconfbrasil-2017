<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = auth()->user()->clients()->paginate(10);

        return view('clients', compact('clients'));
    }
}
