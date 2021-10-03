<style lang="scss">
.btn-dark:disabled {
    &:disabled {
        cursor: no-drop;
    }
}
</style>

<template>
    <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title float-left">All Years</h5>
                        <div class="float-right">
                            <button @click.prevent="resetForm" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#yearCreateEditModal">Assign New Year</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Year</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(data,index) in allYears" :key="index">
                                        <td class="text-center">{{ index+1 }}</td>
                                        <td class="text-center">
                                            {{ data.year }}
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group mr-2">
                                                <button 
                                                    class="btn btn-dark btn-sm"
                                                    data-toggle="modal" 
                                                    data-target="#yearCreateEditModal"
                                                    @click.prevent="loadEditData(index)"
                                                    :disabled="data.year <= currentYear"
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
            <div class="modal fade" id="yearCreateEditModal" tabindex="-1" role="dialog" aria-labelledby="yearCreateEditModal-label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="yearCreateEditModal-label">{{ editMode ? 'Edit Year' : 'Add New Year' }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>
                            <div class="modal-body">
                                <!-- @csrf -->
                                <div class="form-group">
                                    <label for="year" class="col-form-label">Class <sup class="required">*</sup></label>
                                    <input type="number" minlength="4" maxlength="4" :min="currentYear" class="form-control" name="year" :placeholder="currentYear" required v-model="formData.year">
                                    <div class="text-danger text-bold" v-if="formData.errors.has('year')" v-html="formData.errors.get('year')" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button @click.prevent="storeOrUpdate" :disabled="formData.busy" type="submit" class="btn btn-custom">{{ editMode ? 'Update Year' : 'Add Year' }}</button>
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
    import Form from 'vform'

    export default{
        name:"Year",
        data(){
            return {
                allYears: [],
                formData: new Form ({
                    id:null,
                    year: new Date().getFullYear()
                }),
                editMode:false,
                currentYear: new Date().getFullYear()
            }
        },
        methods:{
            loadAllYears() {
                axios.get('/api/admin/settings/year')
                .then((response) => {
                    this.allYears = response.data
                })
                .catch((error) => {
                    console.log(error);
                })
            },
            
            storeData() {
                this.formData.post('/api/admin/settings/year/store', {
                    year: this.formData.year,
                })
                .then(() => {
                    this.formData.year = null;
                    this.hideModal();
                    Vue.swal("Success!", "New Year Created Successfully.", "success");
                    this.loadAllYears();
                })
                .catch((error) => {
                    console.log(error);
                })
            },

            loadEditData(index) {
                this.editMode = true;

                this.formData.id = this.allYears[index].id;
                this.formData.year = this.allYears[index].year;
            },

            resetForm() {
                this.editMode = false;

                this.formData.id = null;
                this.formData.year = new Date().getFullYear();
            },

            storeOrUpdate() {
                if(this.editMode){
                    return this.updateData();
                }else{
                     return this.storeData();
                }
            },

            updateData() {
                let updateUrl = '/api/admin/settings/year/update/' + this.formData.id;
                this.formData.post(updateUrl, {
                    year: this.formData.year,
                })
                .then((response) => {
                    this.hideModal();
                    Vue.swal("Success!", "Year Updated Successfully.", "success");
                    this.loadAllYears();
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
            this.loadAllYears();
        }
    }
</script>