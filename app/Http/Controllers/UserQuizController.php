<?php
namespace App\Http\Controllers;

use App\Models\JawabanQuiz;
use App\Models\NilaiQuiz;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserQuizController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }
    public function index()
    {
        $quiz = Quiz::all();
        return view('user.quiz.index', compact('quiz'));
    }

    // Form pengerjaan quiz
    public function kerjakan($id)
    {
        $quiz = Quiz::with('soal')->findOrFail($id);
        if (now()->gt($quiz->tenggat_waktu)) {
            return redirect()->back()->with('error', 'Tugas sudah lewat tenggat waktu.');
        }

        return view('user.quiz.kerjakan', compact('quiz'));
    }

    public function submit(Request $request, $id)
{
    $quiz = Quiz::with('soal')->findOrFail($id);
    $jawabanUser = $request->jawaban ?? [];
    $jumlahSoal = $quiz->soal->count();
    $jawabanBenar = 0;

    foreach ($quiz->soal as $soal) {
        $jawaban = $jawabanUser[$soal->id] ?? null;
        $isCorrect = $jawaban === $soal->jawaban_benar;

        // Simpan jawaban walaupun kosong
        JawabanQuiz::create([
            'id_user' => Auth::id(),
            'id_quiz' => $quiz->id,
            'id_soal' => $soal->id,
            'jawaban' => $jawaban,
            'benar'   => $isCorrect,
        ]);

        if ($isCorrect) {
            $jawabanBenar++;
        }
    }

    $nilai = $jumlahSoal > 0 ? ($jawabanBenar / $jumlahSoal) * 100 : 0;

    NilaiQuiz::updateOrCreate(
        ['id_user' => Auth::id(), 'id_quiz' => $quiz->id],
        ['nilai' => $nilai]
    );

    return redirect()->route('user.quiz.hasil', $quiz->id)->with('success', 'Nilai Anda: ' . round($nilai));
}


    // Melihat hasil
    public function hasil($id)
{
    $userId = Auth::id();

    $hasil = NilaiQuiz::where('id_user', $userId)
        ->where('id_quiz', $id)
        ->firstOrFail();

    // Ambil hanya jawaban terakhir per soal dari quiz ini oleh user ini
    $jawabanTerakhirPerSoal = JawabanQuiz::where('id_user', $userId)
        ->where('id_quiz', $id)
        ->orderBy('created_at', 'desc')
        ->get()
        ->unique('id_soal'); // hanya ambil satu jawaban terbaru per soal

    $jumlahBenar = $jawabanTerakhirPerSoal->where('benar', true)->count();
    $jumlahSalah = $jawabanTerakhirPerSoal->where('benar', false)->count();

    return view('user.quiz.hasil', [
        'quiz_id' => $id,
        'nilai' => $hasil->nilai,
        'benar' => $jumlahBenar,
        'salah' => $jumlahSalah,
        'jawaban_terakhir' => $jawabanTerakhirPerSoal,
    ]);
}





    public function periksa_kode(Request $request)
    {
        $request->validate([
            'kode' => 'required|string',
        ]);

        $quiz = Quiz::where('kode_quiz', $request->kode)->first();

        return view('user.periksa_kode', compact('quiz'));

    }
}
