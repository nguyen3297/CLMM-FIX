<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryDayMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_day_missions', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->integer('amount');
            $table->integer('level');
            $table->integer('receive');
            $table->integer('status');
            $table->integer('pay');
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
        Schema::dropIfExists('history_day_missions');
    }
}
