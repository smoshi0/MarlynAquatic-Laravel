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
        Schema::create('akuaria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id');
            $table->string('kode_akuarium')->unique();
            $table->string('nama_ikan');
            $table->string('slug')->unique();
            $table->string('jumlah_ikan');
            $table->string('harga_ikan');
            $table->string('image')->nullable();
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('akuaria');
    }
};
