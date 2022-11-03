<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExecutorProfileWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executor_profile_work_experiences', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('executor_profile_id')->references('id')->on('executor_profiles');
            $table->string('working_place');
            $table->string('recruitment_data');
            $table->string('dismissal_data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('executor_profile_work_experiences');
    }
}
