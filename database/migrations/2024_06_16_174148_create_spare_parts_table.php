<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparePartsTable extends Migration
{
    public function up()
    {
        Schema::create('spare_parts', function (Blueprint $table) {
            $table->id('id_spare_part'); 
            $table->string('nama_spare_part', 50);
            $table->integer('stock_spare_part');
            $table->date('tanggal_masuk')->nullable();
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 8, 2)->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('spare_parts');
    }
}

