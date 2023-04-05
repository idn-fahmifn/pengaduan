<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_departemen')->unsigned();
            $table->date('tanggal');
            $table->string('photo');
            $table->text('pengaduan');
            $table->enum('status',['diajukan','diproses','selesai','ditolak']);
            $table->foreign('id_user')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('id_departemen')->on('departemen')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('pengaduan');
    }
}
