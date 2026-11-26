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
        $kajians = Kajian::with('bidang')->latest()->paginate(10);
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
        $validated = $request->validate([
            'judul'        => 'required|string|max:255',
            'penulis'      => 'required|string|max:255',
            'bidang_id'    => 'required|exists:bidangs,id',
            'tahun_terbit' => 'required|integer|min:2000|max:2099',
            'jenis'        => 'required|string|max:255',
            'abstrak'      => 'required|string',
            'kata_kunci'   => 'required|string|max:255',
            'file_dokumen' => 'required|file|mimes:pdf|max:10240',
            'cover'        => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status'       => 'required|in:draft,internal,publish',
        ]);

        if ($request->hasFile('file_dokumen')) {
            $validated['file_dokumen'] = $request->file('file_dokumen')->store('dokumen', 'public');
        }

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('covers', 'public');
        }

        Kajian::create($validated);

        return redirect('/admin/kajians')->with('success', 'Kajian berhasil ditambahkan!');
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
        $kajian = Kajian::findOrFail($id);

        $validated = $request->validate([
            'judul'        => 'required|string|max:255',
            'penulis'      => 'required|string|max:255',
            'bidang_id'    => 'required|exists:bidangs,id',
            'tahun_terbit' => 'required|integer|min:2000|max:2099',
            'jenis'        => 'required|string|max:255',
            'abstrak'      => 'required|string',
            'kata_kunci'   => 'required|string|max:255',
            'file_dokumen' => 'nullable|file|mimes:pdf|max:10240',
            'cover'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status'       => 'required|in:draft,internal,publish',
        ]);

        $updateData = collect($validated)->except(['file_dokumen', 'cover'])->toArray();

        if ($request->hasFile('file_dokumen')) {
            if ($kajian->file_dokumen && Storage::disk('public')->exists($kajian->file_dokumen)) {
                Storage::disk('public')->delete($kajian->file_dokumen);
            }
            $updateData['file_dokumen'] = $request->file('file_dokumen')->store('dokumen', 'public');
        }

        if ($request->hasFile('cover')) {
            if ($kajian->cover && Storage::disk('public')->exists($kajian->cover)) {
                Storage::disk('public')->delete($kajian->cover);
            }
            $updateData['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $kajian->update($updateData);

        return redirect('/admin/kajians')->with('success', 'Kajian berhasil diubah!');
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

        return back()->with('success', 'Kajian berhasil dihapus!');
    }
}
