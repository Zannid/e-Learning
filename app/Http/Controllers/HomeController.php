<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Materi;
use App\Models\Quiz;
use App\Models\Tugas;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $materi = Materi::count();
        $quiz = Quiz::count();
        $tugas = Tugas::count();
        $siswa = User::where('role', 'siswa')->get();

        return view('home', [
        'materi' => \App\Models\Materi::count(),
        'siswa'  => \App\Models\User::where('role', 'siswa')->count(),
        'quiz'   => \App\Models\Quiz::count(),
        'tugas'  => \App\Models\Tugas::count(),
    ]);
    }

}
