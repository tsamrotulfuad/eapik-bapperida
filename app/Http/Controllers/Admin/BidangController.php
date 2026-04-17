<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bidang;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bidangs = Bidang::latest()->get();
        return view('admin.bidangs.index', compact('bidangs'));
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
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        Bidang::create([
            'nama'       => $request->nama,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/admin/bidangs')->with('success', 'Bidang Berhasil ditambahkan!');
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
        $bidang = Bidang::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        $bidang->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/admin/bidangs')->with('success', 'Bidang Berhasil dibuah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Bidang::findOrFail($id)->delete();

        return back()->with('success', 'Bidang Berhasil dihapus!');
    }
}
