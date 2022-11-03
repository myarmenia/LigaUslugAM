<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('role')->default('0');
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('img_path')->nullable();
            $table->string('gender')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('region')->nullable();
            $table->string('country_name')->nullable();
            $table->string('address')->nullable();
            $table->date('about_me')->nullable();
            $table->string('phonenumber')->nullable();
            $table->string('phone_status')->default('not verified');
            $table->string('fasebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('geting_notification')->default(0);
            $table->integer('employer_avg_rating')->nullable();
            $table->integer('employer_review_count')->nullable();
            $table->string('status')->default('Пасив');
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
