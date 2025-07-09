<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casings', function (Blueprint $table) {
            $table->id();
            $table->string('image_before');
            $table->string('image_after');
            $table->boolean('status')->default(\App\Constants\Statuses::ACTIVE);
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('doctor_id')->nullable();
            $table->foreign('category_id')->references('id')->on('casing_categories')->onDelete('cascade');
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
        Schema::dropIfExists('casings');
    }
}
