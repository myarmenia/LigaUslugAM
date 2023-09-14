<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonatedBalanceExecutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donated_balance_executors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('executor_id')->unsigned();
            $table->foreign('executor_id')->references('id')->on('executor_profiles')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('real_balance')->nullable();
            $table->string('profile_percent')->nullable();
            $table->string('donated_money')->nullable();
            $table->integer('balance')->nullable();
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
        Schema::dropIfExists('donated_balance_executors');
    }
}
