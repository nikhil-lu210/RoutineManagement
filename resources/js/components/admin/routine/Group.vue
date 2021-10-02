<style lang="scss">
</style>

<template>
    <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title float-left">Routine Groups</h5>
                        <div class="float-right">
                            <button @click.prevent="resetForm" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#groupCreateEditModal">Assign New Group</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Year</th>
                                        <th>Class</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(year, index) in allDatas.groups" :key="index">
                                        <td class="text-center">{{ index }}</td>
                                        <td>
                                            <ul>
                                                <li v-for="(group, cls) in year" :key="cls">
                                                    <span class="text-primary text-bold">Class: {{ cls }}</span>
                                                    <ul>
                                                        <li v-for="(data, sec) in group" :key="sec" class="text-capitalize">
                                                            <span class="routine-class">Class: {{ data.student_class.title }}</span>
                                                            <span class="routine-category" v-if="data.student_class.category">{{ data.student_class.category }}</span>
                                                            <span class="routine-section" v-if="data.section">(Section: {{ data.section.title }})</span>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group mr-2">
                                                <button 
                                                    class="btn btn-dark btn-sm"
                                                    data-toggle="modal" 
                                                    data-target="#groupCreateEditModal"
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
            <div class="modal fade" id="groupCreateEditModal" tabindex="-1" role="dialog" aria-labelledby="groupCreateEditModal-label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="groupCreateEditModal-label">{{ editMode ? 'Edit Group' : 'Add New Group' }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>
                            <div class="modal-body">
                                <!-- @csrf -->
                                <div class="form-group">
                                    <label for="year" class="col-form-label">Year <sup class="required">*</sup></label>
                                    <select class="form-control" id="year" name="year" v-model="formData.year" required>
                                        <option>Select Year</option>
                                        <option v-for="year in allDatas.years" :key="year.id" :value="year.id">{{ year.year }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="class" class="col-form-label">Class <sup class="required">*</sup></label>
                                    <select class="form-control text-capitalize" id="class" name="class" v-model="formData.class" required>
                                        <option selected>Select Class</option>
                                        <option v-for="stdclass in allDatas.classes" :key="stdclass.id" :value="stdclass.id">{{ stdclass.title }} ({{ stdclass.category }})</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="section" class="col-form-label">Section</label>
                                    <select class="form-control" id="section" name="section" v-model="formData.section">
                                        <option selected>Select Section</option>
                                        <option v-for="section in allDatas.sections" :key="section.id" :value="section.id">{{ section.title }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button @click.prevent="storeOrUpdate" type="submit" class="btn btn-custom">{{ editMode ? 'Update Group' : 'Add Group' }}</button>
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
        name:"RoutineGroup",
        data(){
            return {
                allDatas: [],
                formData: {
                    id: null,
                    year: null,
                    class: null,
                    section: null
                },
                editMode: false
            }
        },
        methods:{
            loadAllDatas() {
                axios.get('/admin/routine/group')
                .then((response) => {
                    this.allDatas = response.data
                    // console.log(this.allDatas.groups[0].student_class.title);
                })
                .catch((error) => {
                    console.log(error);
                })
            },
            
            storeData() {
                axios.post('/admin/routine/group/store', {
                    year: this.formData.year,
                    class: this.formData.class,
                    section: this.formData.section
                })
                .then(() => {
                    this.formData.year = null;
                    this.formData.class = null;
                    this.formData.section = null;
                    this.hideModal();
                    Vue.swal("Success!", "New Group Created Successfully.", "success");
                    this.loadAllDatas();
                })
                .catch((error) => {
                    console.log(error);
                })
            },

            loadEditData(index) {
                this.editMode = true;


                this.formData.id = this.allDatas.groups[index].id;
                this.formData.year = this.allDatas.groups[index].year.id;
                this.formData.class = this.allDatas.groups[index].student_class.id;
                this.formData.section = this.allDatas.groups[index].section.id;
                console.log(this.formData.year);
            },

            resetForm() {
                this.editMode = false;

                this.formData.id = null;
                this.formData.year = null;
                this.formData.class = null;
                this.formData.section = null;
            },

            storeOrUpdate() {
                if(this.editMode) {
                    return this.updateData();
                } else {
                     return this.storeData();
                }
            },

            updateData() {
                let updateUrl = '/admin/routine/group/update/' + this.formData.id;
                axios.post(updateUrl, {
                    year: this.formData.year,
                    class: this.formData.class,
                    section: this.formData.section
                })
                .then((response) => {
                    this.hideModal();
                    Vue.swal("Success!", "Group Updated Successfully.", "success");
                    this.loadAllDatas();
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
            this.loadAllDatas();
        }
    }
</script>