<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_routines', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('day_id');
            $table->foreign('day_id')->references('id')->on('days');
            
            $table->foreignId('period_id');
            $table->foreign('period_id')->references('id')->on('periods');
            
            $table->foreignId('routine_group_id');
            $table->foreign('routine_group_id')->references('id')->on('routine_groups');
            
            $table->foreignId('routine_group_teacher_id');
            $table->foreign('routine_group_teacher_id')->references('id')->on('routine_group_teachers');

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
        Schema::dropIfExists('class_routines');
        Schema::table("class_routines", function ($table) {
            $table->dropSoftDeletes();
        });
    }
}
