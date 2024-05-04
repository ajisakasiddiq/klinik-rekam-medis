<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemeriksaan;
use App\Models\User;
use App\Models\Pasien;
class PemeriksaanController extends Controller
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
    $kunjungan = Pemeriksaan::with('pasien')->orderBy('created_at', 'desc')->get();
    return view('pages.pemeriksaan',compact('kunjungan','no','dokter','pasien'));
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
        $data = $request->all();
        Pemeriksaan::create($data);

        return redirect()->route('pemeriksaan.index');
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

            if ($request->hasFile('foto_fisik')) {
    $data = $request->all();
    $data['foto_fisik'] = $request->file('foto_fisik')->store('assets/foto_fisik', 'public');
    $user->update($data);

            } else {
            $user->update($request->all());
        }

            return redirect()->route('pemeriksaan.index')->with('success', 'Pemeriksaan berhasil diperbarui');

        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pemeriksaan::findOrFail($id);
        $data->delete();

        return redirect()->route('pemeriksaan.index');
    }
}