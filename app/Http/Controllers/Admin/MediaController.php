<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medias = Media::all();
        return view('admin.medias.index', compact('medias'));
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
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',    // Max 2MB untuk cover gambar
            'status' => 'required',
        ]);

        // 3. Proses Upload File Cover
        $pathImage = null;
        if ($request->hasFile('image')) {
            $pathImage = $request->file('image')->store('media', 'public');
        }

        // 4. Simpan Path File ke Database
        Media::create([
            'title' => $request->title,
            'image' => $pathImage,
            'status' => $request->status,
        ]);

        return redirect('/admin/medias')->with('success', 'Media Berhasil ditambahkan!');
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
        $media = Media::findOrFail($id);

        if ($media->image && Storage::disk('public')->exists($media->image)) {
            Storage::disk('public')->delete($media->image);
        }

        $media->delete();

        return back()->with('success', 'Media Berhasil dihapus!');
    }
}
