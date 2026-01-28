<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    // tampilkan data jabatan
    public function index()
    {
        $jabatans = Jabatan::all();
        return view('jabatan.index', compact('jabatans'));
    }

    // form tambah
    public function create()
    {
        return view('jabatan.create');
    }

    // simpan data
    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required'
        ]);

        Jabatan::create($request->all());

        return redirect()->route('jabatan.index')
            ->with('success', 'Jabatan berhasil ditambahkan');
    }

    // form edit
    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return view('jabatan.edit', compact('jabatan'));
    }

    // update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jabatan' => 'required'
        ]);

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update($request->all());

        return redirect()->route('jabatan.index')
            ->with('success', 'Jabatan berhasil diupdate');
    }

    // hapus data (ANTI 404)
    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        return redirect()->route('jabatan.index')
            ->with('success', 'Jabatan berhasil dihapus');
    }
}
