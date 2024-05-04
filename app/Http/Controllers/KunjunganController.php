<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemeriksaan;
use App\Models\User;
use App\Models\Pasien;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $no = 1;
        $dokter = User::where('role','dokter')
            ->where('status','aktif')->get();
        $pasien = Pasien::get();
        $kunjungan = Pemeriksaan::with('pasien')->latest()->get(); // Mengambil data kunjungan dengan urutan berdasarkan waktu pembuatan, dengan yang terbaru di atas

        return view('pages.kunjungan',compact('kunjungan','no','dokter','pasien'));
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
    try {
        $data = $request->all();
        Pemeriksaan::create($data);

        // Dapatkan nama pasien yang terkait dengan kunjungan baru
        $pasien = Pasien::findOrFail($data['pasien_id'])->nama_pasien;

        // Berikan pesan bahwa kunjungan baru telah ditambahkan sesuai dengan nama pasien
        return redirect()->route('kunjungan.index')->with('success', 'Kunjungan baru untuk ' . $pasien . ' telah ditambahkan.');
    } catch (\Exception $e) {
        // Tangkap pengecualian dan tampilkan pesan kesalahan
        return redirect()->route('kunjungan.index')->with('error', 'Gagal menambahkan kunjungan: ' . $e->getMessage());
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

     public function update(Request $request, $id)
        {
            $user = Pemeriksaan::findOrFail($id);
            $user->update($request->all());

            return redirect()->route('kunjungan.index')->with('success', 'User updated successfully');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    try {
        $data = Pemeriksaan::findOrFail($id);
        $nama_pasien = $data->pasien->nama_pasien; // Dapatkan nama pasien yang terkait dengan kunjungan yang akan dihapus
        $data->delete();

        // Berikan pesan bahwa kunjungan telah dihapus sesuai dengan nama pasien
        return redirect()->route('kunjungan.index')->with('success', 'Kunjungan untuk ' . $nama_pasien . ' telah dihapus.');
    } catch (\Exception $e) {
        // Tangkap pengecualian dan tampilkan pesan kesalahan
        return redirect()->route('kunjungan.index')->with('error', 'Gagal menghapus kunjungan: ' . $e->getMessage());
    }
}
}
