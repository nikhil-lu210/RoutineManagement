<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutineGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routine_groups', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('year_id');
            $table->foreign('year_id')->references('id')->on('years');
            
            $table->foreignId('class_id');
            $table->foreign('class_id')->references('id')->on('student_classes');
            
            $table->foreignId('section_id')->nullable();
            $table->foreign('section_id')->references('id')->on('sections');

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
        Schema::dropIfExists('routine_groups');
        Schema::table("routine_groups", function ($table) {
            $table->dropSoftDeletes();
        });
    }
}
