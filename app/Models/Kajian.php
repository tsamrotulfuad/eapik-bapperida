<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

#[Fillable([
    'judul',
    'penulis',
    'bidang_id',
    'tahun_terbit',
    'jenis',
    'abstrak',
    'kata_kunci',
    'file_dokumen',
    'status',
    'user_id'])]

class Kajian extends Model
{
    // Membuat UUID
    protected static function booted()
    {
        static::creating(function ($user) {
            $user->uuid = (string) Str::uuid();
        });
    }
    
    // Relasi ke User (Pegawai yang input)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Bidang
    public function bidang(): BelongsTo {
        return $this->belongsTo(Bidang::class);
    }
}
