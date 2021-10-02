<template>
    <!-- Start row -->
    <div class="row justify-content-center">
        <!-- Start col -->
        <div class="col-md-8">
            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="card-title text-bold text-center">Create New Routine</h4>
                </div>
                <form>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="routine_group">Routine Group<sup class="required">*</sup></label>
                                    <div class="input-group">
                                        <select class="form-control text-capitalize" name="routine_group" v-model="formData.routine_group">
                                            <option selected>Select Routine Group</option>
                                            <option v-for="group in allDatas.groups" :key="group.id" :value="group.id">
                                                Year: {{ group.year.year }} || Class: {{ group.student_class.title }} {{ group.student_class.category }} <span v-if="group.section_id">({{ group.section.title }})</span>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="day">Day<sup class="required">*</sup></label>
                                    <div class="input-group">
                                        <select class="form-control" name="day" v-model="formData.day">
                                            <option selected>Select Routine Group</option>
                                            <option v-for="day in allDatas.days" :key="day.id" :value="day.id">{{ day.name }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="period">Class Period<sup class="required">*</sup></label>
                                    <div class="input-group">
                                        <select class="form-control" name="period" v-model="formData.period">
                                            <option selected>Select Routine Group</option>
                                            <option v-for="period in allDatas.periods" :key="period.id" :value="period.id">
                                                {{ period.start }} - {{ period.end }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject">Subject<sup class="required">*</sup></label>
                                    <div class="input-group">
                                        <select class="form-control" name="subject" v-model="formData.subject">
                                            <option selected>Select Subject</option>
                                            <option v-for="subject in selectedGroup" :key="subject.id" :value="subject.id">
                                                {{ subject.subject.name + " || Teacher: " + subject.teacher.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <button type="submit" @click.prevent="storeData" id="createRoutine" class="btn btn-custom bg-ucap text-bold">
                                Assign Routine
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</template>

<script>
    export default{
        name:"CreateRoutine",
        data(){
            return {
                allDatas: [],
                formData: {
                    routine_group: null,
                    day: null,
                    period: null,
                    subject: null
                },
            }
        },
        methods: {
            loadAllDatas() {
                axios.get('/admin/routine/routine/create')
                .then((response) => {
                    this.allDatas = response.data
                    // console.log(this.allDatas);
                })
                .catch((error) => {
                    console.log(error);
                })
            },
            
            storeData() {
                axios.post('/admin/routine/routine/store', {
                    routine_group: this.formData.routine_group,
                    day: this.formData.day,
                    period: this.formData.period,
                    subject: this.formData.subject
                })
                .then(() => {
                    this.formData.routine_group = null;
                    this.formData.day = null;
                    this.formData.period = null;
                    this.formData.subject = null;
                    Vue.swal("Success!", "New Routine Assigned Successfully.", "success");
                    this.$router.push("/routines");
                    this.loadAllDatas();
                })
                .catch((error) => {
                    console.log(error);
                })
            },
        },
        computed: {
            selectedGroup () {
                if(typeof this.allDatas.groups !== 'undefined') {
                    const subject =  this.allDatas.groups.find(group => group.id === this.formData.routine_group)
                    if(typeof subject !== 'undefined') {
                        return subject.routine_group_teachers;
                    }
                    return []
                }
                return []
            }
        },
        created() {
            this.loadAllDatas();
        }
    }
</script>