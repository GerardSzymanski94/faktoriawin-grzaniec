<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('photo')->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->nullable();
            $table->integer('type')->nullable();
            $table->string('bill_number')->nullable();
            $table->string('bill_date')->nullable();
            $table->string('bill_nip')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('shop')->nullable();

            $table->text('bill_photo')->nullable();
            $table->string('account_number')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('zip_code')->nullable();
            $table->integer('mail_send')->default(0);
            $table->integer('prize')->nullable();
            $table->string('code')->nullable();
            $table->string('expiration_date')->nullable();
            $table->integer('is_eighteen')->nullable();
            $table->string('parental_consent')->nullable();
            $table->string('parental_name')->nullable();
            $table->string('document_type')->nullable();
            $table->string('document_number')->nullable();
            $table->string('document_pesel')->nullable();
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
        Schema::dropIfExists('registers');
    }
}
