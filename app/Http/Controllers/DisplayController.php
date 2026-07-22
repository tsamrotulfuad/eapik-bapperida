<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::whereToday('waktu_mulai')->get();
        return view('display',  compact('kegiatan'));
    }
}
