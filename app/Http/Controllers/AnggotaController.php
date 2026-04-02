<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\NoKodeKab;
use App\Models\NoKodeProv;
use Illuminate\Http\JsonResponse;  // ✅ pastikan ini

class AnggotaController extends Controller
{
    public function index(): JsonResponse
    {
        $anggota = Anggota::select('nrm', 'nama', 'angkatan', 'asal_sekolah', 'pendidikan')
            ->get();

        return response()->json([
            'success' => true,
            'data'    => $anggota,
        ]);
    }

        public function search(Request $request): JsonResponse
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

        $result = $query->get();

        if ($result->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
                'data'    => [],
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $result,
        ]);
    }

    public function store(request $request): JsonResponse{
        
    }

}
