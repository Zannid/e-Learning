<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Tugas;
use App\Models\TahunAjaran;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = User::where('role', 'siswa');
        $tugas = Tugas::where('id_kelas', auth()->user()->id_kelas)->get();
        $siswa = $query->get();

        // Tidak perlu munculkan alert warning di sini, karena tidak sedang menghapus
        return view('admin.siswa.index', compact('siswa','tugas', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas= Kelas::all();
        $tahun = TahunAjaran::all();
        return view('admin.siswa.create', compact('kelas', 'tahun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'id_kelas' => 'required|exists:kelas,id',
        'id_tahun_ajaran' => 'required|exists:tahun_ajarans,id'
    ]);

    $siswa = new User();
    $siswa->name = $request->name;
    $siswa->email = $request->email;
    $siswa->password = Hash::make($request->password);
    $siswa->id_kelas = $request->id_kelas;
    $siswa->id_tahun_ajaran = $request->id_tahun_ajaran;
    $siswa->role = 'siswa';
    $siswa->save();

    return redirect()->route('siswa.index')->with('success', 'Data Berhasil Ditambahkan');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(string $id)
    {
        $siswa = User::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            
        ]);

        $siswa = User::findOrFail($id);
        $siswa->name = $request->name;
        $siswa->email = $request->email;

        if ($request->filled('password')) {
            $siswa->password = Hash::make($request->password);
        }

        $siswa->save();

        return redirect()->route('siswa.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = User::findOrFail($id);

        // Menghapus data siswa
        $siswa->delete();
    
        // Redirect kembali dengan session sukses
        return redirect()->route('siswa.index')->with('success', 'Data berhasil dihapus');
    }
}