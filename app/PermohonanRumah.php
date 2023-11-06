<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermohonanRumah extends Model
{
    protected $table = 'permohonanrumah';
    protected $fillable = ['notadinas', 'namapemohon', 'personalnumber', 'jabatan', 'tmtjabatan', 'unitkerja', 'uploadsk'];

    /**
     * Method One To Many 
     */
    /*public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }*/
}
