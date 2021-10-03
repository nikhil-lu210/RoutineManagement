<style lang="scss">
</style>

<template>
    <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title float-left">All Days</h5>
                        <div class="float-right">
                            <button @click.prevent="resetForm" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#dayCreateEditModal">Assign New Day</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Day</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(data,index) in allDays" :key="index">
                                        <td class="text-center">{{ index+1 }}</td>
                                        <td class="text-center">
                                            {{ data.name }}
                                            <sup class="badge badge-dark" v-if="data.holiday">Holiday</sup>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group mr-2">
                                                <button 
                                                    class="btn btn-dark btn-sm"
                                                    data-toggle="modal" 
                                                    data-target="#dayCreateEditModal"
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
            <div class="modal fade" id="dayCreateEditModal" tabindex="-1" role="dialog" aria-labelledby="dayCreateEditModal-label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="dayCreateEditModal-label">{{ editMode ? 'Edit Day' : 'Add New Day' }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>
                            <div class="modal-body">
                                <!-- @csrf -->
                                <div class="form-group">
                                    <label for="title" class="col-form-label">Day Title <sup class="required">*</sup></label>
                                    <select class="form-control" id="name" v-model="formData.name" required>
                                        <option selected>Select Day</option>
                                        <option value="Saturday">Saturday</option>
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thrusday">Thrusday</option>
                                        <option value="Friday">Friday</option>
                                    </select>
                                </div>

                                <div class="form-group text-left">
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" id="holiday" name="holiday" class="custom-control-input" :checked="formData.holiday" v-model="formData.holiday">
                                        <label class="custom-control-label" for="holiday">Holiday?</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button @click.prevent="storeOrUpdate" type="submit" class="btn btn-custom">{{ editMode ? 'Update Day' : 'Add Day' }}</button>
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
        name:"Day",
        data(){
            return {
                allDays: [],
                formData: {
                    id: null,
                    name: null,
                    holiday: false
                },
                editMode: false
            }
        },
        methods:{
            loadAllDays() {
                axios.get('/api/admin/settings/day')
                .then((response) => {
                    this.allDays = response.data
                })
                .catch((error) => {
                    console.log(error);
                })
            },
            
            storeData() {
                axios.post('/api/admin/settings/day/store', {
                    name: this.formData.name,
                    holiday: this.formData.holiday,
                })
                .then(() => {
                    this.formData.name = null;
                    this.formData.holiday = false;
                    this.hideModal();
                    Vue.swal("Success!", "New Day Created Successfully.", "success");
                    this.loadAllDays();
                })
                .catch((error) => {
                    console.log(error);
                })
            },

            loadEditData(index) {
                this.editMode = true;

                this.formData.id = this.allDays[index].id;
                this.formData.name = this.allDays[index].name;
                this.formData.holiday = this.allDays[index].holiday;
            },

            resetForm() {
                this.editMode = false;

                this.formData.id = null;
                this.formData.title = null;
                this.formData.holiday = false;
            },

            storeOrUpdate() {
                if(this.editMode){
                    return this.updateData();
                }else{
                     return this.storeData();
                }
            },

            updateData() {
                let updateUrl = '/api/admin/settings/day/update/' + this.formData.id;
                axios.post(updateUrl, {
                    name: this.formData.name,
                    holiday: this.formData.holiday
                })
                .then((response) => {
                    this.hideModal();
                    Vue.swal("Success!", "Day Updated Successfully.", "success");
                    this.loadAllDays();
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
            this.loadAllDays();
        }
    }
</script>