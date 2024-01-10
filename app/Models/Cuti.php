<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    public function karyawan() {
        return $this->belongsTo(Karyawan::class, 'nomor_induk', 'nomor_induk');
    }
}
