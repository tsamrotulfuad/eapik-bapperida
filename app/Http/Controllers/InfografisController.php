<?php

namespace App\Http\Controllers;

use App\Models\Infografis;
use Illuminate\Http\Request;

class InfografisController extends Controller
{
   public function index(Request $request)
    {
        $query = Infografis::where('is_published', true);

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('sumber_data', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        $infografis = $query->orderByDesc('published_at')
                            ->latest()
                            ->paginate(12);

        return view('infografis', compact('infografis'));
    }

    public function incrementView(string $id)
    {
        $infografis = Infografis::where('is_published', true)->findOrFail($id);
        $infografis->increment('views');

        return response()->json([
            'success' => true,
            'views'   => number_format($infografis->views),
        ]);
    }
}
