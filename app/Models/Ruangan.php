<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

#[Fillable(['nama_ruangan', 'status'])]
class Ruangan extends Model
{
    // Membuat UUID
    protected static function booted()
    {
        static::creating(function ($ruangan) {
            $ruangan->uuid = (string) Str::uuid();
        });
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function kegiatan(): HasMany {
        return $this->hasMany(Kegiatan::class);
    }
}
