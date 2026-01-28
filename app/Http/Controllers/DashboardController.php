<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Jabatan;

class DashboardController extends Controller
{
    public function index()
    {
        // TOTAL PEGAWAI
        $totalPegawai = Pegawai::count();

        // LAKI & PEREMPUAN
        $laki = Pegawai::where('jenis_kelamin', 'Laki-laki')->count();
        $perempuan = Pegawai::where('jenis_kelamin', 'Perempuan')->count();

        // SEMENTARA DIANGGAP AKTIF
        $pegawaiAktif = $totalPegawai;

        // DATA GRAFIK JABATAN
        $jabatanLabels = Jabatan::pluck('nama_jabatan');
        $jabatanJumlah = Jabatan::withCount('pegawais')->pluck('pegawais_count');

        return view('dashboard.dashboard', compact(
            'totalPegawai',
            'laki',
            'perempuan',
            'pegawaiAktif',
            'jabatanLabels',
            'jabatanJumlah'
        ));
    }
}
