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

    // Menyimpan hasil pengerjaan
    public function submit(Request $request, $id)
    {
        $quiz       = Quiz::with('soal')->findOrFail($id);
        $jawabanUser = $request->jawaban;
        $benar       = 0;
        $totalSoal   = $quiz->soal->count();

        foreach ($quiz->soal as $soal) {
            $jawaban = $jawabanUser[$soal->id] ?? null;
            if ($jawaban && $jawaban === $soal->jawaban_benar) {
                $benar++;
            }
        }

        if ($totalSoal == 0) {
            $nilai = 0;
        } else {
            $nilai = ($benar / $totalSoal) * 100;
        }

        NilaiQuiz::create([
            'id_user'  => Auth::id(),
            'id_quiz' => $quiz->id,
            'nilai'    => $nilai,
        ]);
        foreach ($quiz->soal as $soal) {
            $jawaban   = $jawabanUser[$soal->id] ?? null;
            $isCorrect = $jawaban === $soal->jawaban_benar;

            JawabanQuiz::create([
                'id_user'  => Auth::id(),
                'id_quiz' => $quiz->id,
                'id_soal'  => $soal->id,
                'jawaban'  => $jawaban,
                'benar'    => $isCorrect,
            ]);

            if ($isCorrect) {
                $benar++;
            }
        }

        return redirect()->route('user.quiz.hasil', $quiz->id)->with('success', 'Nilai Anda: ' . $nilai);
    }

    // Melihat hasil
    public function hasil($id)
    {
        $hasil = NilaiQuiz::where('id_user', Auth::id())->where('id_quiz', $id)->firstOrFail();
        return view('hasil', compact('hasil'));
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
