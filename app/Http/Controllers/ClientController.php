<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class ClientController
{
    use AuthorizesRequests;

    public function index(): View
    {
        //$this->authorize('index', Client::class);

        $clients = Client::all();
        return view('clients.index', ['clients' => $clients]);
    }

    public function create(): View
    {
        //$this->authorize('create', Client::class);

        return view('clients.create', ['client' => new Client]);
    }

    public function edit(Client $client): View
    {
        //$this->authorize('edit', $client);

        return view('clients.edit', ['client' => $client]);
    }

    public function update(Client $client, Request $request): RedirectResponse
    {
        //$this->authorize('update', Client::class);

        $client->name = $request->name;

        $client->save();

        return redirect(action([self::class, 'index']));

    }

    public function store(Request $request): RedirectResponse
    {
        //$this->authorize('store', Client::class);

        $client = new Client();
        $client->name = $request->name;

        $client->save();

        return redirect(action([self::class, 'edit'], $client->id));
    }
}
