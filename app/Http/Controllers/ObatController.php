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
    public function store(Request $request)
    {
        try {
            // Simpan data ke database
            Obat::create($request->all());
            return redirect()->route('obat.index')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            dd($e);
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
         $user = Obat::findOrFail($id);
            $user->update($request->all());

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
