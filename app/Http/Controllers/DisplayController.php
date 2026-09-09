<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DisplayController extends Controller
{
    public function index()
    {
        // Gambar
        $media = Media::where('status', 'active')->get();
        
        // Kegiatan
        $kegiatan = Kegiatan::whereDate('tanggal_kegiatan', Carbon::today())
            ->orderBy('waktu_mulai', 'asc')
            ->get();
        return view('display',  [
            'kegiatanHariIni' => $kegiatan,
            'media' => $media,
            'tanggal' => Carbon::now()->isoFormat('D MMMM Y') // Contoh: 22 Juli 2026
        ]);
    }
}
