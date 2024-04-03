<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nasabahs', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('name');
            $table->string('pekerjaan');
            $table->integer('usia');
            $table->date('tanggal_lahir');
            $table->string('phone');
            $table->string('name_pasangan')->nullable();
            $table->integer('usia_pasangan')->nullable();
            $table->text('alamat_rumah');
            $table->string('kontan_darurat');
            $table->string('hubungan_kontak_darurat');
            $table->text('alamat_kontak_darurat');
            $table->string('phone_kontak_darurat');
            $table->string('jumlah_pengajuan');
            $table->string('jangka_waktu');
            $table->string('keperluan_pengajuan_kredit');
            $table->string('jenis_kredit');
            $table->string('total_penghasilan');
            $table->string('jaminan');
            $table->string('ttd');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nasabahs');
    }
};
