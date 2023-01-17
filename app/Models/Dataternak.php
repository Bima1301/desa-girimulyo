<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataternak extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_ternak',
        'jantan',
        'betina',
        'total'
    ];
}
