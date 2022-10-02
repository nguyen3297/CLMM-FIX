<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('keywords');
            $table->string('logo');
            $table->string('description');
            $table->string('favicon');
            $table->string('background');
            $table->integer('active');
            $table->integer('history');
            $table->integer('only_win');
            $table->integer('limit');
            $table->integer('day_mission');
            $table->integer('week_top');
            $table->integer('giftcode');
            $table->integer('status');
            $table->string('ratioCL');
            $table->string('ratioCL2');
            $table->string('ratioTX');
            $table->string('ratioTX2');
            $table->string('ratio1P3');
            $table->string('ratioG3');
            $table->string('ratioH3');
            $table->string('ratioLO');
            $table->string('ratioHu');
            $table->string('amount_hu');
            $table->string('gift_week')->nullable();
            $table->string('gift_day')->nullable();
            $table->string('amount_muster');
            $table->longText('note');
            $table->string('content');
            $table->string('content_day');
            $table->string('content_week');
            $table->string('content_refund');
            $table->string('content_muster');
            $table->string('content_hu');
            $table->longText('ads')->nullable();
            $table->string('top_phone')->nullable();
            $table->string('top_amount')->nullable();
            $table->integer('time_muster');
            $table->integer('muster_turn');
            $table->integer('limit_refund');
            $table->integer('refund');
            $table->integer('type_check');
            $table->integer('total_muster');
            $table->string('theme');
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
        Schema::dropIfExists('settings');
    }
}
