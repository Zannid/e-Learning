<?php
namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\SoalQuiz;
use App\Models\Quiz;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quiz = Quiz::all();
        $mapel = Mapel::all();
        return view('admin.quiz.index', compact('quiz', 'mapel'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mapel = Mapel::all();
        $quiz = Quiz::all();
        return view('admin.quiz.create', compact('mapel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'         => 'required|string|max:255',
            'id_mapel'      => 'required|exists:mapels,id',
            'jumlah_soal'   => 'required|integer|min:1',
            'soal'          => 'required|array|min:1',
            'opsi'          => 'required|array',
            'jawaban_benar' => 'required|array',
        ]);

        // Generate Kode quiz
        $lastQuiz = Quiz::latest('id')->first();
        $lastId    = $lastQuiz ? $lastQuiz->id : 0;
        $kodeQuiz = 'TGS' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
        // Buat quiz
        $quiz = Quiz::create([
            'kode_quiz'    => $kodeQuiz,
            'judul'         => $request->judul,
            'id_mapel'      => $request->id_mapel,
            'jumlah_soal'   => $request->jumlah_soal,
            'tenggat_waktu' => Carbon::parse($request->tenggat_waktu),
            'durasi'        => $request->durasi,
        ]);

        // Simpan soal
        foreach ($request->soal as $i => $pertanyaan) {
            SoalQuiz::create([
                'id_quiz'      => $quiz->id,
                'pertanyaan'    => $pertanyaan,
                'pilihan_a'     => $request->opsi[$i]['A'] ?? '',
                'pilihan_b'     => $request->opsi[$i]['B'] ?? '',
                'pilihan_c'     => $request->opsi[$i]['C'] ?? '',
                'pilihan_d'     => $request->opsi[$i]['D'] ?? '',
                'jawaban_benar' => $request->jawaban_benar[$i] ?? 'A',
            ]);
        }

        return redirect()->route('quiz.index')->with('success', 'quiz berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('admin.quiz.show', compact('quiz'));

    }

    public function edit(quiz $quiz) // Changed from $quiz to $quiz
    {
        $mapel = Mapel::all();

        $soal = $quiz->soal()->get();
        return view('admin.quiz.edit', compact('tuga', 'soal', 'mapel'));
    }

    public function update(Request $request, quiz $quiz) // Changed from $quiz to $quiz
    {
        $request->validate([
            'judul'           => 'required|string|max:255',
            'id_mapel'        => 'required|exists:mapels,id',
            'soal'            => 'required|array',
            'soal.*'          => 'required|string',
            'opsi'            => 'required|array',
            'opsi.*'          => 'required|array',
            'opsi.*.A'        => 'required|string',
            'opsi.*.B'        => 'required|string',
            'opsi.*.C'        => 'required|string',
            'opsi.*.D'        => 'required|string',
            'jawaban_benar'   => 'required|array',
            'jawaban_benar.*' => 'required|in:A,B,C,D',
        ]);

        // Update quiz (using $quiz instead of $quiz)
        $quiz->update([
            'judul'         => $request->judul,
            'id_mapel'      => $request->id_mapel,
            'tenggat_waktu' => Carbon::parse($request->tenggat_waktu),
            'durasi'        => $request->durasi,

        ]);

        // Update soal
        $soalList = $quiz->soal()->get();

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

        return redirect()->route('quiz.index')->with('success', 'quiz berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return redirect()->route('quiz.index')->with('success', 'quiz berhasil dihapus.');
    }
}
