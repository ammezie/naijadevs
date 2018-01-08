@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="page-content">
        {{ Breadcrumbs::render('dashboard') }}

        <h1 class="page-title"> Blank Page Layout
            <small>blank page layout</small>
        </h1>

        <div class="note note-info">
            <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p>
        </div>
    </div>
@endsection