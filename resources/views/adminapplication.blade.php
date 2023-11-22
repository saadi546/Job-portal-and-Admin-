@extends('layouts.adminmaster') <!-- Assuming you have a layout for your application -->

@section('content')
<h1>Applications</h1>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Job Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Portfolio</th>
            <th>Cover Letter</th>
            <th>Download CV</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($applications as $application)
            <tr>
                <td>{{ $application->id }}</td>
                <td>{{ $application->job_id }}</td>
                <td>{{ $application->name }}</td>
                <td>{{ $application->email }}</td>
                <td>{{ $application->portfolio_link }}</td>
                <td>{{ $application->cover_letter }}</td>
                <td>
                   <?php $url=urlencode(base64_encode($application->resume_path)); ?>
                    <a href="{{ route('download.cv',["url"=>$url])}}" class="btn btn-primary">Download CV</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

