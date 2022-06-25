<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('admin::home')}}">{{config('illumineadmin.app_name')}}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('admin::home')}}">{{config('illumineadmin.app_short_name')}}</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="nav-item dropdown {{ request()->is('*welcome*') ? 'active' : '' }}">
                <a href="{{ route('admin::home') }}" class="nav-link"><i class="fas fa-columns"></i><span>Dashboard</span></a>
            </li>



            @if(auth_admin()->canDo(['user.create', 'user.list']))
            <li class="nav-item dropdown {{ request()->is('*users*') ? 'active' : '' }} ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i> <span>Users</span></a>
                <ul class="dropdown-menu">
                    @if(auth_admin()->canDo(['user.list']))
                    <li class="{{ request()->is('*users') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin::user.index') }}"><i class="fas fa-list"></i> <span>All</span></a></li>
                    @endif
                    @if(auth_admin()->canDo(['user.create']))
                    <li class="{{ request()->is('*users/create') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin::user.create') }}"><i class="fas fa-user-plus"></i> <span>Create</span></a></li>
                    @endif
                </ul>
            </li>
            @endif

            @if(auth_admin()->canDo(['role.create', 'role.list']))
            <li class="nav-item dropdown {{ request()->is('*roles*') ? 'active' : '' }} ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-universal-access"></i> <span>Roles</span></a>
                <ul class="dropdown-menu">
                    @if(auth_admin()->canDo(['role.list']))
                    <li class="{{ request()->is('*roles') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin::role.index') }}"><i class="fas fa-list"></i> <span>All</span></a></li>
                    @endif
                    @if(auth_admin()->canDo('role.create'))
                    <li class="{{ request()->is('*roles/create') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin::role.create') }}"><i class="fas fa-plus"></i> <span>Create</span></a></li>
                    @endif
                </ul>
            </li>
            @endif

            <!-- Customers -->
            @if(auth_admin()->canDo(['alumni.create', 'alumni.list']))
                <li class="nav-item dropdown {{ request()->is('*admin/alumni*') ? 'active' : '' }} ">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-tie"></i> <span>Alumni</span></a>
                    <ul class="dropdown-menu">
                        @if(auth_admin()->canDo(['alumni.list']))
                            <li class="{{ request()->is('*alumni') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin::alumni.index') }}"><i class="fas fa-list"></i> <span>All</span></a></li>
                        @endif
                        @if(auth_admin()->canDo('alumni.create'))
                            <li class="{{ request()->is('*alumni/create') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin::alumni.create') }}"><i class="fas fa-plus"></i> <span>Create</span></a></li>
                        @endif
                        @if(auth_admin()->canDo('alumni.verify'))
                            <li class="{{ request()->is('*alumni/requests') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin::alumni.requests') }}"><i class="fas fa-user-plus"></i> <span>Requests</span></a></li>
                        @endif

                    </ul>
                </li>
            @endif



        </ul>
    </aside>
</div>
