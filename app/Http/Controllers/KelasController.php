<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Session;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        $no = 1;
        return view('kelas.index', compact('kelas', 'no'));
    }

    public function store(Request $request)
    {
        Kelas::create($request->all());
        return redirect('kelas')->with('status', 'Data Kelas Berhasil disimpan!');
    }

    public function update(Request $request)
    {
        Kelas::where('id', $request->get('id_kelas'))
            ->update(['nama_kelas' => $request->get('nama_kelas')]);
        return redirect('kelas')->with('status', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect('kelas')->with('status', 'Data berhasil dihapus!');
    }
}
