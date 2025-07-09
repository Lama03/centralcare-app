<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->tinyInteger('sent')->default(0);
            $table->tinyInteger('period')->default(0);
            $table->dateTime('attendance_date');
            $table->text('email')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedInteger('speciality_id');
            $table->foreign('speciality_id')->references('id')->on('specificities')->onDelete('cascade');
            $table->unsignedInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
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
        Schema::dropIfExists('bookings');
    }
}
