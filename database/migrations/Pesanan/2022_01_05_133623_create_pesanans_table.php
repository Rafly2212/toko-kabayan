<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->date('tanggal');
            $table->string('status');
            $table->integer('ongkir')->nullable();
            $table->string('nama_kurir', 30)->nullable();
            $table->string('nomor_telepon_kurir', 13)->nullable();
            $table->string('no_resi')->nullable();
            $table->string('kurir')->nullable();
            $table->integer('jumlah_harga');
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
        Schema::dropIfExists('pesanans');
    }
}
