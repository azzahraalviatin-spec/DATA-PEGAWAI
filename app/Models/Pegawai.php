<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = [
        'nama_pegawai',
        'jabatan_id',
        'jenis_kelamin',
        'no_telp',
        'alamat',
        'tanggal_masuk',
        'gaji',
    ];
    
    

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
