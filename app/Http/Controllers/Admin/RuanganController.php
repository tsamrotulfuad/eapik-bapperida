<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruangans = Ruangan::latest()->get();
        return view('admin.ruangans.index', compact('ruangans'));
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
            'nama_ruangan' => 'required',
            'status' => 'required',
        ]);

        Ruangan::create([
            'nama_ruangan' => $request->nama_ruangan,
            'status'       => $request->status
        ]);

        return redirect('/admin/ruangans')->with('success', 'Ruangan Berhasil ditambahkan!');
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
        $ruangan = Ruangan::findOrFail($id);

        $request->validate([
            'nama_ruangan' => 'required',
            'status' => 'required',
        ]);

        $ruangan->update([
            'nama_ruangan' => $request->nama_ruangan,
            'status' => $request->status,
        ]);

        return redirect('/admin/ruangans')->with('success', 'Ruangan Berhasil dibuah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Ruangan::findOrFail($id)->delete();

        return back()->with('success', 'Ruangan Berhasil dihapus!');
    }
}
