@extends('layouts.app')

@section('title', 'About')
@section('meta-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them.')
@section('og-title', 'About Naijadevs')
@section('og-url', url('/about'))
@section('og-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')
@section('twitter-title', 'About Naijadevs')
@section('twitter-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')

@section('content')
    <div class="ui container" style="padding-top: 50px; padding-bottom: 50px">
        <div class="ui basic segment bgWhite roundBordered">
            <h1 class="ui dividing header">About</h1>

            <p>
                Naijadevs is a job site that connects talented Nigerian developers and designers with companies and individuals who need them. It helps companies get their jobs across more Nigerian developers and also makes it easier for Nigerian developers apply for jobs.
            </p>

            <h2>Get In Touch</h2>
            <p>
                You can get in touch with us by shooting an email to <a href="mailto:hello@naijadevs.ng">hello@naijadevs.ng</a>, and we will get back to you not later than 48 hours from time of receipt.
            </p>
        </div>
    </div>
@endsection