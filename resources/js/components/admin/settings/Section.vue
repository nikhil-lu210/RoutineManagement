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
                            <button @click.prevent="resetForm" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#sectionCreateEditModal">Assign New Section</button>
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
                                    <tr v-for="(data,index) in allSections" :key="index">
                                        <td class="text-center">{{ index+1 }}</td>
                                        <td class="text-center">
                                            {{ data.title }}
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group mr-2">
                                                <button 
                                                    class="btn btn-dark btn-sm"
                                                    data-toggle="modal" 
                                                    data-target="#sectionCreateEditModal"
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
            <div class="modal fade" id="sectionCreateEditModal" tabindex="-1" role="dialog" aria-labelledby="sectionCreateEditModal-label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="sectionCreateEditModal-label">{{ editMode ? 'Edit Section' : 'Add New Section' }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>
                            <div class="modal-body">
                                <!-- @csrf -->
                                <div class="form-group">
                                    <label for="title" class="col-form-label">Section Title <sup class="required">*</sup></label>
                                    <input type="text" minlength="1" maxlength="50" class="form-control" name="title" placeholder="Ex. Lili" required v-model="formData.title">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button @click.prevent="storeOrUpdate" type="submit" class="btn btn-custom">{{ editMode ? 'Update Section' : 'Add Section' }}</button>
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
        name:"Section",
        data(){
            return {
                allSections: [],
                formData: {
                    id:null,
                    title: null,
                },
                editMode:false
            }
        },
        methods:{
            loadAllSections() {
                axios.get('/api/admin/settings/section')
                .then((response) => {
                    this.allSections = response.data
                })
                .catch((error) => {
                    console.log(error);
                })
            },
            
            storeData() {
                axios.post('/api/admin/settings/section/store', {
                    title: this.formData.title,
                })
                .then(() => {
                    this.formData.title = null;
                    this.hideModal();
                    Vue.swal("Success!", "New Section Created Successfully.", "success");
                    this.loadAllSections();
                })
                .catch((error) => {
                    console.log(error);
                })
            },

            loadEditData(index) {
                this.editMode = true;

                this.formData.id = this.allSections[index].id;
                this.formData.title = this.allSections[index].title;
            },

            resetForm() {
                this.editMode = false;

                this.formData.id = null;
                this.formData.title = null;
            },

            storeOrUpdate() {
                if(this.editMode){
                    return this.updateData();
                }else{
                     return this.storeData();
                }
            },

            updateData() {
                let updateUrl = '/api/admin/settings/section/update/' + this.formData.id;
                axios.post(updateUrl, {
                    title: this.formData.title,
                })
                .then((response) => {
                    this.hideModal();
                    Vue.swal("Success!", "Section Updated Successfully.", "success");
                    this.loadAllSections();
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
            this.loadAllSections();
        }
    }
</script>