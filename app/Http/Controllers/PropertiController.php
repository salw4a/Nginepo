<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Properti;
use App\Models\StatusProperti;
use App\Models\VerifikasiProperti;
use Illuminate\Http\Request;

class PropertiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Properti::with(['pemilik', 'status', 'verifikasi']);

        // Filter berdasarkan verifikasi jika ada
        if ($request->has('verifikasi') && $request->verifikasi != '') {
            $query->where('id_verifikasi_properti', $request->verifikasi);
        }

        $properti = $query->get();
        $statusProperti = StatusProperti::all();
        $verifikasiProperti = VerifikasiProperti::all();

        return view('admin.managements.manageproperti', compact('properti', 'statusProperti', 'verifikasiProperti'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Implementasi untuk create form jika diperlukan
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Implementasi untuk store jika diperlukan
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $properti = Properti::with(['pemilik', 'status', 'verifikasi'])->findOrFail($id);
        $statusProperti = StatusProperti::all();
        $verifikasiProperti = VerifikasiProperti::all();

        return view('admin.managements.detailmanageproperti', compact('properti', 'statusProperti', 'verifikasiProperti'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Implementasi untuk edit form jika diperlukan
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Implementasi untuk update jika diperlukan
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Implementasi untuk delete jika diperlukan
    }

    /**
     * Update status properti
     */
    public function updateStatus(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|exists:status_properti,id_status_properti'
        ]);

        $properti = Properti::findOrFail($id);
        $properti->update([
            'id_status_properti' => $request->status
        ]);

        return redirect()->back()->with('success', 'Status properti berhasil diupdate');
    }

    /**
     * Update verifikasi properti
     */
    public function updateVerifikasi(Request $request, string $id)
    {
        $request->validate([
            'verifikasi' => 'required|exists:verifikasi_properti,id_verifikasi_properti'
        ]);

        $properti = Properti::findOrFail($id);
        $properti->update([
            'id_verifikasi_properti' => $request->verifikasi
        ]);

        return redirect()->back()->with('success', 'Verifikasi properti berhasil diupdate');
    }
}
