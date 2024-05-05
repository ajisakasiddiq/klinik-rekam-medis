<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailresepobatController extends Controller
{
    public function index(Request $request)
    {
    $no = 1;
    dd($request['id_periksa']);
    $periksaId = $request->input['id_periksa'];
     $resep = Resep::select('resepobat.id_periksa','pemeriksaan.no_periksa', 'pasien.nama_pasien', 'pemeriksaan.status as statuspemeriksaan', 'resepobat.nama_obat', 'resepobat.aturabpakai', 'resepobat.deskripsi', 'pemeriksaan.tgl_kunjungan', 'pemeriksaan.waktu_kunjungan')
    ->join('pemeriksaan', 'resepobat.id_periksa', '=', 'pemeriksaan.id')
    ->join('pasien', 'pemeriksaan.pasien_id', '=', 'pasien.id')
    ->where('resepobat.id_periksa' ,$periksaId)
    ->get();
    return view('pages.detailresepobat', compact(
        'no',
        'resep'
    ));
}
}
