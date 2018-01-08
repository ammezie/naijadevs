<div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <li class="sidebar-toggler-wrapper hide">
            <div class="sidebar-toggler">
                <span></span>
            </div>
        </li>
        <li class="nav-item start">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
            </a>
        </li>
        {{--  <li class="nav-item start">
            <a href="{{ route('admin.users') }}" class="nav-link">
                <i class="icon-users"></i>
                <span class="title">Users</span>
            </a>
        </li>
        <li class="nav-item start">
            <a href="{{ route('admin.jobs') }}" class="nav-link">
                <i class="icon-list"></i>
                <span class="title">Jobs</span>
            </a>
        </li>  --}}
        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-list"></i>
                <span class="title">Job Categories</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item start">
                    <a href="{{ route('categories.create') }}" class="nav-link">
                        <span class="title">Add Category</span>
                    </a>
                </li>
                <li class="nav-item start">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <span class="title">Categories</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-list"></i>
                <span class="title">Job Types</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item start">
                    <a href="{{ route('types.create') }}" class="nav-link">
                        <span class="title">Add Type</span>
                    </a>
                </li>
                <li class="nav-item start">
                    <a href="{{ route('types.index') }}" class="nav-link">
                        <span class="title">Types</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>