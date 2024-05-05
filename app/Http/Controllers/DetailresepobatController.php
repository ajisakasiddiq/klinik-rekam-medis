<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep;
class DetailresepobatController extends Controller
{
    public function index(Request $request)
    {
    $no = 1;
    // dd($request['id_periksa']);
    $periksaId = $request['id_periksa'];
     $resep = Resep::select('resepobat.id_periksa','pemeriksaan.no_periksa', 'pasien.nama_pasien', 'pemeriksaan.status as statuspemeriksaan', 'obat.nama_obat', 'resepobat.aturanpakai', 'resepobat.deskripsi', 'pemeriksaan.tgl_kunjungan', 'pemeriksaan.waktu_kunjungan')
    ->join('pemeriksaan', 'resepobat.id_periksa', '=', 'pemeriksaan.id')
    ->join('pasien', 'pemeriksaan.pasien_id', '=', 'pasien.id')
    ->join('obat', 'resepobat.id_obat', '=', 'obat.id')
    ->where('resepobat.id_periksa' ,$periksaId)
    ->get();
     $kunjungan = Resep::select('pemeriksaan.no_periksa', 'pasien.nama_pasien')
    ->join('pemeriksaan', 'resepobat.id_periksa', '=', 'pemeriksaan.id')
    ->join('pasien', 'pemeriksaan.pasien_id', '=', 'pasien.id')
    ->groupBy('pemeriksaan.no_periksa','pasien.nama_pasien')
    ->where('resepobat.id_periksa' ,$periksaId)
    ->get();
    return view('pages.detailresepobat', compact(
        'no',
        'kunjungan',
        'resep'
    ));
}
}
