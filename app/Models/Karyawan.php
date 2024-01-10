<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    public function cuti() {
        return $this->hasMany(Cuti::class, 'nomor_induk', 'nomor_induk');
    }
}
