<style lang="scss" scoped>
</style>

<template>
    <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title float-left">All Teachers</h5>
                        <div class="float-right">
                            <input type="text" class="form-control" name="Teacher Name" placeholder="Ex: John Doe" required>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(data,index) in allTeachers" :key="index">
                                        <td class="text-center">{{ index+1 }}</td>
                                        <td>{{ data.teacher.name }}</td>
                                        <td>{{ data.teacher.email }}</td>
                                        <td>{{ data.mobile }}</td>
                                        <td class="text-center">
                                            <div class="btn-group mr-2">
                                                <!-- <router-link to="#" class="btn btn-danger btn-xs">Delete</router-link> -->
                                                <!-- <router-link to="#" class="btn btn-info btn-xs">Edit</router-link> -->
                                                <router-link :to="`/admin/teacher/show/${ data.id }`" class="btn btn-dark btn-xs">Details</router-link>
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
        name:"Teachers",
        data(){
            return {
                allTeachers: []
            }
        },
        methods: {
            loadAllTeachers() {
                axios.get('/api/admin/teacher')
                .then((response) => {
                    // console.log(response.data);
                    this.allTeachers = response.data
                })
                .catch((error) => {
                    console.log(error);
                })
            }
        },
        created() {
            this.loadAllTeachers();
        }
    }
</script>