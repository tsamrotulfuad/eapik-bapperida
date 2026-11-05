<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DisplayController extends Controller
{
    public function index()
    {
        return view('display');
    }

    public function pimpinan(Request $request)
    {
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $filter = $request->get('filter', 'semua');
        $search = $request->get('search');
        $date = $request->get('tanggal');

        try {
            $query = Agenda::query();

            if ($date) {
                $query->whereDate('tanggal_agenda', $date);
            } elseif ($filter === 'hari-ini') {
                $query->whereDate('tanggal_agenda', $today);
            } elseif ($filter === 'besok') {
                $query->whereDate('tanggal_agenda', $tomorrow);
            } elseif ($filter === 'minggu-ini') {
                $query->whereBetween('tanggal_agenda', [$startOfWeek, $endOfWeek]);
            } elseif ($filter === 'bulan-ini') {
                $query->whereBetween('tanggal_agenda', [$startOfMonth, $endOfMonth]);
            }

            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama_agenda', 'like', "%{$search}%")
                      ->orWhere('tempat_agenda', 'like', "%{$search}%")
                      ->orWhere('pengundang', 'like', "%{$search}%")
                      ->orWhere('petugas_hadir', 'like', "%{$search}%");
                });
            }

            $agendas = $query->orderBy('tanggal_agenda', 'asc')->orderBy('waktu', 'asc')->get();

            // Statistik
            $countHariIni = Agenda::whereDate('tanggal_agenda', $today)->count();
            $countBesok = Agenda::whereDate('tanggal_agenda', $tomorrow)->count();
            $countMingguIni = Agenda::whereBetween('tanggal_agenda', [$startOfWeek, $endOfWeek])->count();
            $countBulanIni = Agenda::whereBetween('tanggal_agenda', [$startOfMonth, $endOfMonth])->count();
            $countTotal = Agenda::count();

            // Agenda khusus hari ini untuk highlight
            $agendasHariIni = Agenda::whereDate('tanggal_agenda', $today)
                ->orderBy('waktu', 'asc')
                ->get();

            // Kegiatan internal rapat Bapperida hari ini
            $kegiatanHariIni = Kegiatan::with(['ruangan', 'bidang'])
                ->whereDate('tanggal_kegiatan', $today)
                ->orderBy('waktu_mulai', 'asc')
                ->get();
        } catch (\Throwable $e) {
            $agendas = collect([]);
            $agendasHariIni = collect([]);
            $kegiatanHariIni = collect([]);
            $countHariIni = 0;
            $countBesok = 0;
            $countMingguIni = 0;
            $countBulanIni = 0;
            $countTotal = 0;
        }

        return view('display-pimpinan', compact(
            'agendas',
            'agendasHariIni',
            'kegiatanHariIni',
            'countHariIni',
            'countBesok',
            'countMingguIni',
            'countBulanIni',
            'countTotal',
            'filter',
            'search',
            'date'
        ));
    }
}
