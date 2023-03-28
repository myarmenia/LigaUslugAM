<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->string('chatroom_name')->nullable();
            $table->bigInteger('task_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('executor_profile_id')->unsigned();
            $table->string('employer_message')->nullable();
            $table->string('executor_message')->nullable();
            $table->string('employer_message_file')->nullable();
            $table->string('executor_message_file')->nullable();
            $table->string('employer_read_at')->nullable();
            $table->string('executor_read_at')->nullable();
            $table->string('status')->default(false);
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
        Schema::dropIfExists('chats');
    }
}
