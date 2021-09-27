<template>
    <div class="topbar-mobile">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="mobile-logobar">
                    <router-link to="/" class="mobile-logo">
                        <!-- <img src="{{ show_logo('main_logo') }}" class="img-fluid" alt="logo"/> -->
                        SRM
                    </router-link>
                </div>
                <div class="mobile-togglebar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="topbar-toggle-icon">
                                <a class="topbar-toggle-hamburger" href="javascript:void();">
                                    <i class="fa fa-navicon" style="font-size: 24px;"></i>
                                </a>
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="menubar">
                                <a class="menu-hamburger" href="javascript:void();">
                                    <i class="fa fa-sliders" style="font-size: 24px;"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'TopnavMobile'
}
</script>