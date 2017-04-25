@extends('layouts.app')

@section('content')
    <div class="ui container">
        @foreach ($jobs as $job)
            <h3>{{ $job->title }}</h3>
            <p>{{ $job->description }}</p>
        @endforeach
    </div>
@endsection
