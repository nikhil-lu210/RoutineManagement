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
    background-color: #131f42 !important;
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
    border: 1px solid #131f42;
    position: relative;
    &-edit-btn {
        position: absolute;
        padding: 1px 4px;
        color: #fff;
        right: 2px;
        top: 2px;
        font-size: 10px;
    }
    &-schedule {
        list-style: none;
        padding-left: 0;
        margin-bottom: 0;
        text-align: center;
        font-size: 12px;
        .subject {
            color: #111;
            font-weight: 700;
        }
        .time {
            color: #444;
            font-weight: 600;
        }
        .teacher {
            color: #333;
            font-weight: 600;
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
                        <h5 class="card-title float-left">Routine of 2021</h5>
                        <div class="float-right">
                            <button class="btn btn-custom btn-sm">Edit Routine</button>
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
                                        <th class="text-center">Thrusday</th>
                                        <th class="text-center">Friday</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center class">
                                            <ul class="class-details">
                                                <li class="name">
                                                    6 <span class="section">(A)</span>
                                                </li>
                                                <li class="category">Girls</li>
                                            </ul>
                                        </td>
                                        <td class="routine text-center">
                                            <button class="btn btn-custom routine-edit-btn">
                                                <i class="ti-pencil"></i>
                                            </button>
                                            <ul class="routine-schedule">
                                                <li class="subject">Mathematics</li>
                                                <li class="time">10:00 - 10:55</li>
                                                <li class="teacher">Teacher_Name_Here</li>
                                            </ul>
                                        </td>
                                        <td class="routine text-center">
                                            <button class="btn btn-custom routine-edit-btn">
                                                <i class="ti-pencil"></i>
                                            </button>
                                            <ul class="routine-schedule">
                                                <li class="subject">Mathematics</li>
                                                <li class="time">10:00 - 10:55</li>
                                                <li class="teacher">Teacher_Name_Here</li>
                                            </ul>
                                        </td>
                                        <td class="routine text-center">
                                            <button class="btn btn-custom routine-edit-btn">
                                                <i class="ti-pencil"></i>
                                            </button>
                                            
                                        </td>
                                        <td class="routine text-center">
                                            <button class="btn btn-custom routine-edit-btn">
                                                <i class="ti-pencil"></i>
                                            </button>
                                            <ul class="routine-schedule">
                                                <li class="subject">Mathematics</li>
                                                <li class="time">10:00 - 10:55</li>
                                                <li class="teacher">Teacher_Name_Here</li>
                                            </ul>
                                        </td>
                                        <td class="routine text-center">
                                            <button class="btn btn-custom routine-edit-btn">
                                                <i class="ti-pencil"></i>
                                            </button>
                                            <ul class="routine-schedule">
                                                <li class="subject">Mathematics</li>
                                                <li class="time">10:00 - 10:55</li>
                                                <li class="teacher">Teacher_Name_Here</li>
                                            </ul>
                                        </td>
                                        <td class="routine text-center">
                                            <button class="btn btn-custom routine-edit-btn">
                                                <i class="ti-pencil"></i>
                                            </button>
                                            <ul class="routine-schedule">
                                                <li class="subject">Mathematics</li>
                                                <li class="time">10:00 - 10:55</li>
                                                <li class="teacher">Teacher_Name_Here</li>
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
        name:"LatestRoutine"
    }
</script>