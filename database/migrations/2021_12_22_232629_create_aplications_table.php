<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('task_id')->references('id')->on('tasks');
            $table->bigInteger('executor_user_id')->references('id')->on('users');
            $table->string('category_name');
            $table->string('subcategory_name');
            $table->string('service_price_from');
            $table->string('service_price_to');
            $table->date('date_from');
            $table->date('date_to');
            $table->integer('subcategory_price');
            $table->longText('message');
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
        Schema::dropIfExists('aplications');
    }
}
