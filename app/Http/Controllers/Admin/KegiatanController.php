<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bidang;
use App\Models\Kegiatan;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatans = Kegiatan::latest()->get();
        $bidangs = Bidang::all();
        $ruangans = Ruangan::all();
        return view('admin.kegiatans.index', compact('kegiatans', 'bidangs', 'ruangans'));
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
        $request->validate([
            'nama_kegiatan' => 'required',
            'deskripsi' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'bidang_id' => 'required',
            'ruangan_id' => 'required',
            'status' => 'required',
        ]);

        Kegiatan::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'deskripsi'     => $request->deskripsi,
            'waktu_mulai'   => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'bidang_id'     => $request->bidang_id,
            'ruangan_id'    => $request->ruangan_id,
            'status'        => $request->status
        ]);

        return redirect('/admin/kegiatans')->with('success', 'Kegiatan Berhasil ditambahkan!');
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
        $kegiatan = Kegiatan::findOrFail($id);

        $request->validate([
            'nama_kegiatan' => 'required',
            'deskripsi' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'bidang_id' => 'required',
            'ruangan_id' => 'required',
            'status' => 'required',
        ]);

        $kegiatan->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'deskripsi'     => $request->deskripsi,
            'waktu_mulai'   => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'bidang_id'     => $request->bidang_id,
            'ruangan_id'    => $request->ruangan_id,
            'status'        => $request->status
        ]);

        return redirect('/admin/kegiatans')->with('success', 'Ruangan Berhasil dibuah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
