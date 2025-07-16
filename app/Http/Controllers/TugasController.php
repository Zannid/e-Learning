<?php
namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Tugas;
use App\Models\SoalTugas;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    public function index()
    {
        $guru     = auth()->user();                  // login sebagai guru
        $kelasIds = $guru->kelasDiampu->pluck('id'); // ambil ID kelas yang dia pegang

        $tugas = Tugas::whereIn('id_kelas', $kelasIds)->get();

        $tugas  = Tugas::all();
        $mapel = Mapel::all();
        return view('admin.tugas.index', compact('tugas', 'mapel'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mapel = Mapel::all();
        $tugas = Tugas::all();
        return view('admin.tugas.create', compact('mapel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'            => 'required|string|max:255',
            'id_mapel'         => 'required|exists:mapels,id',
            'jumlah_soal'      => 'required|integer|min:1',
            'soal'             => 'required|array|min:1',
            'opsi'             => 'required|array',
            'jawaban_benar'    => 'required|array',
        ]);

        // Generate Kode tugas
        $lastTugas = Tugas::latest('id')->first();
        $lastId   = $lastTugas ? $lastTugas->id : 0;
        $kodeTugas = 'TGS' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
        // Buat tugas
        $tugas = Tugas::create([
            'kode_tugas'        => $kodeTugas,
            'judul'            => $request->judul,
            'id_mapel'         => $request->id_mapel,
            'jumlah_soal'      => $request->jumlah_soal,
            'tenggat_waktu' => Carbon::parse($request->tenggat_waktu),
        ]);

        // Simpan soal
        foreach ($request->soal as $i => $pertanyaan) {
            SoalTugas::create([
                'id_tugas'       => $tugas->id,
                'pertanyaan'    => $pertanyaan,
                'pilihan_a'     => $request->opsi[$i]['A'] ?? '',
                'pilihan_b'     => $request->opsi[$i]['B'] ?? '',
                'pilihan_c'     => $request->opsi[$i]['C'] ?? '',
                'pilihan_d'     => $request->opsi[$i]['D'] ?? '',
                'jawaban_benar' => $request->jawaban_benar[$i] ?? 'A',
            ]);
        }

        return redirect()->route('tugas.index')->with('success', 'tugas berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tugas = Tugas::findOrFail($id);
        return view('admin.tugas.show', compact('tugas'));

    }


        public function edit(Tugas $tuga)  // Changed from $tugas to $tuga
        {
            $mapel = Mapel::all();


            $soal = $tuga->soal()->get();
            return view('admin.tugas.edit', compact('tuga', 'soal', 'mapel'));
        }
    
        public function update(Request $request, Tugas $tuga)  // Changed from $tugas to $tuga
        {
            $request->validate([
                'judul'            => 'required|string|max:255',
                'id_mapel'         => 'required|exists:mapels,id',
                'soal'             => 'required|array',
                'soal.*'           => 'required|string',
                'opsi'             => 'required|array',
                'opsi.*'           => 'required|array',
                'opsi.*.A'         => 'required|string',
                'opsi.*.B'         => 'required|string',
                'opsi.*.C'         => 'required|string',
                'opsi.*.D'         => 'required|string',
                'jawaban_benar'    => 'required|array',
                'jawaban_benar.*'  => 'required|in:A,B,C,D',
            ]);
    
            // Update tugas (using $tuga instead of $tugas)
            $tuga->update([
                'judul'    => $request->judul,
                'id_mapel' => $request->id_mapel,
                'tenggat_waktu' => Carbon::parse($request->tenggat_waktu),
            ]);
    
            // Update soal
            $soalList = $tuga->soal()->get();
            
            foreach ($soalList as $index => $soal) {
                if (isset($request->soal[$index])) {
                    $soal->update([
                        'pertanyaan'    => $request->soal[$index],
                        'pilihan_a'     => $request->opsi[$index]['A'],
                        'pilihan_b'     => $request->opsi[$index]['B'],
                        'pilihan_c'     => $request->opsi[$index]['C'],
                        'pilihan_d'     => $request->opsi[$index]['D'],
                        'jawaban_benar' => $request->jawaban_benar[$index],
                    ]);
                }
            }
    
            return redirect()->route('tugas.index')->with('success', 'Tugas berhasil diperbarui!');
        }
    

    public function destroy(string $id)
    {
        $tugas = Tugas::findOrFail($id);
        $tugas->delete();

        return redirect()->route('tugas.index')->with('success', 'tugas berhasil dihapus.');
    }
}
