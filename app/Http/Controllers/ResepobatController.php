<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemeriksaan;
use App\Models\User;
use App\Models\Pasien;
use App\Models\Obat;
use App\Models\Resep;
class ResepobatController extends Controller
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
        $periksa = Pemeriksaan::with('pasien')->get();
        $resep_obat = Obat::get();
        // Mengambil data pemeriksaan dengan mengurutkan berdasarkan waktu pembuatan secara descending
        $kunjungan = Pemeriksaan::with('pasien')->orderBy('created_at', 'desc')->get();
        return view('pages.resepobat',compact('kunjungan','no','dokter','pasien', 'resep_obat','periksa'));
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
        // dd($request['pembelian']);
        try{
        foreach ($request['id_obat'] as $index => $id_obat) {
            $aturanpakai = (string) $request['aturanpakai'][$index];
            $deskripsi = $request['deskripsi'][$index];

                // Simpan ke database sesuai kebutuhan Anda
                Resep::create([
                    'id_periksa' => $request['id_periksa'],
                    'pembelian' => $request['pembelian'],
                    'status' => $request['status'],
                    'deskripsi' => (string) $deskripsi,
                    'aturanpakai' => (string) $aturanpakai,
                    'id_obat' => (string) $id_obat,
                ]);
}
        // Pemeriksa::create($data);

        return redirect()->route('resepobat.index');
    }catch(\Exception $e){
        dd($e);
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

            return redirect()->route('resepobat.index')->with('success', 'User updated successfully');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pemeriksaan::findOrFail($id);
        $data->delete();

        return redirect()->route('resepobat.index');
    }
}
