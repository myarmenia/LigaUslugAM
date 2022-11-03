<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExecutorSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executor_subcategories', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('executor_profile_id')->unsigned();
            $table->foreign('executor_profile_id')->references('id')->on('executor_profiles')->onDelete('cascade')->onUpdate('cascade');
            $table->string('subcategory_name');
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
        Schema::dropIfExists('executor_subcategories');
    }
}
