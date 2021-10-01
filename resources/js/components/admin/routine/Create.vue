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
                                                Year: {{ group.year.year }} || Class: {{ group.student_class.title }} {{ group.student_class.category }} ({{ group.section.title }}) || Subject: {{ group.routine_group_teacher.subject.name }} || Teacher: {{ group.routine_group_teacher.teacher.name }}
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
                    period: null
                },
            }
        },
        methods: {
            loadAllDatas() {
                axios.get('/admin/routine/routine/create')
                .then((response) => {
                    this.allDatas = response.data
                })
                .catch((error) => {
                    console.log(error);
                })
            },
            
            storeData() {
                axios.post('/admin/routine/routine/store', {
                    routine_group: this.formData.routine_group,
                    day: this.formData.day,
                    period: this.formData.period
                })
                .then(() => {
                    this.formData.routine_group = null;
                    this.formData.day = null;
                    this.formData.period = null;
                    Vue.swal("Success!", "New Routine Assigned Successfully.", "success");
                    this.$router.push("/routines");
                    this.loadAllDatas();
                })
                .catch((error) => {
                    console.log(error);
                })
            },
        },
        created() {
            this.loadAllDatas();
        }
    }
</script>