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
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->String('img');
            $table->String('img_bg');
            $table->String('judul');
            $table->String('alter_judul');
            $table->String('slug');
            $table->Text('deskripsi');
            $table->Text('excerpt')->unique();
            $table->String('produser');
            $table->String('studio');
            $table->String('genre');
            $table->Float('skor');
            $table->String('tipe');
            $table->String('status')->default('Ongoing');
            $table->String('total_episode');
            $table->String('durasi')->default('24 Menit');
            $table->timestamp('tanggal_rilis');
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
        Schema::dropIfExists('animes');
    }
};
