<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datapendidikan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kelompok',
        'jumlah'
    ];
}
