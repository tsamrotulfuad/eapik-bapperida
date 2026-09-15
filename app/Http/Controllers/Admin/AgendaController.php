<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendas = Agenda::all();

        return view('admin.agendas.index', compact('agendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input (Pastikan file_dokumen dan cover divalidasi sebagai file/image)
        $request->validate([
            'nama_agenda' => 'required',
            'tanggal_agenda' => 'required',
            'tempat_agenda' => 'required',
            'waktu' => 'required',
            'pengundang' => 'required',
            'petugas_hadir' => 'required',
        ]);

        // Simpan data agenda ke database
        Agenda::create($request->all());

        return redirect('/admin/agendas')->with('success', 'Agenda Berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
