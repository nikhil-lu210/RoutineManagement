<template>
    <div class="main-wrapper main-wrapper-1">
        <Topnav/>

        <Sidenav/>

        <!-- {{-- Main Content START --}} -->
        <div class="main-content">
            @yield('main_content')
        </div>
        <!-- {{-- Main Content END --}} -->

        <Footer/>
    </div>
</template>

<script>
import Topnav from 'resources/js/layouts/admin/partials/Topnav';
import Sidenav from 'resources/js/layouts/admin/partials/Sidenav';
import Footer from 'resources/js/layouts/admin/partials/Footer';

export default {
    name: 'Layout',
    components: {
        Topnav,
        Sidenav,
        Footer
    }
}
</script>