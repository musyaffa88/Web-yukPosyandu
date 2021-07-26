<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->unsignedBigInteger('pertemuan_id');
            $table->string('nama',50);
            $table->string('jenisKelamin',5);
            $table->text('alamat');
            $table->string('telp',20);
            // $table->string('kondisi',20);
            // $table->double('umur');
            // $table->double('tinggi');
            // $table->double('berat');
            // $table->double('tekanan');
            $table->timestamps();

            // $table->foreign('pertemuan_id')->references('id')->on('pertemuan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien');
    }
}
