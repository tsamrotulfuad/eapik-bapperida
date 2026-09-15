<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

#[Fillable([
    'nama_agenda',
    'tanggal_agenda',
    'tempat_agenda',
    'waktu',
    'pengundang',
    'petugas_hadir',
    ])]

class Agenda extends Model
{
    // Membuat UUID
    protected static function booted()
    {
        static::creating(function ($bidang) {
            $bidang->uuid = (string) Str::uuid();
        });
    }
}
