<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagandesa extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal',
        'file_path'
    ];
}
