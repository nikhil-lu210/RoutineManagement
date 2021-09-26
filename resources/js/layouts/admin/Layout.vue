<template>
    <div class="main-wrapper main-wrapper-1">
        <Topnav/>

        <Sidenav/>

        <!-- {{-- Main Content START --}} -->
        <div class="main-content">
           <router-view></router-view>
        </div>
        <!-- {{-- Main Content END --}} -->

        <Footer/>
    </div>
</template>

<script>
import Topnav from './partials/Topnav.vue';
import Sidenav from './partials/Sidenav.vue';
import Footer from './partials/Footer.vue';

export default {
    name: 'Layout',
    components: {
        Topnav,
        Sidenav,
        Footer
    }
}
</script>