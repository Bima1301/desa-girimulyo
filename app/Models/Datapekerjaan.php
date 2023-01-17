<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datapekerjaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kelompok',
        'jumlah'
    ];
}
