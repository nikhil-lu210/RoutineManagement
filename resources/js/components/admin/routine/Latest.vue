<style lang="scss" scoped>
tr:nth-child(even) td:nth-child(odd) {
    background-color: #efefef;
}
tr:nth-child(even) td:nth-child(even) {
    background-color: #efefef38;
}
tr:nth-child(odd) td:nth-child(even) {
    background-color: #efefef;
}
tr:nth-child(odd) td:nth-child(odd) {
    background-color: #efefef38;
}

.class {
    padding: 5px;
    background-color: #055159 !important;
    color: #fff;
    border: 1px solid #fff;
    &-details {
        list-style: none;
        padding-left: 0;
        margin-bottom: 0;
        text-align: center;
        font-size: 12px;
        .name {
            font-weight: 700;
            .section {
                font-weight: 700;
            }
        }
        .category {
            font-weight: 700;
        }
    }
}
.routine {
    padding: 5px;
    border: 1px solid #055159;
    &-schedule {
        list-style: none;
        padding-left: 0;
        margin-bottom: 0;
        font-size: 12px;
        &-slot {
            position: relative;
            text-align: left;
            padding-bottom: 5px;
            padding-top: 5px;
            border-bottom: 1px solid #9f9f9f;
            &:first-child {
                padding-top: 0px;
            }
            &:last-child {
                padding-bottom: 0px;
                border-bottom: 0px solid #9f9f9f;
            }
            i {
                color: #055159;
            }
            &-edit-btn {
                position: absolute;
                padding: 1px 3px;
                color: #fff;
                right: 2px;
                top: 2px;
                font-size: 8px;
                i {
                    color: #fff;
                }
            }
            .time {
                color: #444;
                font-weight: 900;
                font-size: 11px;
            }
            ul {
                list-style: none;
                padding-left: 0px;
                margin-bottom: 0;
                .subject {
                    color: #111;
                    font-weight: 600;
                }
                .teacher {
                    color: #333;
                    font-weight: 600;
                }
            }
        }
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
                        <h5 class="card-title float-left">Routine of <span class="text-dark text-bold">{{ latestYear }}</span></h5>
                        <div class="float-right">
                            <button class="btn btn-custom btn-sm" :class="editMode == true ? 'd-none' : ''" @click.prevent="enableEditing">Edit Routine</button>
                            <button class="btn btn-danger btn-sm" :class="editMode == false ? 'd-none' : ''" @click.prevent="enableEditing">Cancel Editing</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th class="text-center">#</th>
                                        <th class="text-center">Saturday</th>
                                        <th class="text-center">Sunday</th>
                                        <th class="text-center">Monday</th>
                                        <th class="text-center">Tuesday</th>
                                        <th class="text-center">Wednesday</th>
                                        <th class="text-center">Thursday</th>
                                        <th class="text-center">Friday</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(group, index) in routine" :key="index">
                                        <td class="text-center class">
                                            <ul class="class-details">
                                                <li class="name">
                                                    {{ index }}
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="routine text-center">
                                            <ul class="routine-schedule">
                                                <li class="routine-schedule-slot" v-for="(slot, list) in getDay(group, 'Saturday')" :key="'Saturday-'+list">
                                                    <button class="btn btn-custom routine-schedule-slot-edit-btn" :class="editMode == false ? 'd-none' : ''" data-toggle="modal" data-target="#editRoutineModal" @click.prevent="loadEditData(slot)">
                                                        <i class="ti-pencil"></i>
                                                    </button>
                                                    <span class="time"><i class="ti-timer"></i> {{ timeFormat(slot.period.start) +" - "+ timeFormat(slot.period.end) }}</span>
                                                    <ul>
                                                        <li class="subject"><i class="ti-book"></i> {{ slot.class_teacher.subject.name }}</li>
                                                        <li class="teacher"><i class="ti-user"></i> {{ slot.class_teacher.teacher.name }}</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="routine text-center">
                                            <ul class="routine-schedule">
                                                <li class="routine-schedule-slot" v-for="(slot, list) in getDay(group, 'Sunday')" :key="'Sunday-'+list">
                                                    <button class="btn btn-custom routine-schedule-slot-edit-btn" :class="editMode == false ? 'd-none' : ''" data-toggle="modal" data-target="#editRoutineModal" @click.prevent="loadEditData(slot)">
                                                        <i class="ti-pencil"></i>
                                                    </button>
                                                    <span class="time"><i class="ti-timer"></i> {{ timeFormat(slot.period.start) +" - "+ timeFormat(slot.period.end) }}</span>
                                                    <ul>
                                                        <li class="subject"><i class="ti-book"></i> {{ slot.class_teacher.subject.name }}</li>
                                                        <li class="teacher"><i class="ti-user"></i> {{ slot.class_teacher.teacher.name }}</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="routine text-center">
                                            <ul class="routine-schedule">
                                                <li class="routine-schedule-slot" v-for="(slot, list) in getDay(group, 'Monday')" :key="'Monday-'+list">
                                                    <button class="btn btn-custom routine-schedule-slot-edit-btn" :class="editMode == false ? 'd-none' : ''" data-toggle="modal" data-target="#editRoutineModal" @click.prevent="loadEditData(slot)">
                                                        <i class="ti-pencil"></i>
                                                    </button>
                                                    <span class="time"><i class="ti-timer"></i> {{ timeFormat(slot.period.start) +" - "+ timeFormat(slot.period.end) }}</span>
                                                    <ul>
                                                        <li class="subject"><i class="ti-book"></i> {{ slot.class_teacher.subject.name }}</li>
                                                        <li class="teacher"><i class="ti-user"></i> {{ slot.class_teacher.teacher.name }}</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="routine text-center">
                                            <ul class="routine-schedule">
                                                <li class="routine-schedule-slot" v-for="(slot, list) in getDay(group, 'Tuesday')" :key="'Tuesday-'+list">
                                                    <button class="btn btn-custom routine-schedule-slot-edit-btn" :class="editMode == false ? 'd-none' : ''" data-toggle="modal" data-target="#editRoutineModal" @click.prevent="loadEditData(slot)">
                                                        <i class="ti-pencil"></i>
                                                    </button>
                                                    <span class="time"><i class="ti-timer"></i> {{ timeFormat(slot.period.start) +" - "+ timeFormat(slot.period.end) }}</span>
                                                    <ul>
                                                        <li class="subject"><i class="ti-book"></i> {{ slot.class_teacher.subject.name }}</li>
                                                        <li class="teacher"><i class="ti-user"></i> {{ slot.class_teacher.teacher.name }}</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="routine text-center">
                                            <ul class="routine-schedule">
                                                <li class="routine-schedule-slot" v-for="(slot, list) in getDay(group, 'Wednesday')" :key="'Wednesday-'+list">
                                                    <button class="btn btn-custom routine-schedule-slot-edit-btn" :class="editMode == false ? 'd-none' : ''" data-toggle="modal" data-target="#editRoutineModal" @click.prevent="loadEditData(slot)">
                                                        <i class="ti-pencil"></i>
                                                    </button>
                                                    <span class="time"><i class="ti-timer"></i> {{ timeFormat(slot.period.start) +" - "+ timeFormat(slot.period.end) }}</span>
                                                    <ul>
                                                        <li class="subject"><i class="ti-book"></i> {{ slot.class_teacher.subject.name }}</li>
                                                        <li class="teacher"><i class="ti-user"></i> {{ slot.class_teacher.teacher.name }}</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="routine text-center">
                                            <ul class="routine-schedule">
                                                <li class="routine-schedule-slot" v-for="(slot, list) in getDay(group, 'Thursday')" :key="'Thursday-'+list">
                                                    <button class="btn btn-custom routine-schedule-slot-edit-btn" :class="editMode == false ? 'd-none' : ''" data-toggle="modal" data-target="#editRoutineModal" @click.prevent="loadEditData(slot)">
                                                        <i class="ti-pencil"></i>
                                                    </button>
                                                    <span class="time"><i class="ti-timer"></i> {{ timeFormat(slot.period.start) +" - "+ timeFormat(slot.period.end) }}</span>
                                                    <ul>
                                                        <li class="subject"><i class="ti-book"></i> {{ slot.class_teacher.subject.name }}</li>
                                                        <li class="teacher"><i class="ti-user"></i> {{ slot.class_teacher.teacher.name }}</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="routine text-center">
                                            <h6 class="text-dark font-sm">Holiday</h6>
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
            <div class="modal fade" id="editRoutineModal" tabindex="-1" role="dialog" aria-labelledby="editRoutineModal-label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editRoutineModal-label">Edit Routine</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>
                            <div class="modal-body">
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
                                    <div class="col-md-12">
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
                            <div class="modal-footer">
                                <div class="text-right">
                                    <button type="submit" @click.prevent="updateRoutineData" data-dismiss="modal" id="createRoutine" class="btn btn-custom bg-ucap text-bold">
                                        Update Routine
                                    </button>
                                </div>
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
        name:"LatestRoutine",
        data (){
            return {
                routine: [],
                editMode: false,
                latestYear: new Date().getFullYear(),
                allDatas: [],
                formData: new Form ({
                    id: null,
                    routine_group: null,
                    day: null,
                    period: null,
                    subject: null
                }),
            }
        },
        methods: {
            allDataForUpdate() {
                axios.get('/api/admin/routine/routine/create')
                .then((response) => {
                    this.allDatas = response.data
                    // console.log(this.allDatas);
                })
                .catch((error) => {
                    console.log(error);
                })
            },
            loadAllDatas() {
                axios.get('/api/admin/routine/routine/latest')
                .then((response) => {
                    this.routine = response.data
                })
                .catch((error) => {
                    console.log(error)
                })
            },

            loadEditData(data) {
                console.log(data.id, data.routine_group_id, data.day_id, data.period_id, data.routine_group_teacher_id);
                this.formData.id = data.id;
                this.formData.routine_group = data.routine_group_id;
                this.formData.day = data.day_id;
                this.formData.period = data.period_id;
                this.formData.subject = data.routine_group_teacher_id;
            },
            
            updateRoutineData() {
                console.log(this.formData.id, this.formData.routine_group, this.formData.day, this.formData.period, this.formData.subject);
                axios.post(`/api/admin/routine/routine/update/${this.formData.id}`, {
                    routine_group: this.formData.routine_group,
                    day: this.formData.day,
                    period: this.formData.period,
                    subject: this.formData.subject
                })
                .then((response) => {
                    this.formData.routine_group = null;
                    this.formData.day = null;
                    this.formData.period = null;
                    this.formData.subject = null;
                    Vue.swal("Success!", "Routine Updated Successfully.", "success");
                    // this.$router.push("/routines");
                    this.loadAllDatas();
                })
                .catch((error) => {
                    console.log(error);
                })
            },

            getDay (group, day) {
                const findDay = group[day]
                if(typeof findDay !== 'undefined') {
                    return findDay
                }
                return []
            },

            enableEditing() {
                // console.log(this.editMode);
                this.editMode = !this.editMode;
            },

            timeFormat(time) {
                var ts = time;
                var H = +ts.substr(0, 2);
                var h = (H % 12) || 12;
                h = (h < 10) ? ("0" + h) : h;  // leading 0 at the left for 1 digit hours
                var ampm = H < 12 ? "AM" : "PM";
                ts = h + ts.substr(2, 3) + ampm;
                return ts;
            }
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
            this.allDataForUpdate()
            this.loadAllDatas()
        }
    }
</script>