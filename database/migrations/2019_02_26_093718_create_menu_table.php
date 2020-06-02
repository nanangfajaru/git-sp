<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mstr_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menu_id')->nullable();
            $table->string('menu_desc')->nullable();
            $table->string('menu_seq')->nullable();
            $table->string('menu_parent')->nullable();
            $table->string('menu_url')->nullable();
            $table->string('menu_icon')->nullable();
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
        Schema::dropIfExists('mstr_menu');
    }
}
