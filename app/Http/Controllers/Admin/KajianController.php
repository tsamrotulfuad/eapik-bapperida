<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bidang;
use App\Models\Kajian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KajianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kajians = Kajian::latest()->get();
        $bidangs = Bidang::all();
        return view('admin.kajians.index', compact('kajians', 'bidangs'));
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
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'bidang_id' => 'required',
            'tahun_terbit' => 'required|integer',
            'jenis' => 'required',
            'abstrak' => 'required',
            'kata_kunci' => 'required',
            'file_dokumen' => 'required|file|mimes:pdf|max:10240', // Max 10MB, silakan sesuaikan formatnya
            'cover' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',    // Max 2MB untuk cover gambar
            'status' => 'required',
        ]);

        // 2. Proses Upload File Dokumen (Disimpan di storage/app/public/dokumen)
        $pathDokumen = null;
        if ($request->hasFile('file_dokumen')) {
            $pathDokumen = $request->file('file_dokumen')->store('dokumen', 'public');
        }

        // 3. Proses Upload File Cover
        $pathCover = null;
        if ($request->hasFile('cover')) {
            $pathCover = $request->file('cover')->store('covers', 'public');
        }

        // 4. Simpan Path File ke Database
        Kajian::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'bidang_id' => $request->bidang_id,
            'tahun_terbit' => $request->tahun_terbit,
            'jenis' => $request->jenis,
            'abstrak' => $request->abstrak,
            'kata_kunci' => $request->kata_kunci,
            'file_dokumen' => $pathDokumen,
            'cover' => $pathCover,
            'status' => $request->status,
        ]);

        return redirect('/admin/kajians')->with('success', 'Kajian Berhasil ditambahkan!');
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
        // 1. Cari data kajian yang akan diupdate
        $kajian = Kajian::findOrFail($id);

        // 2. Validasi Input (Gunakan aturan validasi yang presisi)
        $validated = $request->validate([
            'judul'        => 'required|string|max:255',
            'penulis'      => 'required|string|max:255',
            'bidang_id'    => 'required', // Jika id berupa integer, bisa gunakan 'required|integer'
            'tahun_terbit' => 'required|integer',
            'jenis'        => 'required|string',
            'abstrak'      => 'required|string',
            'kata_kunci'   => 'required|string',
            'file_dokumen' => 'nullable|file|mimes:pdf|max:10240', // Sesuai keinginan Anda (Hanya PDF)
            'cover'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status'       => 'required|string',
        ]);

        // 3. Ambil data teks hasil validasi (Kecuali file dokumen & cover)
        $updateData = collect($validated)->except(['file_dokumen', 'cover'])->toArray();

        // 4. Proses Update File Dokumen (jika ada file baru diunggah)
        if ($request->hasFile('file_dokumen')) {
            // Hapus dokumen lama jika filenya ada di storage
            if ($kajian->file_dokumen && Storage::disk('public')->exists($kajian->file_dokumen)) {
                Storage::disk('public')->delete($kajian->file_dokumen);
            }
            // Simpan dokumen baru
            $updateData['file_dokumen'] = $request->file('file_dokumen')->store('dokumen', 'public');
        }

        // 5. Proses Update File Cover (jika ada cover baru diunggah)
        if ($request->hasFile('cover')) {
            // Hapus cover lama jika filenya ada di storage
            if ($kajian->cover && Storage::disk('public')->exists($kajian->cover)) {
                Storage::disk('public')->delete($kajian->cover);
            }
            // Simpan cover baru
            $updateData['cover'] = $request->file('cover')->store('covers', 'public');
        }

        // 6. Eksekusi update data ke database
        $kajian->update($updateData);

        return redirect('/admin/kajians')->with('success', 'Kajian Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kajian = Kajian::findOrFail($id);

        if ($kajian->file_dokumen && Storage::disk('public')->exists($kajian->file_dokumen)) {
            Storage::disk('public')->delete($kajian->file_dokumen);
        }

        if ($kajian->cover && Storage::disk('public')->exists($kajian->cover)) {
            Storage::disk('public')->delete($kajian->cover);
        }

        $kajian->delete();

        return back()->with('success', 'Kajian Berhasil dihapus!');
    }
}
