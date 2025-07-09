<?php

use App\Constants\Statuses;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');

            # Service data.
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('speciality_id');
            $table->unsignedInteger('doctor_id');

            # Personal Information's.
            $table->string('name');
            $table->string('phone', 20);
            $table->string('email', 100);
            $table->date('booking_date');
            $table->text('notes')->nullable();

            # evaluation service data.
            $table->tinyInteger('dealing_with_reception_staff')->default(1)->comment('1 => Not Satisfied | 2 => Satisfied | 3 => Very Satisfied');
            $table->tinyInteger('ease_of_communication')->default(1)->comment('1 => Not Satisfied | 2 => Satisfied | 3 => Very Satisfied');
            $table->tinyInteger('dealing_with_call_center_employees')->default(1)->comment('1 => Not Satisfied | 2 => Satisfied | 3 => Very Satisfied');
            $table->tinyInteger('medical_service')->default(1)->comment('1 => Not Satisfied | 2 => Satisfied | 3 => Very Satisfied');
            $table->tinyInteger('medical_service_price')->default(1)->comment('1 => Not Satisfied | 2 => Satisfied | 3 => Very Satisfied');

            $table->timestamps();

            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('speciality_id')->references('id')->on('specificities')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
