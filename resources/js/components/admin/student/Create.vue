<template>
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-md-12">
            <div class="card m-b-30">
                <form>
                    <!-- @csrf -->
                    <div class="card-header border bottom">
                        <h5 class="mb-0">Create New Student</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Full Name<sup class="required">*</sup></label>
                                    <input type="text" class="form-control" name="name" placeholder="Ex: John Doe" required v-model="formData.name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile">Mobile Number<sup class="required">*</sup></label>
                                    <input type="text" class="form-control" name="mobile" placeholder="Ex: 01712345678" required v-model="formData.mobile">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email<sup class="required">*</sup></label>
                                    <input type="email" class="form-control" name="email" placeholder="Ex: johndoe@mail.com" required v-model="formData.email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password<sup class="required">*</sup></label>
                                    <input type="password" class="form-control" name="password" placeholder="Ex: PassWord@2021" required v-model="formData.password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" @click.prevent="storeData" class="btn btn-custom float-right mb-2">Create Student</button>
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
    import axios from 'axios';
    export default{
        name:"CreateStudent",
        data(){
            return {
                allStudents: [],
                formData: {
                    id: null,
                    name: null,
                    mobile: null,
                    email: null,
                    password: null,
                },
            }
        },
        methods: {
            loadAllStudents() {
                axios.get('/admin/student')
                .then((response) => {
                    this.allStudents = response.data
                })
                .catch((error) => {
                    console.log(error);
                })
            },
            
            storeData() {
                axios.post('/admin/student/store', {
                    name: this.formData.name,
                    mobile: this.formData.mobile,
                    email: this.formData.email,
                    password: this.formData.password,
                })
                .then(() => {
                    this.formData.name = null;
                    this.formData.mobile = null;
                    this.formData.email = null;
                    this.formData.password = null;
                    Vue.swal("Success!", "New Student Assigned Successfully.", "success");
                    this.$router.push("/students");
                    this.loadAllStudents();
                })
                .catch((error) => {
                    console.log(error);
                })
            },
        },
        created() {
            this.loadAllStudents();
        }
    }
</script>