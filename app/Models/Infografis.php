<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table('infografis')]
#[Fillable([
    'user_id',
    'judul',
    'slug',
    'gambar',
    'deskripsi',
    'sumber_data',
    'views',
    'is_published',
    'published_at',
])]
class Infografis extends Model
{
    protected function casts(): array
    {
        return [
            'gambar' => 'array', // Wajib agar otomatis jadi array saat dipanggil
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }
}
