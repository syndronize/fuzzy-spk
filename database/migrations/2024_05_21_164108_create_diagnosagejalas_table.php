<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosagejalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('diagnosagejalas');
        Schema::create('diagnosagejalas', function (Blueprint $table) {
            $table->unsignedBigInteger('diagnoses_id');
            $table->unsignedBigInteger('gejalas_id');
            $table->float('weight');
            $table->primary(['diagnoses_id', 'gejalas_id']);
            $table->foreign('diagnoses_id')->references('id')->on('diagnoses')->onDelete('cascade');
            $table->foreign('gejalas_id')->references('id')->on('gejalas')->onDelete('cascade');
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
        Schema::dropIfExists('diagnosagejalas');
    }
}
