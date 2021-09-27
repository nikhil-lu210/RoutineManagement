<template>
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Page_Name</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <router-link to="/">
                                <i class="fa fa-home"></i>
                            </router-link>
                        </li>
                        <!-- @yield('breadcrumb') -->
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <!-- @yield('action') -->
                </div>                        
            </div>
        </div>          
    </div>
</template>

<script>
export default {
    name: 'Breadcrumb'
}
</script>