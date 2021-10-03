<style lang="scss">
</style>

<template>
    <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title float-left">All Subjects</h5>
                        <div class="float-right">
                            <button @click.prevent="resetForm" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#subjectCreateEditModal">Assign New Subject</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Subject</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(data,index) in allSubjects" :key="index">
                                        <td class="text-center">{{ index+1 }}</td>
                                        <td class="text-center">
                                            {{ data.name }}
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group mr-2">
                                                <button 
                                                    class="btn btn-dark btn-sm"
                                                    data-toggle="modal" 
                                                    data-target="#subjectCreateEditModal"
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
            <div class="modal fade" id="subjectCreateEditModal" tabindex="-1" role="dialog" aria-labelledby="subjectCreateEditModal-label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="subjectCreateEditModal-label">{{ editMode ? 'Edit Subject' : 'Add New Subject' }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>
                            <div class="modal-body">
                                <!-- @csrf -->
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Class <sup class="required">*</sup></label>
                                    <input type="text" minlength="1" maxlength="100" class="form-control" name="name" placeholder="Ex. Mathematics" required v-model="formData.name">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button @click.prevent="storeOrUpdate" type="submit" class="btn btn-custom">{{ editMode ? 'Update Subject' : 'Add Subject' }}</button>
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
        name:"Subject",
        data(){
            return {
                allSubjects: [],
                formData: {
                    id:null,
                    name: null,
                },
                editMode:false
            }
        },
        methods:{
            loadAllSubjects() {
                axios.get('/api/admin/settings/subject')
                .then((response) => {
                    this.allSubjects = response.data
                })
                .catch((error) => {
                    console.log(error);
                })
            },
            
            storeData() {
                axios.post('/api/admin/settings/subject/store', {
                    name: this.formData.name,
                })
                .then(() => {
                    this.formData.name = null;
                    this.hideModal();
                    Vue.swal("Success!", "New Subject Created Successfully.", "success");
                    this.loadAllSubjects();
                })
                .catch((error) => {
                    console.log(error);
                })
            },

            loadEditData(index) {
                this.editMode = true;

                this.formData.id = this.allSubjects[index].id;
                this.formData.name = this.allSubjects[index].name;
            },

            resetForm() {
                this.editMode = false;

                this.formData.id = null;
                this.formData.name = null;
            },

            storeOrUpdate() {
                if(this.editMode){
                    return this.updateData();
                }else{
                     return this.storeData();
                }
            },

            updateData() {
                let updateUrl = '/api/admin/settings/subject/update/' + this.formData.id;
                axios.post(updateUrl, {
                    name: this.formData.name,
                })
                .then((response) => {
                    this.hideModal();
                    Vue.swal("Success!", "Subject Updated Successfully.", "success");
                    this.loadAllSubjects();
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
            this.loadAllSubjects();
        }
    }
</script>