@extends('admin.layouts.app')

@section('title', 'Create Job Category')

@section('content')
    <div class="page-content">
        {{ Breadcrumbs::render('categories.create') }}

        <h1 class="page-title"> Add Category</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="portlet light bordered">
                    <div class="portlet-body">

                        <form action="{{ route('categories.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Categorty name" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                                <label>Color</label>
                                <input type="text" class="form-control" name="color" value="{{ old('color') }}" placeholder="Category color" required>
                                @if ($errors->has('color'))
                                    <span class="help-block">
                                        {{ $errors->first('color') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection