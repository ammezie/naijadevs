@extends('admin.layouts.app')

@section('title', 'Users')

@section('content')
    <div class="page-content">
        {{ Breadcrumbs::render('users.index') }}

        <h1 class="page-title"> Users</h1>

        @include('admin.includes.flash_success')

        <div class="portlet light bordered">
            <div class="portlet-body">
                @if ($users->isEmpty())
                    <p>No users.</p>
                @else
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Company</th>
                                <th>Website</th>
                                <th>Joined</th>
                                <th colspan="3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->company_name }}</td>
                                    <td>{{ $user->company_website }}</td>
                                    <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a
                                            href="{{ url('companies', $user->company_slug) }}"
                                            target="_blank">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('users.edit', $user->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a
                                            id="js-delete"
                                            class="delete"
                                            href="{{ route('users.destroy', $user->id) }}"
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