<template>
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-md-12">
            <div class="card m-b-30">
                <form action="#" method="post" enctype="multipart/form-data">
                    <!-- @csrf -->
                    <div class="card-header border bottom">
                        <h5 class="mb-0">Create New Student</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Full Name<sup class="required">*</sup></label>
                                    <input type="text" class="form-control" name="name" placeholder="Ex: John Doe" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email<sup class="required">*</sup></label>
                                    <input type="email" class="form-control" name="email" placeholder="Ex: johndoe@mail.com" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password">Password<sup class="required">*</sup></label>
                                    <input type="password" class="form-control" name="password" placeholder="Ex: PassWord@2021" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password">Confirm Password<sup class="required">*</sup></label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Ex: PassWord@2021" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-custom float-right mb-2">Create Student</button>
                        <button type="reset" class="btn btn-danger float-right mb-2 mr-1" onclick="return confirm('Are You Sure Want To Reset?');">Reset</button>
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
        name:"CreateStudent"
    }
</script>