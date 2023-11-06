<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    protected $table = 'penghuni';
    protected $fillable = ['namapemohon', 'personalnumber', 'jabatan', 'unitkerja', 'plotting'];

    /**
     * Method One To Many 
     */
    /*public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }*/
}
