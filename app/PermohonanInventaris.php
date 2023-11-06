<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermohonanInventaris extends Model
{
    protected $table = 'permohonaninventaris';
    protected $fillable = ['rumah_id', 'notadinas', 'namapemohon', 'personalnumber', 'jabatan', 'alamat', 'permintaanbarang'];

    /**
     * Method One To Many 
     */
    /*public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }*/
}
