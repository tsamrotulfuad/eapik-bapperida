<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kajian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        // Hitung semua data user
        $totalKajian = Kajian::count();

        return view('admin.dashboard', compact('totalKajian',));
    }
}
