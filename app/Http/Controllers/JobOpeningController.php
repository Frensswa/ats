<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\JobOpening;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class JobOpeningController
{
    use AuthorizesRequests;

    public function index(Client $client): View
    {
        //$this->authorize('index', JobOpening::class);

        $jobOpenings = JobOpening::where('clientID', $client->id)->get();
        return view('jobOpenings.index', ['clients' => $jobOpenings]);
    }

    public function create(): View
    {
        //$this->authorize('create', JobOpening::class);

        return view('jobOpenings.create', ['jobOpening' => new JobOpening]);
    }

    public function edit(JobOpening $jobOpening): View
    {
        //$this->authorize('edit', $jobOpening);

        return view('jobOpenings.edit', ['jobOpening' => $jobOpening]);
    }

    public function update(JobOpening $jobOpening, Request $request): RedirectResponse
    {
        //$this->authorize('update', JobOpening::class);

        $jobOpening->name = $request->name;

        $jobOpening->save();

        return redirect(action([self::class, 'index']));

    }

    public function store(Request $request): RedirectResponse
    {
        //$this->authorize('store', JobOpening::class);

        $jobOpening = new JobOpening();
        $jobOpening->name = $request->name;

        $jobOpening->save();

        return redirect(action([self::class, 'index']));
    }
}
