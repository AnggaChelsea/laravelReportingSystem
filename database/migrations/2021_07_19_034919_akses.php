<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Akses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akses', function(Blueprint $table){
            $table->id();
            $table->integer('level_user_id');
            $table->integer('menu_id');
            $table->integer('akeses');
            $table->integer('tambah');
            $table->integer('edit');
            $table->integer('delete');
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
        //
    }
}
