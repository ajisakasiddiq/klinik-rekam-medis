<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = auth()->user()->role; // Mengambil peran (role) pengguna yang sudah login

        // Mengarahkan pengguna berdasarkan peran (role)
        if ($role === 'dokter') {
            return view('pages.dashboard-dokter');
        } elseif ($role === 'perawat') {
            return view('pages.dashboard-perawat');
        } elseif ($role === 'admin') {
            return view('pages.dashboard-admin');
        } elseif ($role === 'apoteker') {
            return view('pages.dashboard-apoteker');
        } else {
            // Pengguna tidak memiliki peran yang sesuai, lakukan sesuai kebijakan aplikasi Anda
        }
    }
}
