<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermohonanrumahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonanrumah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('notadinas');
            $table->string('namapemohon');
            $table->integer('personalnumber');
            $table->string('jabatan');
            $table->date('tmtjabatan');
            $table->string('unitkerja')->nullable();
            $table->string('uploadsk')->nullable();
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
        Schema::dropIfExists('permohonanrumah');
    }
}
