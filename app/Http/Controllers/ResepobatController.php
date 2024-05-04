<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemeriksaan;
use App\Models\User;
use App\Models\Pasien;
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
        // Mengambil data pemeriksaan dengan mengurutkan berdasarkan waktu pembuatan secara descending
        $kunjungan = Pemeriksaan::with('pasien')->orderBy('created_at', 'desc')->get();
        return view('pages.resepobat',compact('kunjungan','no','dokter','pasien'));
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

        return redirect()->route('resepobat.index');
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
