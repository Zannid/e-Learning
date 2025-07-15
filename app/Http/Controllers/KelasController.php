<?php
namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();
        
        return view('admin.kelas.index', compact('kelas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kelas.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'kelas' => 'required|unique:kelas',
        //  ]);

        $kelas        = new Kelas();
        $kelas->kelas = $request->kelas;

        $kelas->save();
        session()->flash('success', 'data berhasil disimpan');
        return redirect()->route('kelas.index');

    }

    /**
     * Display the specified resource.
     */
   public function show(Kelas $kelas)
    {
        $kelas->load(['tahunAjaran', 'siswa']);   // eager‐load siswa
        return view('kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $validated = $request->validate([
//     'kelas' => 'required|unique:kelas',
//  ]);

        $kelas        = Kelas::findOrFail($id);
        $kelas->kelas = $request->kelas;

        $kelas->save();
        session()->flash('success', 'data berhasil disimpan');
        return redirect()->route('kelas.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('kelas.index')->with('success', 'Data berhasil dihapus');

    }
     public function list()
    {
        $kelas = Kelas::with('tahunAjaran')->get();
        return view('admin.kelas.list', compact('kelas'));
    }

    // siswa join kelas
    public function join(Request $request, Kelas $kelas)
    {
        $user = $request->user();

        // validasi: pastikan tahun ajaran kelas = aktif?
        if (!$kelas->tahunAjaran || !$kelas->tahunAjaran->is_active) {
            return back()->with('error', 'Tahun ajaran tidak aktif.');
        }

        $user->id_kelas         = $kelas->id;
        $user->id_tahun_ajaran  = $kelas->id_tahun_ajaran;
        $user->save();

        return back()->with('success', 'Berhasil bergabung ke kelas!');
    }

    // detail kelas (guru / admin)
    
}
