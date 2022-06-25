<nav id="sidebar" class="sidebar js-sidebar">
    <a class="sidebar-brand" href="/dashboard">
        <span class="align-middle">BUBT Alumni</span>
    </a>

    <ul class="sidebar-nav">
        <li class="sidebar-header">
            Menu
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link" href="/dashboard">
                <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link" href="/profile">
                <i class="align-middle" data-feather="user"></i> <span class="  align-middle">Profile</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link" href="/profile">
                <i class="align-middle" data-feather="users"></i> <span class="  align-middle">Members</span>
            </a>

            <ul>
                <li>
                    <a class="sidebar-link" href="{{ route('members.request') }}">
                        <i class="align-middle" data-feather="phone-incoming"></i> <span class="  align-middle">All Requests</span>
                    </a>
                </li>
                <li>
                    <a class="sidebar-link" href="/profile">
                        <i class="align-middle" data-feather="link"></i> <span class="  align-middle">My Referral</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link" href="/profile">
                <i class="align-middle" data-feather="briefcase"></i> <span class="  align-middle">Jobs</span>
            </a>
            <ul>
                <li>
                    <a class="sidebar-link" href="/profile">
                        <i class="align-middle" data-feather="plus"></i> <span class="  align-middle">New</span>
                    </a>
                </li>
                <li>
                    <a class="sidebar-link" href="/profile">
                        <i class="align-middle" data-feather="list"></i> <span class="  align-middle">All</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>


</nav>
