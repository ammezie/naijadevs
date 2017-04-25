@extends('layouts.app')

@section('content')
    <div class="ui stackable three column centered grid container">
        <div class="column">
            {{-- <h3 class="ui horizontal divider header">LOG IN</h3>

            @include('includes.flash.login_error') --}}

            <form class="ui form" method="POST" action="{{ url('/jobs') }}">
                {{ csrf_field() }}

                <div class="field">
                    <label>Title</label>
                    <input type="text" name="title" placeholder="Job Title" required>
                </div>
              
                <button type="submit" class="ui primary button">POST JOB</button>                
            </form>
        </div>
    </div>
@endsection
