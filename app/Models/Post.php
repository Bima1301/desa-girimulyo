<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

        protected $fillable = [
        'tanggal',
        'judul_berita',
        'konten',
        'file_path'
    ];
    // protected $guarded = ['id'];    
}
