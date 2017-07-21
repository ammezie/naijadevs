@extends('layouts.app')

@section('title', 'About')
@section('meta-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them.')
@section('og-title', 'About Naijadevs')
@section('og-url', url('/about'))
@section('og-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')
@section('twitter-title', 'About Naijadevs')
@section('twitter-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')

@section('content')
    <div class="ui container">
        <h1 class="ui header">About</h1>

        <p>
            Naijadevs connects talented Nigerian developers and designers with companies who need them.
        </p>
    </div>
@endsection