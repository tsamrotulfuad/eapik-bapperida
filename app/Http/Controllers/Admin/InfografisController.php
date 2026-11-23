<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Infografis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InfografisController extends Controller
{
    /**
     * Menampilkan daftar infografis.
     */
    public function index()
    {
        $infografis = Infografis::latest()->paginate(10);

        return view('admin.infografis.index', compact('infografis'));
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
            'gambar'       => 'required|array|min:1',
            'gambar.*'     => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'deskripsi'    => 'nullable|string',
            'sumber_data'  => 'nullable|string|max:255',
            'is_published' => 'boolean',
        ]);

        $paths = [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $paths[] = $file->store('infografis', 'public');
            }
        }

        $slug = Str::slug($validated['judul']) . '-' . Str::random(5);
        $isPublished = $request->boolean('is_published', true);

        Infografis::create([
            'user_id'      => Auth::id(),
            'judul'        => $validated['judul'],
            'slug'         => $slug,
            'gambar'       => $paths,
            'deskripsi'    => $validated['deskripsi'] ?? null,
            'sumber_data'  => $validated['sumber_data'] ?? null,
            'is_published' => $isPublished,
            'published_at' => $isPublished ? now() : null,
        ]);

        return redirect()
            ->route('infografis.index')
            ->with('success', 'Infografis berhasil ditambahkan.');
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
        $infografis = Infografis::findOrFail($id);

        $validated = $request->validate([
            'judul'        => 'required|string|max:255',
            'gambar'       => 'nullable|array',
            'gambar.*'     => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'deskripsi'    => 'nullable|string',
            'sumber_data'  => 'nullable|string|max:255',
            'is_published' => 'boolean',
        ]);

        $paths = $infografis->gambar ?? [];

        // Jika upload gambar baru, hapus gambar lama dari storage lalu simpan yang baru
        if ($request->hasFile('gambar')) {
            if (is_array($infografis->gambar)) {
                foreach ($infografis->gambar as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }

            $paths = [];
            foreach ($request->file('gambar') as $file) {
                $paths[] = $file->store('infografis', 'public');
            }
        }

        // Update slug jika judul berubah
        $slug = $infografis->judul !== $validated['judul']
            ? Str::slug($validated['judul']) . '-' . Str::random(5)
            : $infografis->slug;

        $isPublished = $request->boolean('is_published');

        $infografis->update([
            'judul'        => $validated['judul'],
            'slug'         => $slug,
            'gambar'       => $paths,
            'deskripsi'    => $validated['deskripsi'] ?? null,
            'sumber_data'  => $validated['sumber_data'] ?? null,
            'is_published' => $isPublished,
            'published_at' => $isPublished && !$infografis->published_at ? now() : $infografis->published_at,
        ]);

        return redirect()
            ->route('infografis.index')
            ->with('success', 'Infografis berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $infografis = Infografis::findOrFail($id);

        // Hapus seluruh file gambar fisik dari storage
        if (is_array($infografis->gambar)) {
            foreach ($infografis->gambar as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $infografis->delete();

        return redirect()
            ->route('infografis.index')
            ->with('success', 'Infografis berhasil dihapus.');
    }
}
