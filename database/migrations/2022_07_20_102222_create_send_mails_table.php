<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_mails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('register_id')->nullable();
            $table->string('email')->nullable();
            $table->string('ip_address')->nullable();
            $table->longText('subject');
            $table->longText('message');
            $table->integer('status')->default(1);
            $table->integer('type')->default(0);
            $table->timestamps();
            $table->foreign('register_id')->references('id')->on('registers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('send_mails');
    }
}
