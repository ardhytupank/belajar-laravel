<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 8)->unique();
            $table->string('nama_mahasiswa', null);
            $table->enum('jk', ['L', 'P']);
            $table->date('tgl_lahir');
            $table->string('alamat', null);
            $table->foreignId('id_kelas')->constrained();
            $table->timestamps();

            $table->foreignId('id_kelas')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
}
