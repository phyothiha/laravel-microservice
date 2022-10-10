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
            $table->string('username')->unique();
            $table->string('title')->nullable(); // can be nullable
            $table->string('first_name');
            $table->string('middle_name')->nullable(); // can be nullable
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable(); // can be nullable
            $table->string('job_title')->nullable(); // can be nullable
            $table->string('work_number')->nullable(); // can be nullable
            $table->string('mobile_number')->nullable(); // can be nullable
            $table->string('time_zone');
            $table->string('language')->nullable(); // can be nullable
            $table->string('password');
            $table->rememberToken();
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
