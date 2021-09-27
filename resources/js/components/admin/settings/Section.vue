<style lang="scss">
</style>

<template>
    <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title float-left">All Sections</h5>
                        <div class="float-right">
                            <button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#sectionCreateEditModal">Assign New Section</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Section</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">001</td>
                                        <td class="text-center">Section</td>
                                        <td class="text-center">
                                            <div class="btn-group mr-2">
                                                <router-link to="#" class="btn btn-info btn-xs">Edit</router-link>
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

            <!-- Modal Starts Here -->
            <div class="modal fade" id="sectionCreateEditModal" tabindex="-1" role="dialog" aria-labelledby="sectionCreateEditModal-label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="sectionCreateEditModal-label">Add New Section</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="#" method="POST">
                            <div class="modal-body">
                                <!-- @csrf -->
                                <div class="form-group">
                                    <label for="title" class="col-form-label">Section Title <sup class="required">*</sup></label>
                                    <input type="text" minlength="1" maxlength="10" class="form-control" name="title" placeholder="Ex: A" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-custom">Add Section</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Ends Here -->
        </div>
    <!-- End row -->
</template>

<script>
    export default{
        name:"Section"
    }
</script>