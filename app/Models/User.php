<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Teacher;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    //get student
    public function student()
    {
        return $this->hasOne(Student::class, 'student_id', 'id');
    }
    
    //get teacher
    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'teacher_id', 'id');
    }

    // get routine_group_students
    public function routineGroupStudents()
    {
        return $this->hasMany(RoutineGroupStudent::class, 'student_id', 'id');
    }

    // get routine_group_Teachers
    public function routineGroupTeachers()
    {
        return $this->hasMany(RoutineGroupTeacher::class, 'teacher_id', 'id');
    }
}
