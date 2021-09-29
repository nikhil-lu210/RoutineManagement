<template>
    <!-- Start Leftbar -->
    <div class="leftbar">
        <!-- Start Sidebar -->
        <div class="sidebar">
            <!-- Start Logobar -->
            <div class="logobar" style="margin-bottom: 8px; border-bottom: 0px solid #fff;">
                <router-link to="/" class="logo logo-large">
                    <!-- <img src="{{ show_logo('main_logo') }}" class="img-fluid" alt="logo" /> -->
                    SRM
                </router-link>
                <a to="/" class="logo logo-small">
                    <!-- <img src="{{ show_logo('small_logo') }}" class="img-fluid" alt="logo" /> -->
                    SRM
                </a>
            </div>
            <!-- End Logobar -->
            <!-- Start Navigationbar -->
            <div class="navigationbar">
                <ul class="vertical-menu">
                    <li class="single-menu bg-ucap-secondary">
                        <router-link to="/" class="text-white text-bold">
                            <i class="ti-bar-chart-alt"></i>
                            <span>Dashboard</span>
                        </router-link>
                    </li>

                    <div class="mb-3"></div>

                    <li class="nested-menu">
                        <a href="javaScript:void(0);">
                            <i class="ti-blackboard"></i>
                            <span>Teachers</span>
                            <i class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li class="">
                                <router-link to="/teachers">All Teachers</router-link>
                            </li>
                            <li class="">
                                <router-link to="/teacher/create">Create Teacher</router-link>
                            </li>
                        </ul>
                    </li>

                    <li class="nested-menu">
                        <a href="javaScript:void(0);">
                            <i class="ti-user"></i>
                            <span>Students</span>
                            <i class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li class="">
                                <router-link to="/students">All Students</router-link>
                            </li>
                            <li class="">
                                <router-link to="/student/create">Create Student</router-link>
                            </li>
                        </ul>
                    </li>

                    <li class="nested-menu">
                        <a href="javaScript:void(0);">
                            <i class="ti-layout"></i>
                            <span>Routines</span>
                            <i class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li class="">
                                <router-link to="/routine/current">Current Routine</router-link>
                            </li>
                            <li class="">
                                <router-link to="/routines">All Routines</router-link>
                            </li>
                            <li class="">
                                <router-link to="/routine/create">Create routine</router-link>
                            </li>
                        </ul>
                    </li>

                    <hr>

                    <li class="nested-menu">
                        <a href="javaScript:void(0);">
                            <i class="ti-settings"></i>
                            <span>Settings</span>
                            <i class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li class="">
                                <router-link to="/settings/classes">Class</router-link>
                            </li>
                            <li class="">
                                <router-link to="/settings/subjects">Subject</router-link>
                            </li>
                            <li class="">
                                <router-link to="/settings/years">Year</router-link>
                            </li>
                            <li class="">
                                <router-link to="/settings/sections">Section</router-link>
                            </li>
                        </ul>
                    </li>

                    <hr>

                    <li class="single-menu">
                        <a href="#" class="">
                            <i class="ti-power-off text-danger"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Navigationbar -->
        </div>
        <!-- End Sidebar -->
    </div>
    <!-- End Leftbar -->
</template>

<script>
export default {
    name: 'Sidenav'
}
</script>