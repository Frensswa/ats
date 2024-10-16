@php
    use App\Http\Controllers\ClientController;
@endphp

@extends('layouts.app')

@section('title')
Create User
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Create client</h1>

        <div class="container mt-4">
            <form method="POST" action="{{ action([ClientController::class, 'update'], ['client' => $client->id]) }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $client->name }}" 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save client</button>
                <a href="{{ route('clients.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection