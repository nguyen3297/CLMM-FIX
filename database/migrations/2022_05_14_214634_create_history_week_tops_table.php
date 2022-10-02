<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryWeekTopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_week_tops', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->integer('status');
            $table->string('phoneSend');
            $table->integer('amount');
            $table->integer('gift');
            $table->integer('top');
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
        Schema::dropIfExists('history_week_tops');
    }
}
