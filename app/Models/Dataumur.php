<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataumur extends Model
{
    use HasFactory;
    protected $fillable = [
        'kelompok',
        'jumlah'
    ];
}
