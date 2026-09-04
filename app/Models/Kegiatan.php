<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

#[Fillable([
    'nama_kegiatan',
    'deskripsi',
    'tanggal_kegiatan',
    'waktu_mulai',
    'waktu_selesai',
    'bidang_id',
    'ruangan_id',
    'status'])]
class Kegiatan extends Model
{
    // Membuat UUID
    protected static function booted()
    {
        static::creating(function ($kegiatan) {
            $kegiatan->uuid = (string) Str::uuid();
        });
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function bidang(): BelongsTo {
        return $this->belongsTo(Bidang::class);
    }

    public function ruangan(): BelongsTo {
        return $this->belongsTo(Ruangan::class);
    }
}
