<style lang="scss">
</style>

<template>
    <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title float-left">Routine Group Teachers</h5>
                        <div class="float-right">
                            <button @click.prevent="resetForm" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#groupTeacherCreateEditModal">Assign Teacher Group</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Teacher</th>
                                        <th class="text-center">Group</th>
                                        <th class="text-center">Subject</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(data,index) in allDatas.teacher_groups" :key="index">
                                        <td class="text-center">{{ index+1 }}</td>
                                        <td class="text-center">
                                            {{ data.teacher.name }}
                                        </td>
                                        <td class="text-center text-capitalize">
                                            Year: {{ data.routine_group.year.year }} - Class: {{ data.routine_group.student_class.title }} <span v-if="data.routine_group.student_class.category">({{ data.routine_group.student_class.category }})</span> - <span v-if="data.routine_group.section.title">Sec: {{ data.routine_group.section.title }}</span>
                                        </td>
                                        <td class="text-center">
                                            {{ data.subject.name }}
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group mr-2">
                                                <button 
                                                    class="btn btn-dark btn-sm"
                                                    data-toggle="modal" 
                                                    data-target="#groupTeacherCreateEditModal"
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
            <div class="modal fade" id="groupTeacherCreateEditModal" tabindex="-1" role="dialog" aria-labelledby="groupTeacherCreateEditModal-label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="groupTeacherCreateEditModal-label">{{ editMode ? 'Edit Group' : 'Add New Group' }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>
                            <div class="modal-body">
                                <!-- @csrf -->
                                <div class="form-group">
                                    <label for="routine_group" class="col-form-label">Routine Group <sup class="required">*</sup></label>
                                    <select class="form-control text-capitalize" id="routine_group" name="routine_group" v-model="formData.routine_group" required>
                                        <option value="">Select Group</option>
                                        <option v-for="group in allDatas.groups" :key="group.id" :value="group.id">
                                            Year: {{ group.year.year }} - Class: {{ group.student_class.title }} <span v-if="group.student_class.category">({{ group.student_class.category }})</span> <span v-if="group.section.title">Sec: {{ group.section.title }}</span>
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="subject" class="col-form-label">Subject <sup class="required">*</sup></label>
                                    <select class="form-control text-capitalize" id="subject" name="subject" v-model="formData.subject" required>
                                        <option selected>Select Subject</option>
                                        <option v-for="subject in allDatas.subjects" :key="subject.id" :value="subject.id">{{ subject.name }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="teacher" class="col-form-label">Teacher <sup class="required">*</sup></label>
                                    <select class="form-control text-capitalize" id="teacher" name="teacher" v-model="formData.teacher" required>
                                        <option selected>Select Teacher</option>
                                        <option v-for="teacher in allDatas.teachers" :key="teacher.id" :value="teacher.id">{{ teacher.name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button @click.prevent="storeOrUpdate" type="submit" class="btn btn-custom">{{ editMode ? 'Update Teacher Group' : 'Add Teacher Group' }}</button>
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
        name:"GroupTeacher",
        data(){
            return {
                allDatas: [],
                formData: {
                    id: null,
                    routine_group: null,
                    teacher: null,
                    subject: null
                },
                editMode: false
            }
        },
        methods:{
            loadAllDatas() {
                axios.get('/admin/routine/teacher')
                .then((response) => {
                    this.allDatas = response.data
                    // console.log(this.allDatas.groups[0]);
                })
                .catch((error) => {
                    console.log(error);
                })
            },
            
            storeData() {
                axios.post('/admin/routine/teacher/store', {
                    routine_group: this.formData.routine_group,
                    teacher: this.formData.teacher,
                    subject: this.formData.subject
                })
                .then(() => {
                    this.formData.routine_group = null;
                    this.formData.teacher = null;
                    this.formData.subject = null;
                    this.hideModal();
                    Vue.swal("Success!", "Group Teacher Assigned Successfully.", "success");
                    this.loadAllDatas();
                })
                .catch((error) => {
                    console.log(error);
                })
            },

            loadEditData(index) {
                this.editMode = true;


                this.formData.id = this.allDatas.teacher_groups[index].id;
                this.formData.routine_group = this.allDatas.teacher_groups[index].id;
                this.formData.teacher = this.allDatas.teacher_groups[index].teacher.id;
                this.formData.subject = this.allDatas.teacher_groups[index].subject.id;
                console.log(this.formData.year);
            },

            resetForm() {
                this.editMode = false;

                this.formData.id = null;
                this.formData.routine_group = null;
                this.formData.teacher = null;
                this.formData.subject = null;
            },

            storeOrUpdate() {
                if(this.editMode) {
                    return this.updateData();
                } else {
                     return this.storeData();
                }
            },

            updateData() {
                let updateUrl = '/admin/routine/teacher/update/' + this.formData.id;
                axios.post(updateUrl, {
                    routine_group: this.formData.routine_group,
                    teacher: this.formData.teacher,
                    subject: this.formData.subject
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