<template>
    <!-- Side Nav START -->
    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="#">SRM</a>
            </div>
            <div class="sidebar-user">
                <div class="sidebar-user-details">
                    <div class="user-name">Admin</div>
                    <div class="user-role">admin</div>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Main</li>

                <!-- Dashboard Start -->
                <li class="">
                    <a class="nav-link" href="#">
                        <i data-feather="airplay"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!-- Dashboard Ends -->

                <li class="menu-header">Case</li>

                <!-- Cases Starts -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="menu-toggle nav-link has-dropdown">
                        <i data-feather="hash"></i>
                        <span>Cases</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="">
                            <a class="nav-link" href="#">All Cases</a>
                        </li>

                        <li class="">
                            <a class="nav-link" href="#">Pending</a>
                        </li>
                    </ul>
                </li>
                <!-- Cases Ends -->
            </ul>
        </aside>
    </div>
    <!-- Side Nav END -->
</template>

<script>
export default {
    name: 'Sidenav'
}
</script>