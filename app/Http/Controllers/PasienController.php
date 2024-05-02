<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PasienRequest;
use App\Http\Controllers\PasienController;
use App\Models\Pasien;
class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $no = 1;
        $pasien = Pasien::get();

        return view('pages.pasien', compact(
            'no',
            'pasien'
            
        ));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PasienRequest $request)
    {
        try {
            // Simpan data ke database
            Pasien::create($request->all());
            return redirect()->route('pasien.index')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            // Tangkap pengecualian dan tampilkan pesan kesalahan
            return redirect()->route('pasien.index')->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
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
        $data = Pasien::find($id); // Mencari data berdasarkan ID
        return view('edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Pasien::find($id); // Mencari data berdasarkan ID

        // Validasi input data jika diperlukan
        $request->validate([
            'no_rmd' => 'required',
            'nik' => 'required',
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'usia' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'biaya' => 'required',
            'no_dana_sehat' => 'required',
            // Tambahkan validasi untuk kolom lain sesuai kebutuhan
        ]);

        // Simpan perubahan data
        $data->no_rmd = $request->input('no_rmd');
        $data->nik = $request->input('nik');
        $data->nama_pasien = $request->input('nama_pasien');
        $data->tempat_lahir = $request->input('tempat_lahir');
        $data->jenis_kelamin = $request->input('jenis_kelamin');
        $data->usia = $request->input('usia');
        $data->agama = $request->input('agama');
        $data->pekerjaan = $request->input('pekerjaan');
        $data->alamat = $request->input('alamat');
        $data->no_telp = $request->input('no_telp');
        $data->biaya = $request->input('biaya');
        $data->no_dana_sehat = $request->input('no_dana_sehat');
        // Setel nilai kolom lain sesuai kebutuhan
        $data->save();
        return redirect()->route('pasien.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pasien::findOrFail($id);
        $data->delete();

        return redirect()->route('pasien.index');
    }
}
