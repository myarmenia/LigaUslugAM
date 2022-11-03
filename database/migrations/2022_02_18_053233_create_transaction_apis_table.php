<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_apis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('executor_profile_id')->unsigned();
            $table->foreign('executor_profile_id')->references('id')->on('executor_profiles')->onDelete('cascade')->onUpdate('cascade');
            $table->string('transaction_name')->nullable();
            $table->string('transaction_description')->nullable();
            $table->integer('account')->nullable();
            $table->string('status')->nullable();
            $table->string('paymentId')->nullable();
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
        Schema::dropIfExists('transaction_apis');
    }
}
