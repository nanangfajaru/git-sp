<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mstr_role', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role_id')->nullable();
            $table->string('role_desc')->nullable();
            $table->char('status',1)->nullable()->default('1');
            $table->string('created_by')->nullable();
            $table->datetime('created_date')->nullable();            
            $table->string('changed_by')->nullable();
            $table->datetime('changed_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mstr_role');
    }
}
