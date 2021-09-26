<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutineGroupStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routine_group_students', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('routine_group_id');
            $table->foreign('routine_group_id')->references('id')->on('routine_groups');
            
            $table->foreignId('student_id');
            $table->foreign('student_id')->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routine_group_students');
        Schema::table("routine_group_students", function ($table) {
            $table->dropSoftDeletes();
        });
    }
}
