<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryPlaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_plays', function (Blueprint $table) {
            $table->id();
            $table->string('tranId');
            $table->string('partnerName');
            $table->string('partnerId');
            $table->string('comment');
            $table->integer('amount');
            $table->integer('receive');
            $table->integer('status');
            $table->integer('pay');
            $table->string('game');
            $table->string('phoneSend');
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
        Schema::dropIfExists('history_plays');
    }
}
