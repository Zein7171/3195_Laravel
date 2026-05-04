<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    // Pastikan bagian ini bersih dari teks
    protected $fillable = [
        'category_id', 
        'title', 
        'description', 
        'date',
        'location', 
        'price', 
        'stock', 
        'poster_path'
    ];

    /**
     * Relasi ke model Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}