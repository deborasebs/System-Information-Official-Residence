<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    protected $table = 'rumah';
    protected $fillable = ['koderumah', 'komplek', 'alamat', 'luastanahbangunan', 'status', 'tipe', 'layout'];

    /**
     * Method One To Many 
     */
    /*public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }*/
}
