<?php
namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    public function index()
    {
        $tahun = TahunAjaran::orderByDesc('created_at')->get();
        return view('admin.tahun_ajaran.index', compact('tahun'));
    }

    public function create()
    {
        return view('admin.tahun_ajaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|unique:tahun_ajarans,nama',
            'is_active' => 'nullable|boolean',
        ]);

        // Jika tahun ajaran aktif, nonaktifkan lainnya
        if ($request->is_active) {
            TahunAjaran::where('is_active', true)->update(['is_active' => false]);
        }

        TahunAjaran::create([
            'nama'      => $request->nama,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('tahun_ajaran.index')->with('success', 'Tahun ajaran berhasil ditambahkan!');
    }
    public function setAktif($id)
    {
        // Nonaktifkan semua
        \App\Models\TahunAjaran::where('is_active', true)->update(['is_active' => false]);

        // Aktifkan yang dipilih
        \App\Models\TahunAjaran::where('id', $id)->update(['is_active' => true]);

        return redirect()->route('tahun_ajaran.index')->with('success', 'Tahun ajaran berhasil diaktifkan!');
    }

}
