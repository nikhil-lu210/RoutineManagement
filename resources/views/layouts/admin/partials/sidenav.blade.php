<!-- Side Nav START -->
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">
              SRM
            </a>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-user-details">
                <div class="user-name">{{ auth()->user()->name }}</div>
                <div class="user-role">{{ auth()->user()->role }}</div>
            </div>
        </div>
        <ul class="sidebar-menu">
            {{-- <li class="menu-header">Main</li> --}}

            {{-- Dashboard Start --}}
            <li class="{{ Request::is('city_corporation') ? 'active' : '' }}">
                <a class="nav-link" href="#">
                    <i data-feather="airplay"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            {{-- Dashboard Ends --}}

            {{-- <li class="menu-header">Case</li> --}}

            {{-- Cases Starts --}}
            <li class="dropdown {{ Request::is('city_corporation/case*') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle nav-link has-dropdown {{ Request::is('city_corporation/case*') ? 'toggled' : '' }}">
                    <i data-feather="hash"></i>
                    <span>Cases</span>
                </a>
                <ul class="dropdown-menu {{ Request::is('city_corporation/case/all*') ? 'd-block' : '' }}">
                    <li class="{{ Request::is('city_corporation/case/all*') ? 'active' : '' }}">
                        <a class="nav-link" href="#">All Cases</a>
                    </li>

                    <li class="{{ Request::is('city_corporation/case/pending*') ? 'active' : '' }}">
                        <a class="nav-link" href="#">Pending</a>
                    </li>
                </ul>
            </li>
            {{-- Cases Ends --}}
        </ul>
    </aside>
</div>
<!-- Side Nav END -->
