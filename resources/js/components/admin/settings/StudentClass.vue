<style lang="scss">
</style>

<template>
    <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title float-left">All Classes</h5>
                        <div class="float-right">
                            <button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#classCreateEditModal">Assign New Class</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Class</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(data,index) in allData" :key="index">
                                        <td class="text-center">{{ index+1 }}</td>
                                        <td class="text-center">
                                            {{ data.title }} 
                                            <span class="text-capitalize" v-if="data.category">({{ data.category }})</span>
                                        </td>
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
            <div class="modal fade" id="classCreateEditModal" tabindex="-1" role="dialog" aria-labelledby="classCreateEditModal-label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="classCreateEditModal-label">Add New Class</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>
                            <div class="modal-body">
                                <!-- @csrf -->
                                <div class="form-group">
                                    <label for="title" class="col-form-label">Class <sup class="required">*</sup></label>
                                    <input type="number" min="1" max="10" minlength="1" maxlength="2" step="1" class="form-control" name="title" placeholder="1" required v-model="formData.title">
                                </div>

                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" id="category" name="category" class="custom-control-input" v-model="formData.category">
                                    <label class="custom-control-label text-capitalize" for="category">Separate Boys & Girls?</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button @click.prevent="storeData" type="submit" class="btn btn-custom">Add Class</button>
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
import axios from 'axios'
    export default{
        name:"StudentClass",
        data(){
            return {
                allData: [],
                formData: {
                    title: null,
                    category: false
                }
            }
        },
        methods:{
            looadAllData() {
                axios.get('/admin/settings/student_class')
                .then((response) => {
                    this.allData = response.data
                })
                .catch((error) => {
                    console.log(error);
                })
            },
            storeData() {
                axios.post('/admin/settings/student_class', {
                    title: this.formData.title,
                    category: this.formData.category
                })
                .then(() => {
                    this.formData.title = null;
                    this.formData.category = false;
                    this.hideModal();
                    this.looadAllData();
                })
                .catch((error) => {
                    console.log(error);
                })
            },
            hideModal() {
                let body = $("body");
                body.removeClass("modal-open");
                body.removeAttr("style");
                let modal = $(".modal");
                modal.removeClass("show");

                $(".modal-backdrop").hide();
            },
        },
        created(){
            this.looadAllData();
        }
    }
</script>