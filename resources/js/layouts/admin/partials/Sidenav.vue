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
                    <router-link class="nav-link" to="/">
                        <i data-feather="airplay"></i>
                        <span>Dashboard</span>
                    </router-link>
                </li>
                <!-- Dashboard Ends -->

                <li class="menu-header">Case</li>

                <!-- Cases Starts -->
                <li class="dropdown">
                    <li class="">
                        <router-link class="nav-link" to="/teachers">
                            <i data-feather="airplay"></i>
                            <span>All Teachers</span>
                        </router-link>
                    </li>
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