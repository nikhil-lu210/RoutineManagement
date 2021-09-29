<template>
    <!-- Start row -->
    <div class="row justify-content-center">
        <!-- Start col -->
        <div class="col-md-8">
            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="card-title text-bold text-center">Create New Routine</h4>
                </div>
                <form>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="year">Year<sup class="required">*</sup></label>
                                    <div class="input-group">
                                        <select class="form-control" name="year">
                                            <option selected="">Select Year</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="class">Class<sup class="required">*</sup></label>
                                    <div class="input-group">
                                        <select class="form-control" name="class">
                                            <option selected="">Select Class</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <button type="submit" id="updateInfo" class="btn btn-custom bg-ucap text-bold">
                                Assign Routine
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</template>

<script>
    export default{
        name:"CreateRoutine"
    }
</script>