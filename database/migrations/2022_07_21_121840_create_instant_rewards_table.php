<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstantRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instant_rewards', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->integer('month');
            $table->integer('day');
            $table->integer('hour');
            $table->integer('minute');
            $table->integer('second');
            $table->integer('status')->default(1);
            $table->integer('type')->default(1);
            $table->timestamps();
        });
        Schema::table('registers', function (Blueprint $table) {
            $table->unsignedBigInteger('reward_id')->nullable();
            $table->foreign('reward_id')->references('id')->on('instant_rewards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instant_rewards');
    }
}
