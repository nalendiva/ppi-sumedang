<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\NoKodeKab;
use App\Models\NoKodeProv;
use Illuminate\Http\JsonResponse;  // ✅ pastikan ini

class AnggotaController extends Controller
{

    public function index(Request $request): JsonResponse
    {
        $query = Anggota::select('nrm', 'nama', 'angkatan', 'asal_sekolah', 'pendidikan');

        if ($request->filled('nrm')) {
            $query->where('nrm', 'like', '%' . $request->nrm . '%');
        }

        if ($request->filled('nama')) {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }

        if ($request->filled('angkatan')) {
            $query->where('angkatan', $request->angkatan);
        }

        if ($request->filled('asal_sekolah')) {
            $query->where('asal_sekolah', 'like', '%' . $request->asal_sekolah . '%');
        }

        if ($request->filled('pendidikan')) {
            $query->where('pendidikan', 'like', '%' . $request->pendidikan . '%');
        }

        $anggota = $query->get();

        return response()->json([
            'success' => true,
            'data'    => $anggota,
        ]);
    }

    public function indexAdmin(): JsonResponse
    {
        $anggota = Anggota::orderBy('no_urut', 'asc')->get();

        return response()->json([
            'success' => true,
            'data'    => $anggota,
        ]);
    }

    public function search(Request $request): JsonResponse
    {
        // Wajib ada minimal 1 parameter
        if (!$request->hasAny(['nrm', 'nama', 'angkatan', 'asal_sekolah', 'pendidikan'])) {
            return response()->json([
                'success' => false,
                'message' => 'Minimal satu parameter pencarian harus diisi',
                'data'    => [],
            ], 422);
        }

        $query = Anggota::select('nrm', 'nama', 'angkatan', 'asal_sekolah', 'pendidikan');

        if ($request->filled('nrm')) {
            $query->where('nrm', 'like', '%' . $request->nrm . '%');
        }

        if ($request->filled('nama')) {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }

        if ($request->filled('angkatan')) {
            $query->where('angkatan', $request->angkatan);
        }

        if ($request->filled('asal_sekolah')) {
            $query->where('asal_sekolah', 'like', '%' . $request->asal_sekolah . '%');
        }

        if ($request->filled('pendidikan')) {
            $query->where('pendidikan', 'like', '%' . $request->pendidikan . '%');
        }

        $result = $query->paginate(20); // tambah pagination

        if ($result->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
                'data'    => [],
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $result->items(),
            'pagination' => [
                'current_page' => $result->currentPage(),
                'per_page'     => $result->perPage(),
                'total'        => $result->total(),
                'last_page'    => $result->lastPage(),
            ],
        ]);
    }

    public function store(request $request): JsonResponse{
            $validated = $request->validate([
            'no_urut'      => 'nullable|integer',
            'nama'         => 'nullable|string|max:255',
            'nrm'          => 'nullable|string|unique:anggota,nrm',
            'asal_sekolah' => 'nullable|string|max:255',
            'alamat'       => 'nullable|string|max:255',
            'email'        => 'nullable|string|max:255',
            'no_telp'      => 'nullable|string|max:20',
            'provinsi'     => 'nullable|string|max:255',
            'kabupaten'    => 'nullable|string|max:255',
            'angkatan'     => 'nullable|string|max:255',
            'pendidikan'   => 'nullable|string|max:255',
            'pekerjaan'    => 'nullable|string|max:255',
        ]);

        if (empty($validated['nrm'])) {
            $provinsi  = ucwords(strtolower($validated['provinsi']));
            $kabupaten = ucwords(strtolower($validated['kabupaten']));

            $kodeProv = NoKodeProv::where('nama_provinsi', $provinsi)->value('kode_prov');
            $kodeKab  = NoKodeKab::where('nama_kabupaten', $kabupaten)->value('kode_kab');

            if (!$kodeProv || !$kodeKab) {
                return response()->json([
                    'success' => false,
                    'message' => 'Provinsi atau kabupaten tidak ditemukan',
                ], 422);
            }

            $validated['nrm'] = substr($validated['angkatan'], 0, 4)
                . str_pad($kodeProv, 2, '0', STR_PAD_LEFT)
                . str_pad($kodeKab, 2, '0', STR_PAD_LEFT)
                . str_pad($validated['no_urut'], 3, '0', STR_PAD_LEFT);
        }

        $anggota = Anggota::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Anggota berhasil ditambahkan',
            'data'    => $anggota,
        ], 201);
    }

    public function destroy(string $id): JsonResponse
    {
        $anggota = Anggota::find($id);

        if (!$anggota) {
            return response()->json([
                'success' => false,
                'message' => 'Anggota tidak ditemukan',
            ], 404);
        }

        $anggota->delete();

        return response()->json([
            'success' => true,
            'message' => 'Anggota berhasil dihapus',
        ]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $anggota = Anggota::find($id);

        if (!$anggota) {
            return response()->json([
                'success' => false,
                'message' => 'Anggota tidak ditemukan',
            ], 404);
        }

        $validated = $request->validate([
            'no_urut'      => 'nullable|integer',
            'nrm'          => 'nullable|string|unique:anggota,nrm,' . $id,
            'nama'         => 'nullable|string|max:255',
            'asal_sekolah' => 'nullable|string|max:255',
            'alamat'       => 'nullable|string|max:255',
            'email'        => 'nullable|email|max:255',
            'no_telp'      => 'nullable|string|max:20',
            'provinsi'     => 'nullable|string|max:255',
            'kabupaten'    => 'nullable|string|max:255',
            'angkatan'     => 'nullable|string|max:255',
            'pendidikan'   => 'nullable|string|max:255',
            'pekerjaan'    => 'nullable|string|max:255',
        ]);

        $anggota->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Anggota berhasil diupdate',
            'data'    => $anggota,
        ]);
    }

}
