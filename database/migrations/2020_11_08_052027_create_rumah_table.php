<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRumahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rumah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('koderumah');
            $table->enum('komplek', ['Cipete', 'Rawasari', 'Luarkomplek']);
            $table->string('alamat');
            $table->string('luastanahbangunan');
            $table->enum('status', ['Terisi', 'Siap huni', 'Perapihan', 'Renovasi']);
            $table->enum('tipe', ['A', 'B', 'C']);
            $table->string('layout')->nullable();
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
        Schema::dropIfExists('rumah');
    }
}
