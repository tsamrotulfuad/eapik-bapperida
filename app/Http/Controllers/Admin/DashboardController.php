<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Kajian;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        // Hitung semua data user
        $totalKajian = Kajian::count();
        $totalAgenda = Agenda::count();
        $totalKegiatan = Kegiatan::count();

        return view('admin.dashboard', compact('totalKajian', 'totalAgenda', 'totalKegiatan'));
    }
}
