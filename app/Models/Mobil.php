<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'id_mobil');
    }
}
