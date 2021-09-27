<template>
    <div class="topbar">
        <!-- Start row -->
        <div class="row align-items-center">
            <!-- Start col -->
            <div class="col-md-12 align-self-center">
                <div class="togglebar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="menubar">
                                <a class="menu-hamburger" href="javascript:void();">
                                    <i class="fa fa-sliders" style="font-size: 24px;"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="infobar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item pt-2">
                            <div class="profilebar">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="javascript:void(0);" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="/assets/images/users/profile.svg" class="img-fluid" alt="profile" />
                                        <span class="feather icon-chevron-down live-icon"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                        <div class="dropdown-item">
                                            <div class="profilename">
                                                <h5 class="text-ucap-primary">Admin_Name</h5>
                                            </div>
                                        </div>
                                        <div class="userbox">
                                            <ul class="list-unstyled mb-0">
                                                <li class="media dropdown-item">
                                                    <router-link to="#" class="profile-icon">
                                                        <i class="ti-user"></i>
                                                        <span class="pl-2">Profile</span>
                                                    </router-link>
                                                </li>
                                                <li class="media dropdown-item">
                                                    <a href="javascript:void(0);" class="profile-icon">
                                                        <i class="ti-power-off"></i>
                                                        <span class="pl-2">Logout</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
</template>

<script>
export default {
    name: 'Topnav'
}
</script>