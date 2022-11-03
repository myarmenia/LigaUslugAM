<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title');
            $table->string('category_name');
            $table->string('subcategory_name');
            $table->string('nation')->nullable();
            $table->string('country_name')->nullable();
            $table->string('region')->nullable();
            $table->string('address')->nullable();;
            $table->longText('task_description');
            $table->string('task_starttime');
            $table->string('task_finishtime');
            $table->string('task_location');
            $table->integer('price_from');
            $table->integer('price_to');
            $table->string('views')->nullable();
            $table->bigInteger('executor_profile_id')->unsigned()->nullable();
            $table->foreign('executor_profile_id')->references('id')->on('executor_profiles');
            $table->string('executor_material_price')->nullable();
            $table->string('executor_work_price')->nullable();
            $table->bigInteger('executor_total_price')->nullable();
            $table->string('executor_completed_task')->default(false);
          
            $table->string('status')->default('false');
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
        Schema::dropIfExists('tasks');
    }
}
