<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perangkat extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'jabatan',
        'file_path'
    ];
}
