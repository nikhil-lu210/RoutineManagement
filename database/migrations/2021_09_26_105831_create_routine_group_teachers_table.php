<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutineGroupTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routine_group_teachers', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('routine_group_id');
            $table->foreign('routine_group_id')->references('id')->on('routine_groups');
            
            $table->foreignId('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('users');
            
            $table->foreignId('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects');

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
        Schema::dropIfExists('routine_group_teachers');
        Schema::table("routine_group_teachers", function ($table) {
            $table->dropSoftDeletes();
        });
    }
}
