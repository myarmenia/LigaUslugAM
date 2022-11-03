<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExecutorPortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executor_portfolios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('executor_profile_id')->references('id')->on('executor_profiles');
            $table->string('portfolio_pic');
            $table->longText('portfoliopic_base');
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
        Schema::dropIfExists('executor_portfolios');
    }
}
