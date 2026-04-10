<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;  
use App\Models\Berita;


class BeritaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'gambar'  => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
            'penulis' => 'nullable|string|max:255',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            // Simpan ke storage/app/public/berita/
            // Link yang tersimpan di DB: "berita/namafile.jpg"
            $gambarPath = $request->file('gambar')->store('berita', 'public');
        }

        $berita = Berita::create([
            'judul'   => $request->judul,
            'gambar'  => $gambarPath,
            'isi'     => $request->isi,
            'tanggal' => $request->tanggal,
            'penulis' => $request->penulis,
        ]);

        $berita->gambar_url = $gambarPath ? asset('storage/' . $gambarPath) : null;

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil ditambahkan',
            'data'    => $berita,
        ], 201);
    }

    public function destroy($id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return response()->json(['success' => false, 'message' => 'Berita tidak ditemukan'], 404);
        }

        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil dihapus',
        ]);
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return response()->json(['success' => false, 'message' => 'Berita tidak ditemukan'], 404);
        }

        $request->validate([
            'judul'   => 'sometimes|string|max:255',
            'gambar'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'isi'     => 'sometimes|string',
            'tanggal' => 'sometimes|date',
            'penulis' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $berita->gambar = $request->file('gambar')->store('berita', 'public');
        }

        $berita->judul   = $request->judul   ?? $berita->judul;
        $berita->isi     = $request->isi     ?? $berita->isi;
        $berita->tanggal = $request->tanggal ?? $berita->tanggal;
        $berita->penulis = $request->penulis ?? $berita->penulis;
        $berita->save();

        $berita->gambar_url = $berita->gambar ? asset('storage/' . $berita->gambar) : null;

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil diupdate',
            'data'    => $berita,
        ]);
    }


}
