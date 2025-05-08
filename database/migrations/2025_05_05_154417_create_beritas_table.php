<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('penulis');
            $table->string('gambar');
            $table->unsignedBigInteger('id_kategori');

             //relasi
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade'); 
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
        Schema::dropIfExists('beritas');
    }
};