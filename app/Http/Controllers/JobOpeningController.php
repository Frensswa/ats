<?php

namespace App\Http\Controllers;

use App\Models\JobOpening;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class JobOpeningController
{
    use AuthorizesRequests;

    public function index(): View
    {
        //$this->authorize('index', JobOpening::class);
        $clientID = Auth::user()->clientID;

        $jobOpenings = JobOpening::where('clientID', $clientID)->get();
        return view('job-openings.index', ['jobOpenings' => $jobOpenings]);
    }

    public function create(): View
    {
        //$this->authorize('create', JobOpening::class);

        return view('job-openings.create', ['jobOpening' => new JobOpening]);
    }

    public function edit(JobOpening $jobOpening): View
    {
        //$this->authorize('edit', $jobOpening);
        return view('job-openings.edit', ['jobOpening' => $jobOpening]);
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

        $clientID = Auth::user()->clientID;
        $jobOpening = new JobOpening();
        $jobOpening->name = $request->name;
        $jobOpening->clientID = $clientID;

        $jobOpening->save();

        return redirect(action([self::class, 'edit'], $jobOpening->id));
    }
}
