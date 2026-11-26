<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Kajian;
use Illuminate\Http\Request;

class KajianController extends Controller
{
    public function index(Request $request)
    {
        $query = Kajian::with('bidang')->where('status', 'publish');

        // Filter Kata Kunci
        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('penulis', 'like', "%{$search}%")
                  ->orWhere('abstrak', 'like', "%{$search}%")
                  ->orWhere('kata_kunci', 'like', "%{$search}%");
            });
        }

        // Filter Bidang
        if ($request->filled('bidang')) {
            $query->where('bidang_id', $request->bidang);
        }

        // Filter Tahun Terbit
        if ($request->filled('tahun')) {
            $query->where('tahun_terbit', $request->tahun);
        }

        $kajians = $query->orderByDesc('tahun_terbit')
                         ->latest()
                         ->paginate(9);

        $bidangs = Bidang::orderBy('nama')->get();
        $tahuns  = Kajian::where('status', 'publish')
                         ->distinct()
                         ->orderByDesc('tahun_terbit')
                         ->pluck('tahun_terbit');

        return view('kajian', compact('kajians', 'bidangs', 'tahuns'));
    }
}
