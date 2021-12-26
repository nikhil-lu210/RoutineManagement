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
                                                    <button class="btn btn-custom routine-schedule-slot-edit-btn" :class="editMode == false ? 'd-none' : ''">
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
                                                    <button class="btn btn-custom routine-schedule-slot-edit-btn" :class="editMode == false ? 'd-none' : ''">
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
                                                    <button class="btn btn-custom routine-schedule-slot-edit-btn" :class="editMode == false ? 'd-none' : ''">
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
                                                    <button class="btn btn-custom routine-schedule-slot-edit-btn" :class="editMode == false ? 'd-none' : ''">
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
                                                    <button class="btn btn-custom routine-schedule-slot-edit-btn" :class="editMode == false ? 'd-none' : ''">
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
                                                    <button class="btn btn-custom routine-schedule-slot-edit-btn" :class="editMode == false ? 'd-none' : ''">
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
        </div>
    <!-- End row -->
</template>

<script>    
    export default{
        name:"LatestRoutine",
        data (){
            return {
                routine: [],
                editMode: false,
                latestYear: new Date().getFullYear()
            }
        },
        methods: {
            loadAllDatas() {
                axios.get('/api/admin/routine/routine/latest')
                .then((response) => {
                    this.routine = response.data
                })
                .catch((error) => {
                    console.log(error)
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
                h = (h < 10)?("0"+h):h;  // leading 0 at the left for 1 digit hours
                var ampm = H < 12 ? "AM" : "PM";
                ts = h + ts.substr(2, 3) + ampm;
                return ts;
            }
        },
        created() {
            this.loadAllDatas()
        }
    }
</script>