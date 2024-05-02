<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ObatRequest;
use App\Http\Controllers\ObatController;
use App\Models\Obat;
class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $no = 1;
        $obat = Obat::get();

        return view('pages.obat', compact(
            'no',
            'obat'
            
        ));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ObatRequest $request)
    {
        try {
            // Simpan data ke database
            Obat::create($request->all());
            return redirect()->route('obat.index')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            // Tangkap pengecualian dan tampilkan pesan kesalahan
            return redirect()->route('obat.index')->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
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
        $data = Obat::find($id); // Mencari data berdasarkan ID
        return view('edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Obat::find($id); // Mencari data berdasarkan ID

        // Validasi input data jika diperlukan
        $request->validate([
            'nama_obat' => 'required',
            'stok' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'satuan' => 'required',
            // Tambahkan validasi untuk kolom lain sesuai kebutuhan
        ]);

        // Simpan perubahan data
        $data->nama_obat = $request->input('nama_obat');
        $data->stok = $request->input('stok');
        $data->harga_beli = $request->input('harga_beli');
        $data->harga_jual = $request->input('harga_jual');
        $data->satuan = $request->input('satuan');
        // Setel nilai kolom lain sesuai kebutuhan
        $data->save();
        return redirect()->route('obat.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Obat::findOrFail($id);
        $data->delete();

        return redirect()->route('obat.index');
    }
}
