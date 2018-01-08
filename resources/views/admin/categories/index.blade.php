@extends('admin.layouts.app')

@section('title', 'Job Categories')

@section('content')
    <div class="page-content">
        {{ Breadcrumbs::render('categories.index') }}

        <h1 class="page-title"> Categories</h1>

        @include('admin.includes.flash_success')

        <div class="portlet light bordered">
            <div class="portlet-body">
                @if ($categories->isEmpty())
                    <p>No categories.</p>
                @else
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Color</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->color }}</td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="">
                                            <i class="font-red fa fa-trash-o" ></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection