<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    // Membuka izin pengisian kolom sesuai syarat minimum di soal
    protected $fillable = ['name', 'logo_url'];
}