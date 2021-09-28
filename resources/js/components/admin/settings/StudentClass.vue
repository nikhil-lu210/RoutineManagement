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
                            <button @click.prevent="resetForm" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#classCreateEditModal">Assign New Class</button>
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
                                    <tr v-for="(data,index) in allClasses" :key="index">
                                        <td class="text-center">{{ index+1 }}</td>
                                        <td class="text-center">
                                            {{ data.title }} 
                                            <span class="text-capitalize" v-if="data.category">({{ data.category }})</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group mr-2">
                                                <button 
                                                    class="btn btn-dark btn-sm"
                                                    data-toggle="modal" 
                                                    data-target="#classCreateEditModal"
                                                    @click.prevent="loadEditData(index)"
                                                 >
                                                    Edit
                                                </button>
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
                            <h5 class="modal-title" id="classCreateEditModal-label">{{ editMode ? 'Edit Class' : 'Add New Class' }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>
                            <div class="modal-body">
                                <!-- @csrf -->
                                <div class="form-group">
                                    <label for="title" class="col-form-label">Class <sup class="required">*</sup></label>
                                    <input type="text" minlength="1" maxlength="20" class="form-control" name="title" placeholder="Ex. Nursery" required v-model="formData.title">
                                </div>

                                <div class="form-group">
                                    <label for="category" class="col-form-label">Category</label>
                                    <select class="form-control" id="category" v-model="formData.category">
                                        <option value="">Select Category</option>
                                        <option value="boys">Boys</option>
                                        <option value="girls">Girls</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button @click.prevent="storeOrUpdate" type="submit" class="btn btn-custom">{{ editMode ? 'Update Class' : 'Add Class' }}</button>
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
    import axios from 'axios';
    export default{
        name:"StudentClass",
        data(){
            return {
                allClasses: [],
                formData: {
                    id:null,
                    title: null,
                    category: null
                },
                editMode:false
            }
        },
        methods:{
            loadallClasses() {
                axios.get('/admin/settings/student_class')
                .then((response) => {
                    this.allClasses = response.data
                })
                .catch((error) => {
                    console.log(error);
                })
            },
            
            storeData() {
                axios.post('/admin/settings/student_class/store', {
                    title: this.formData.title,
                    category: this.formData.category
                })
                .then(() => {
                    this.formData.title = null;
                    this.formData.category = null;
                    this.hideModal();
                    Vue.swal("Success!", "New Class Created Successfully.", "success");
                    this.loadallClasses();
                })
                .catch((error) => {
                    console.log(error);
                })
            },

            loadEditData(index) {
                this.editMode = true;

                this.formData.id = this.allClasses[index].id;
                this.formData.title = this.allClasses[index].title;
                this.formData.category = this.allClasses[index].category;
            },

            resetForm() {
                this.editMode = false;

                this.formData.id = null;
                this.formData.title = null;
                this.formData.category = null;
            },

            storeOrUpdate() {
                if(this.editMode){
                    return this.updateData();
                }else{
                     return this.storeData();
                }
            },

            updateData() {
                let updateUrl = '/admin/settings/student_class/update/' + this.formData.id;
                axios.post(updateUrl, {
                    title: this.formData.title,
                    category: this.formData.category
                })
                .then((response) => {
                    this.hideModal();
                    Vue.swal("Success!", "Class Updated Successfully.", "success");
                    this.loadallClasses();
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
        created() {
            this.loadallClasses();
        }
    }
</script>