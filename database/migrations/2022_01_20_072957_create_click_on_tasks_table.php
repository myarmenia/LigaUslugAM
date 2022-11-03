<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClickOnTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('click_on_tasks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('task_id')->unsigned();
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('executor_profile_id')->unsigned();
            $table->foreign('executor_profile_id')->references('id')->on('executor_profiles')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('service_price_from')->nullable();
            $table->integer('service_price_to')->nullable();
            $table->integer('cost')->nullable();
            $table->date('startdate_from');
            $table->date('start_date_to');
            $table->string('offer_to_employer');
            $table->string('status')->default('false');
            $table->string('employer_offer_to_executor_task_meeting_date')->nullable();
            $table->string('employer_offer_to_executor_task_meeting_time')->nullable();
            $table->boolean("deadline_notify_status")->default(0);
            $table->boolean('employer_watched_click')->default(0);
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
        Schema::dropIfExists('click_on_tasks');
    }
}
