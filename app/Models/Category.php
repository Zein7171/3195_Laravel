<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    // Menandakan atribut: 1 Kategori dapat memiliki banyak list Event
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}