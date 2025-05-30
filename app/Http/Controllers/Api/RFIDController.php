<?php

namespace App\Http\Controllers\Api;

use App\Models\TmpRfid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;

class RFIDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rfid = TmpRfid::all();

        return response()->json([
            'message' => 'No Kartu',
            'data' => $rfid
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nokartu = $request->query('nokartu');

        if (!$nokartu) {
            return response()->json(['message' => 'No kartu tidak ditemukan'], 400);
        }

        TmpRfid::truncate();

        $inserted = TmpRfid::create([
            'nokartu' => $nokartu
        ]);

        if ($inserted) {
            return response()->json([
                'message' => 'Berhasil',
                'data' => $inserted
            ], 200);
        } else {
            return response()->json(['message' => 'Gagal'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
        //
    }
}
