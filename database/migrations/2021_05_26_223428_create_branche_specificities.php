<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrancheSpecificities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branche_specificities', function (Blueprint $table) {
            $table->unsignedInteger('branche_id');
            $table->unsignedInteger('specificity_id');
            $table->foreign('branche_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('specificity_id')->references('id')->on('specificities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branche_specificities');
    }
}
