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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();

            $table->text('nama_barang');

            $table->text('nama_merek');

            $table->text('nama_distributor');

            $table->integer('harga_barang');

            $table->integer('harga_beli');

            $table->integer('stok');

            $table->string('tgl_masuk');

            $table->text('nama_petugas');


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
        Schema::dropIfExists('barangs');
    }
};
