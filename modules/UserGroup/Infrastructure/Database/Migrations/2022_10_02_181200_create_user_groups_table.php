<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('note')->nullable();

            // Business Domain Columns
            $table->text('domains')->nullable(); // csv
            $table->string('health')->nullable();
            $table->string('tier')->nullable();
            $table->string('industry')->nullable();
            $table->timestamp('subscribed_at')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamp('renewed_at')->nullable();

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
        Schema::dropIfExists('user_groups');
    }
}
