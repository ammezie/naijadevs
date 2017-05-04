@extends('layouts.app')

@section('title')
    {{ $job->title }}
@stop

@section('content')
    <div class="ui container">
        <h2>{{ $job->title }}</h2>
        @markdown($job->description)
    </div>
@endsection