@extends('layouts.app')

@section('title')
Job Openings
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Job Openings</h5>

            <div class="mb-2 text-end">
                <a href="{{ route('job-openings.create') }}" class="btn btn-primary btn-sm float-right">Add job opening</a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" width="1%">#</th>
                        <th scope="col" width="15%">Name</th>
                        <th scope="col" width="1%" colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobOpenings as $jobOpening)
                    <tr>
                        <th scope="row">{{ $jobOpening->id }}</th>
                        <td>{{ $jobOpening->name }}</td>
                        <td><a href="{{ route('job-openings.edit', $jobOpening->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                        <td>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection