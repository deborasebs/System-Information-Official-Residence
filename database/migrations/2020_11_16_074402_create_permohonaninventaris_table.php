<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermohonaninventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonaninventaris', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_rumah')->unsigned();
            $table->foreign('id_rumah')->references('id')->on('rumah')->onDelete('cascade');
            $table->string('namapemohon');
            $table->string('personalnumber');
            $table->string('jabatan');
            $table->text('alamat');
            $table->text('permintaanbarang');
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
        Schema::dropIfExists('permohonaninventaris');
    }
}
