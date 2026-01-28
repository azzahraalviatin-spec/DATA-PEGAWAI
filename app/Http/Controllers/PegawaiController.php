<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $pegawais = Pegawai::with('jabatan')
            ->when($search, function ($query) use ($search) {
                $query->where('nama_pegawai', 'like', "%$search%")
                      ->orWhere('jenis_kelamin', 'like', "%$search%")
                      ->orWhere('no_telp', 'like', "%$search%")
                      ->orWhereHas('jabatan', function ($q) use ($search) {
                          $q->where('nama_jabatan', 'like', "%$search%");
                      });
            })
            ->get();

        return view('pegawai.index', compact('pegawais'));
    }

    public function create()
    {
        $jabatans = Jabatan::all();
        return view('pegawai.create', compact('jabatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pegawai'  => 'required',
            'jabatan_id'    => 'required',
            'jenis_kelamin' => 'required',
            'no_telp'       => 'required|digits_between:10,13',
            'alamat'        => 'required',
            'tanggal_masuk' => 'required|date',
            'gaji'          => 'required|numeric',
        ]);

        Pegawai::create($request->all());

        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pegawai  = Pegawai::findOrFail($id);
        $jabatans = Jabatan::all();

        return view('pegawai.edit', compact('pegawai', 'jabatans'));
    }

    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $request->validate([
            'nama_pegawai'  => 'required',
            'jabatan_id'    => 'required',
            'tanggal_masuk' => 'required|date',
            'gaji'          => 'required|numeric',
        ]);

        $pegawai->update($request->all());

        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai berhasil diupdate');
    }

    // ⬇️ INI YANG PENTING (ANTI 404)
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai berhasil dihapus');
    }
}
