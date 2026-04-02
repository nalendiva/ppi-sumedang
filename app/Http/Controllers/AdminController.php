<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Http\JsonResponse;  // ✅ pastikan ini


class AdminController extends Controller
{
    //
    public function index(): JsonResponse
    {
        $admin = Login::with('anggota:id,nama,nrm')->get();

        return response()->json([
            'success' => true,
            'data'    => $admin,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'username'   => 'required|string',
            'password'   => 'required|string',
            'role'       => 'nullable|in:superadmin,admin,guest',
            'anggota_id' => 'required|exists:anggota,id|unique:login,anggota_id',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $admin = Login::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Admin berhasil ditambahkan',
            'data'    => $admin->load('anggota:id,nama,nrm'),
        ], 201);
    }

    public function destroy(string $id): JsonResponse
    {
        $admin = Login::find($id);

        if (!$admin) {
            return response()->json([
                'success' => false,
                'message' => 'Admin tidak ditemukan',
            ], 404);
        }

        $admin->delete();

        return response()->json([
            'success' => true,
            'message' => 'Akun admin berhasil dihapus',
        ]);
    }
}
