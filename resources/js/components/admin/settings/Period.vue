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
                        <h5 class="card-title float-left">All Periods</h5>
                        <div class="float-right">
                            <button @click.prevent="resetForm" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#periodCreateEditModal">Assign New Period</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Period</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(data,index) in allPeriods" :key="index">
                                        <td class="text-center">{{ index+1 }}</td>
                                        <td class="text-center text-bold">
                                            {{ timeFormat(data.start) }} - {{ timeFormat(data.end) }}
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group mr-2">
                                                <button 
                                                    class="btn btn-dark btn-sm"
                                                    data-toggle="modal" 
                                                    data-target="#periodCreateEditModal"
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
            <div class="modal fade" id="periodCreateEditModal" tabindex="-1" role="dialog" aria-labelledby="periodCreateEditModal-label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="periodCreateEditModal-label">{{ editMode ? 'Edit Period' : 'Add New Period' }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="start" class="col-form-label">Class Starts At <sup class="required">*</sup></label>
                                    <input type="time" class="form-control" name="start" placeholder="09:00:00" required v-model="formData.start">
                                    <div class="text-danger text-bold" v-if="formData.errors.has('start')" v-html="formData.errors.get('start')" />
                                </div>
                                <div class="form-group">
                                    <label for="end" class="col-form-label">Class Ends At <sup class="required">*</sup></label>
                                    <input type="time" class="form-control" name="end" placeholder="09:55:00" required v-model="formData.end">
                                    <div class="text-danger text-bold" v-if="formData.errors.has('end')" v-html="formData.errors.get('end')" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button @click.prevent="storeOrUpdate" :disabled="formData.busy" type="submit" class="btn btn-custom">{{ editMode ? 'Update Period' : 'Add Period' }}</button>
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
        name:"Period",
        data(){
            return {
                allPeriods: [],
                formData: new Form ({
                    id: null,
                    start: null,
                    end: null
                }),
                editMode:false
            }
        },
        methods:{
            loadAllPeriods() {
                axios.get('/api/admin/settings/period')
                .then((response) => {
                    this.allPeriods = response.data
                    console.log(this.formatAMPM(this.allPeriods[0].end));
                })
                .catch((error) => {
                    console.log(error);
                })
            },
            
            storeData() {
                this.formData.post('/api/admin/settings/period/store', {
                    start: this.formData.start,
                    end: this.formData.end
                })
                .then(() => {
                    this.formData.start = null;
                    this.formData.end = null;
                    this.hideModal();
                    Vue.swal("Success!", "New Period Created Successfully.", "success");
                    this.loadAllPeriods();
                })
                .catch((error) => {
                    console.log(error);
                })
            },

            loadEditData(index) {
                this.editMode = true;

                this.formData.id = this.allPeriods[index].id;
                this.formData.start = this.allPeriods[index].start;
                this.formData.end = this.allPeriods[index].end;
            },

            resetForm() {
                this.editMode = false;

                this.formData.id = null;
                this.formData.start = null;
                this.formData.end = null;
            },

            storeOrUpdate() {
                if(this.editMode){
                    return this.updateData();
                }else{
                     return this.storeData();
                }
            },

            updateData() {
                let updateUrl = '/api/admin/settings/period/update/' + this.formData.id;
                this.formData.post(updateUrl, {
                    start: this.formData.start,
                    end: this.formData.end,
                })
                .then((response) => {
                    this.hideModal();
                    Vue.swal("Success!", "Year Updated Successfully.", "success");
                    this.loadAllPeriods();
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
            formatAMPM(date) {
                var hours = date.getHours();
                var minutes = date.getMinutes();
                var ampm = hours >= 12 ? 'pm' : 'am';
                hours = hours % 12;
                hours = hours ? hours : 12; // the hour '0' should be '12'
                minutes = minutes < 10 ? '0'+minutes : minutes;
                var strTime = hours + ':' + minutes + ' ' + ampm;
                return strTime;
            },
            timeFormat(time) {
                var ts = time;
                var H = +ts.substr(0, 2);
                var h = (H % 12) || 12;
                h = (h < 10)?("0"+h):h;  // leading 0 at the left for 1 digit hours
                var ampm = H < 12 ? "AM" : "PM";
                ts = h + ts.substr(2, 3) + ampm;
                return ts;
            }
        },
        created() {
            this.loadAllPeriods();
        }
    }
</script>