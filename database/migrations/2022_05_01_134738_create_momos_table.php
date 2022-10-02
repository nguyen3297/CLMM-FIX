<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMomosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('momos', function (Blueprint $table) {
            $table->id();
            $table->string('token');
            $table->string('phone');
            $table->longText('info');
            $table->string('min');
            $table->string('max');
            $table->integer('status');
            $table->string('time_login');
            $table->integer('try');
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
        Schema::dropIfExists('momos');
    }
}
