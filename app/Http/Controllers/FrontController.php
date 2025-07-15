<?php
namespace App\Http\Controllers;

use App\Models\JawabanQuiz;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\NilaiQuiz;
use App\Models\Quiz;
use App\Models\Tugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua kelas untuk ditampilkan di filter
        $kelas = Kelas::all();

        $quiz  = Quiz::all();
        $query = User::where('role', 'guru');
        $guru  = $query->get();

        // Ambil materi berdasarkan kelas yang dipilih
        if ($request->has('search')) {
            $materi = Materi::where('id_kelas', $request->get('search'))->get();
        } else {
            $materi = Materi::all(); // Ambil semua materi jika tidak ada filter
        }

        return view('welcome', compact('materi', 'kelas', 'guru', 'quiz'));
    }
    public function quizz(Request $request)
    {
        $quiz  = Quiz::all();
        $kelas = Kelas::all();

        return view('quizz', compact('quiz', 'kelas'));
    }

    public function periksaKode(Request $request)
    {
        $request->validate([
            'kode' => 'required|string',
        ]);

        $quiz = Quiz::where('kode_quiz', $request->kode)->first();

        return view('periksa_kode', compact('quiz'));

    }

    public function kerjakan(Request $request, $kode)
    {
        $quiz = Quiz::with('soal')->where('kode_quiz', $kode)->first();

        return view('user.quiz.kerjakan', compact('quiz'));
    }

    // Menyimpan hasil pengerjaan
    public function quizSubmit(Request $request, $id)
    {
        $id_quiz     = Quiz::with('soal')->findOrFail($id);
        $jawabanUser = $request->jawaban;
        $benar       = 0;
        $totalSoal   = $id_quiz->soal->count();

        foreach ($id_quiz->soal as $soal) {
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
            'id_user' => Auth::id(),
            'id_quiz' => $id_quiz->id,
            'nilai'   => $nilai,
        ]);
        foreach ($id_quiz->soal as $soal) {
            $jawaban   = $jawabanUser[$soal->id] ?? null;
            $isCorrect = $jawaban === $soal->jawaban_benar;

            JawabanQuiz::create([
                'id_user' => Auth::id(),
                'id_quiz' => $id_quiz->id,
                'id_soal' => $soal->id,
                'jawaban' => $jawaban,
                'benar'   => $isCorrect,
            ]);

            if ($isCorrect) {
                $benar++;
            }
        }

        return view('user.quiz.hasil', compact('nilai'));
    }

    public function tugass()
    {
        $tugas = Tugas::all();
        $kelas = Kelas::all();

        return view('tugass', compact('tugass', 'kelas'));
    }
     public function isi($id){
        $materi = Materi::findOrFail($id);
        return view('isi', compact('materi'));
    }
}
