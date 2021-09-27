<style lang="scss" scoped>
</style>

<template>
    <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title float-left">All Routines</h5>
                        <div class="float-right">
                            <input type="text" class="form-control" name="Routine Name" placeholder="Ex: John Doe" required>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Year</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">001</td>
                                        <td class="text-center">2020</td>
                                        <td class="text-center">
                                            <div class="btn-group mr-2">
                                                <router-link to="#" class="btn btn-danger btn-xs">Delete</router-link>
                                                <router-link to="#" class="btn btn-dark btn-xs">Details</router-link>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
    <!-- End row -->
</template>

<script>    
    export default{
        name:"Routines"
    }
</script>