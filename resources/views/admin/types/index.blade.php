@extends('admin.layouts.app')

@section('title', 'Job Types')

@section('content')
    <div class="page-content">
        {{ Breadcrumbs::render('types.index') }}

        <h1 class="page-title"> Job Types</h1>

        @include('admin.includes.flash_success')

        <div class="portlet light bordered">
            <div class="portlet-body">
                @if ($types->isEmpty())
                    <p>No types.</p>
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
                            @foreach ($types as $type)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $type->name }}</td>
                                    <td>{{ $type->slug }}</td>
                                    <td>{{ $type->color }}</td>
                                    <td>
                                        <a href="{{ route('types.edit', $type->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a
                                            id="js-delete"
                                            class="delete"
                                            href="{{ route('types.destroy', $type->id) }}"
                                            title="Delete"
                                            data-method="delete"
                                            data-token="{{ csrf_token() }}"
                                            data-confirm="Are you sure?">
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