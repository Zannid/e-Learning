<?php
namespace App\Http\Controllers;

use App\Models\NilaiTugas;
use App\Models\JawabanTugas;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTugasController extends Controller
{
    public function index()
    {
        $tugas = Tugas::all();
        return view('user.tugas.index', compact('tugas'));
    }

    // Form pengerjaan tugas
    public function kerjakan($id)
    {
        $tugas = Tugas::with('soal')->findOrFail($id);
        if (now()->gt($tugas->tenggat_waktu)) {
            return redirect()->back()->with('error', 'Tugas sudah lewat tenggat waktu.');
        }

        return view('user.tugas.kerjakan', compact('tugas'));
    }

    // Menyimpan hasil pengerjaan
public function tugasSubmit(Request $request, $id)
{
    $tugas = Tugas::with('soal')->findOrFail($id);

    // Cek tenggat waktu
    if (now()->gt($tugas->tenggat_waktu)) {
        return redirect()->route('user.tugas.index')->with('error', 'Tugas sudah melewati tenggat waktu.');
    }

    $jawabanUser = $request->jawaban ?? [];
    $jumlahSoal = $tugas->soal->count();
    $jawabanBenar = 0;

    foreach ($tugas->soal as $soal) {
        $jawaban = $jawabanUser[$soal->id] ?? null;
        $isCorrect = $jawaban === $soal->jawaban_benar;

        JawabanTugas::create([
            'id_user' => Auth::id(),
            'id_tugas' => $tugas->id,
            'id_soal' => $soal->id,
            'jawaban' => $jawaban,
            'benar'   => $isCorrect,
        ]);

        if ($isCorrect) {
            $jawabanBenar++;
        }
    }

    $nilai = $jumlahSoal > 0 ? ($jawabanBenar / $jumlahSoal) * 100 : 0;

    NilaiTugas::updateOrCreate(
        ['id_user' => Auth::id(), 'id_tugas' => $tugas->id],
        ['nilai' => $nilai]
    );

    return redirect()->route('user.tugas.hasil', $tugas->id)->with('success', 'Nilai Anda: ' . round($nilai));
}



    public function hasil($id)
{
    $userId = Auth::id();

    $hasil = NilaiTugas::where('id_user', $userId)
        ->where('id_tugas', $id)
        ->firstOrFail();

    // Ambil hanya jawaban terakhir per soal dari tugas ini oleh user ini
    $jawabanTerakhirPerSoal = JawabanTugas::where('id_user', $userId)
        ->where('id_tugas', $id)
        ->orderBy('created_at', 'desc')
        ->get()
        ->unique('id_soal'); // hanya ambil satu jawaban terbaru per soal

    $jumlahBenar = $jawabanTerakhirPerSoal->where('benar', true)->count();
    $jumlahSalah = $jawabanTerakhirPerSoal->where('benar', false)->count();

    return view('user.tugas.hasil', [
        'tugas_id' => $id,
        'nilai' => $hasil->nilai,
        'benar' => $jumlahBenar,
        'salah' => $jumlahSalah,
        'jawaban_terakhir' => $jawabanTerakhirPerSoal,
    ]);
}
}
