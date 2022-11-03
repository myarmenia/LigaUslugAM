<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportFeedbackProblemMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_feedback_problem_messages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('problem_message_id')->unsigned();
            $table->foreign('problem_message_id')->references('id')->on('problem_messages');
            $table->bigInteger('user_id');
            $table->string('text');
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
        Schema::dropIfExists('support_feedback_problem_messages');
    }
}
