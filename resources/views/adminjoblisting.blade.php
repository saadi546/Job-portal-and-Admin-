@extends('layouts.adminmaster') <!-- Assuming you have a layout for your admin panel -->

@section('content')

<h1 class="mb-4">Admin Job Listings</h1>
<div class="container">
    

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Job Image</th>
                <th>Title</th>
                <th>Location</th>
                <th>Published Date</th>
                <th>Salary</th>
                <th>Job Nature</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
            <tr>
                <td>{{ $job->id }}</td>
                <td>{{ $job->job_image }}</td>
                <td>{{ $job->job_title }}</td>
                <td>{{ $job->job_location }}</td>
                <td>{{ $job->published_date }}</td>
                <td>${{ number_format($job->salary, 2) }}</td>
                <td>{{ $job->job_nature }}</td>
                <td>
                    {{-- <a href="{{ route('jobs.admin.listing', ['id' => $job->id]) }}" class="btn btn-primary btn-sm">Edit</a> --}}
                    <form action="{{ route('joblistings.destroy', $job->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this job?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
