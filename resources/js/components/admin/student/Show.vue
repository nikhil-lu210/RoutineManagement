<template>
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-md-12">
            <div class="card m-b-30">
                <div class="card-header border bottom">
                    <h5 class="mb-0 float-left">{{ studentDetails.name }}</h5>
                    <div class="float-right">
                        <router-link to="/admin/students" class="btn btn-primary btn-sm">
                            <i class="ti-arrow-left"></i> Back
                        </router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="text-center" style="width: 30%;">
                                        Full Name
                                    </th>
                                    <td class="text-center" style="width: 60%;">
                                        {{ studentDetails.name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center" style="width: 30%;">
                                        Email Address
                                    </th>
                                    <td class="text-center" style="width: 60%;">
                                        {{ studentDetails.email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center" style="width: 30%;">
                                        Mobile Number
                                    </th>
                                    <td class="text-center" style="width: 60%;">
                                        {{ studentDetails.mobile }}
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
import axios from 'axios';
    export default{
        name:"ShowStudent",
        data() {
            return {
                studentDetails: {
                    name: null,
                    email: null,
                    mobile: null,
                },
            }
        },
        mounted() {
            let url = `/api/admin/student/show/${this.$route.params.student_id}`;
            // console.log(url);
            axios.get(url).then((response) => {
                this.studentDetails.name = response.data.student.name,
                this.studentDetails.email = response.data.student.email,
                this.studentDetails.mobile = response.data.mobile
            }).catch((error) => {
                console.log(error);
            })
        }
    }
</script>