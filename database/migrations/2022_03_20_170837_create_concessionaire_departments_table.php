<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcessionaireDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concessionaire_departments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_concessionaire');
            $table->unsignedBigInteger('id_department');
            $table->timestamps();

            $table->foreign('id_concessionaire')->references('id')->on('concessionaires')->onDelete('cascade');
            $table->foreign('id_department')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concessionaire_departments');
    }
}
