<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function tikets()
    {
        return $this->hasMany(Tiket::class, 'id_penyewa', 'id_user');
    }
}
