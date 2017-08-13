@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">Blank Page</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Page Layouts</span>
                </li>
            </ul>
        </div>
        
        <h1 class="page-title"> Blank Page Layout
            <small>blank page layout</small>
        </h1>
        
        <div class="note note-info">
            <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p>
        </div>
    </div>
@endsection