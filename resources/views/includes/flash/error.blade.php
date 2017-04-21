@if (session('error'))
    <div class="ui error message">
        {{ session('error') }}
    </div>
@endif
