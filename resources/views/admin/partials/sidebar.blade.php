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
            @if(auth_admin()->canDo(['customer.create', 'customer.list']))
                <li class="nav-item dropdown {{ request()->is('*admin/customers*') ? 'active' : '' }} ">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-tie"></i> <span>Customers</span></a>
                    <ul class="dropdown-menu">
                        @if(auth_admin()->canDo(['customer.list']))
                            <li class="{{ request()->is('*customers') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin::customer.index') }}"><i class="fas fa-list"></i> <span>All</span></a></li>
                        @endif
                        @if(auth_admin()->canDo('customer.create'))
                            <li class="{{ request()->is('*customers/create') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin::customer.create') }}"><i class="fas fa-plus"></i> <span>Create</span></a></li>
                        @endif

                    </ul>
                </li>
            @endif

            <!-- Account manager  -->
            @if(auth_admin()->canDo(['account_manager.create', 'account_manager.list']))
                <li class="nav-item dropdown {{ request()->is('*admin/account-manager*') ? 'active' : '' }} ">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-cog"></i> <span>Account Manager</span></a>
                    <ul class="dropdown-menu">
                        @if(auth_admin()->canDo(['customer.list']))
                            <li class="{{ request()->is('*account-manager') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin::manager.index') }}"><i class="fas fa-list"></i> <span>All</span></a></li>
                        @endif
                        @if(auth_admin()->canDo('customer.create'))
                            <li class="{{ request()->is('*account-manager/create') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin::manager.create') }}"><i class="fas fa-plus"></i> <span>Create</span></a></li>
                        @endif

                    </ul>
                </li>
            @endif

             <!-- Subscriptions -->
             @if(auth_admin()->canDo(['subscription.list']))
                <li class="nav-item dropdown {{ request()->is('*admin/subscriptions*') ? 'active' : '' }} ">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-handshake"></i> <span>Subscriptions</span></a>
                    <ul class="dropdown-menu">
                        @if(auth_admin()->canDo(['subscription.list']))
                            <li class="{{ request()->is('*admin/subscriptions') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin::subscription.index') }}"><i class="fas fa-list"></i> <span>All</span></a></li>
                        @endif

                    </ul>
                </li>
            @endif

            <!-- Trading accounts -->
            @if(auth_admin()->canDo(['trading_account.list']))
                <li class="nav-item dropdown {{ request()->is('*admin/trading_accounts*') ? 'active' : '' }} ">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-id-badge"></i> <span>Trading Accounts</span></a>
                    <ul class="dropdown-menu">
                        @if(auth_admin()->canDo('trading_account.list'))
                            <li class="{{ request()->is('*trading_accounts') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin::trading_account.index') }}"><i class="fas fa-list"></i> <span>All</span></a></li>
                        @endif
                    </ul>
                </li>
            @endif

            <!-- Payouts -->
            @if(auth_admin()->canDo(['payout.list']))
                <li class="nav-item dropdown {{ request()->is('*payouts*') ? 'active' : '' }} ">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-invoice-dollar"></i> <span>Payouts</span></a>
                    <ul class="dropdown-menu">
                        @if(auth_admin()->canDo('payout.list'))
                            <li class="{{ request()->is('*payouts') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin::payout.index') }}"><i class="fas fa-list"></i> <span>All</span></a></li>
                        @endif
                    </ul>
                </li>
            @endif

             <!-- Plan -->
            @if(auth_admin()->canDo(['plan.create', 'plan.list']))
                <li class="nav-item dropdown {{ request()->is('*plans*') ? 'active' : '' }} ">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-sim-card"></i> <span>Plans</span></a>
                    <ul class="dropdown-menu">
                        @if(auth_admin()->canDo('plan.list'))
                            <li class="{{ request()->is('*plans') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin::plan.index') }}"><i class="fas fa-list"></i> <span>All</span></a></li>
                        @endif
                        @if(auth_admin()->canDo('plan.create'))
                            <li class="{{ request()->is('*plans/create') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin::plan.create') }}"><i class="fas fa-plus"></i> <span>Create</span></a></li>
                        @endif
                    </ul>
                </li>
            @endif

            <!-- Top-up & Reset -->
            @if(auth_admin()->canDo(['trading_account_request.list']))
                <li class="nav-item dropdown {{ request()->is('*trading_account_requests*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-charging-station"></i> <span>Top-up & Reset</span></a>
                    <ul class="dropdown-menu">
                        @if(auth_admin()->canDo(['trading_account_request.list']))
                            <li class="{{ request()->is('*trading_account_requests') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin::trading_account_request.index') }}"><i class="fas fa-list"></i> <span>All</span></a></li>
                        @endif
                    </ul>
                </li>
            @endif

            <!-- Utility -->
            @if(auth_admin()->canDo(['utility.create', 'utility.list']))
                <li class="nav-item dropdown {{ request()->is('*utilities*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-download"></i> <span>Utilities</span></a>
                    <ul class="dropdown-menu">
                        @if(auth_admin()->canDo('utility.list'))
                            <li class="{{ request()->is('*utilities') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin::utility.index') }}"><i class="fas fa-list"></i> <span>All</span></a></li>
                        @endif
                        @if(auth_admin()->canDo('utility.create'))
                            <li class="{{ request()->is('*utilities/create') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin::utility.create') }}"><i class="fas fa-plus"></i> <span>Create</span></a></li>
                        @endif
                    </ul>
                </li>
            @endif


            <!-- Utility Category -->
            @if(auth_admin()->canDo(['utility_category.create', 'utility_category.list']))
                <li class="nav-item dropdown {{ request()->is('*utility_categories*') ? 'active' : '' }} ">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-sitemap"></i> <span>Utility Categories</span></a>
                    <ul class="dropdown-menu">
                        @if(auth_admin()->canDo('utility_category.list'))
                            <li class="{{ request()->is('*utility_categories') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin::utility_category.index') }}"><i class="fas fa-list"></i> <span>All</span></a></li>
                        @endif
                        @if(auth_admin()->canDo('utility_category.create'))
                            <li class="{{ request()->is('*utility_categories/create') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin::utility_category.create') }}"><i class="fas fa-plus"></i> <span>Create</span></a></li>
                        @endif
                    </ul>
                </li>
            @endif

            <!-- Marketing -->
            @if(auth_admin()->canDo(['marketing.customer_list', 'abundant_cart.list']))
                <li class="nav-item dropdown {{ request()->is('*admin/marketing*') ? 'active' : '' }} ">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-paper-plane"></i> <span>Marketing</span></a>
                    <ul class="dropdown-menu">
                        @if(auth_admin()->canDo('marketing.customer_list'))
                            <li class="{{ request()->is('*/marketing/customers') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin::marketing.customer_list') }}"><i class="fas fa-user-tie"></i> <span>Customer List</span></a></li>
                        @endif
                        @if(auth_admin()->canDo('marketing.push_notification'))
                            <li class="{{ request()->is('*/marketing/push_notification') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin::marketing.index') }}"><i class="fas fa-bell"></i> <span>Push Notification</span></a></li>
                        @endif
                        @if(auth_admin()->canDo('abundant_cart.list'))
                            <li class="{{ request()->is('*/marketing/abundant_cart') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin::marketing.abundant_cart') }}"><i class="fas fa-shopping-cart"></i> <span>Abundant cart</span></a></li>
                        @endif
                    </ul>
                </li>
            @endif

            <!-- Command -->
            {{-- @if(auth_admin()->canDo(['task.execute']))
                <li class="nav-item dropdown {{ request()->is('*tasks*') ? 'active' : '' }} ">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-tasks"></i> <span>Tasks</span></a>
                    <ul class="dropdown-menu">
                        @if(auth_admin()->canDo(['task.execute']))
                            <li class="{{ request()->is('*tasks/execution') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin::task.execution') }}"><i class="fas fa-cogs"></i> <span>Execution</span></a></li>
                        @endif
                    </ul>
                </li>
            @endif --}}

            <!-- Settings -->
            @if(auth_admin()->canDo(['setting.update', 'on_board_page.update', 'on_board_page.preview']))
                <li class="nav-item dropdown {{ request()->is('*settings*') ? 'active' : '' }} ">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i> <span>Settings</span></a>
                    <ul class="dropdown-menu">
                        @if(auth_admin()->canDo('setting.update'))
                            <li class="{{ request()->is('*settings/edit') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin::setting.edit') }}"><i class="fas fa-wrench"></i> <span>Edit</span></a></li>
                        @endif
                        @if(auth_admin()->canDo(['on_board_page.update', 'on_board_page.preview']))
                            <li class="{{ request()->is('*settings/on_board_page') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin::setting.on_board_page') }}"><i class="fas fa-file"></i> <span>On-board Page</span></a></li>
                        @endif
                    </ul>
                </li>
            @endif


        </ul>
    </aside>
</div>
