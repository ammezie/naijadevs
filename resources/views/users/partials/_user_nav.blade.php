<div class="ui fluid vertical pointing menu">
    <div class="item">
        <div class="header">Jobs</div>
        <div class="menu">
            <a class="{{ set_active('my-jobs') }} item" href="{{ url('/my-jobs') }}">My Jobs</a>
        </div>
    </div>
    <div class="item">
        <div class="header">Account</div>
        <div class="menu">
            <a class="{{ set_active('settings/account') }} item" href="{{ url('/settings/account') }}">Profile</a>
            <a class="{{ set_active('settings/company') }} item" href="{{ url('/settings/company') }}">Company</a>
        </div>
    </div>
</div>