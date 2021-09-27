<template>
    <!-- Start Containerbar -->
    <div id="containerbar">
        <!-- Start Leftbar -->
        <Sidenav/>
        <!-- End Leftbar -->

        <!-- Start Rightbar -->
        <div class="rightbar">
            <!-- Start Topbar Mobile -->
            <TopnavMobile/>
            <!-- Start Topbar -->
            <Topnav/>
            <!-- End Topbar -->

            <!-- Start Breadcrumbbar -->
            <Breadcrumb/>
            <!-- End Breadcrumbbar -->

            <!-- Start Contentbar -->
            <div class="contentbar">
                <!-- Start Main Content -->
                    <router-view></router-view>
                <!-- End Main Content -->
            </div>
            <!-- End Contentbar -->

            
            <!-- Start Footerbar -->
            <Footer/>
            <!-- End Footerbar -->
        </div>
        <!-- End Rightbar -->
    </div>
    <!-- End Containerbar -->
</template>

<script>
import Topnav from './partials/Topnav.vue';
import TopnavMobile from './partials/TopnavMobile.vue';
import Sidenav from './partials/Sidenav.vue';
import Breadcrumb from './partials/Breadcrumb.vue';
import Footer from './partials/Footer.vue';

export default {
    name: 'Layout',
    components: {
        Topnav,
        TopnavMobile,
        Sidenav,
        Breadcrumb,
        Footer
    }
}
</script>