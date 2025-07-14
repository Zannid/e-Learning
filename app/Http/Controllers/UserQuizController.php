<?php
namespace App\Http\Controllers;

use App\Models\JawabanQuiz;
use App\Models\NilaiQuiz;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserQuizController extends Controller
{
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
    $hasil = \App\Models\NilaiQuiz::where('id_user', Auth::id())
        ->where('id_quiz', $id)
        ->firstOrFail();

    return view('user.quiz.hasil', [
        'nilai' => $hasil->nilai,
        'quiz_id' => $id
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
