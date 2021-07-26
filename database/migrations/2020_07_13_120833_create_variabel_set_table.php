<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariabelSetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variabel_set', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('variabel_id');
            $table->string('nama',100);
            $table->string('kode',10);
            $table->double('min',10)->nullable();
            $table->double('max',10)->nullable();
            $table->string('kurva',100);
            $table->timestamps();

            $table->foreign('variabel_id')->references('id')->on('variabel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variabel_set');
    }
}
