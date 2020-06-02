<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('user_id')->nullable();
            $table->string('username')->nullable();
            $table->string('role_id')->nullable();
            $table->char('status',1)->nullable()->default('1');
            $table->string('created_by')->nullable();
            $table->datetime('created_date')->nullable();            
            $table->string('changed_by')->nullable();
            $table->datetime('changed_date')->nullable();
            $table->datetime('password_changed_date')->nullable();
            $table->datetime('last_login_date')->nullable();
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
