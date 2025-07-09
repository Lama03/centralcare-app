<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('locale')->index();

            $table->unsignedInteger('device_id');
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');

            $table->string('name');
            $table->text('description')->nullable();
            $table->text('features')->nullable();
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
        Schema::dropIfExists('devices_translations');
    }
}
