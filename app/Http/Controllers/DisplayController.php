<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DisplayController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::whereDate('tanggal_kegiatan', Carbon::today())
            ->orderBy('waktu_mulai', 'asc')
            ->get();
        return view('display',  [
            'kegiatanHariIni' => $kegiatan,
            'tanggal' => Carbon::now()->isoFormat('D MMMM Y') // Contoh: 22 Juli 2026
        ]);
    }
}
