<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;   
use App\Models\Jabatan;
use App\Models\Kota;

class Karyawan extends Model
{
    //
    protected $table = "karyawan";
    protected $fillable = [
        'nama_karyawan',
        'tanggal_lahir',
        'jabatan_id',
        'kota_id'
    ];
    protected $primaryKey = 'id';
    public function jabatan(): BelongsTo
    {
        // mesin akan mencari category_id di table/model products scara auto
        return $this->belongsTo(Jabatan::class);
    }
     public function kota(): BelongsTo
    {
        // mesin akan mencari category_id di table/model products scara auto
        return $this->belongsTo(Kota::class);
    }
}
