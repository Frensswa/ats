@php
    use App\Http\Controllers\JobOpeningController;
@endphp

@extends('layouts.app')

@section('title')
Create job opening
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Create job opening</h1>

        <div class="container mt-4">
            <form method="POST" action="{{ action([JobOpeningController::class, 'store']) }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}" 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save job opening</button>
                <a href="{{ route('job-openings.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection