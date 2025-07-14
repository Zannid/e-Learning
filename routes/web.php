<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\UserQuizController;
use App\Http\Controllers\UserTugasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontController::class, 'index'])->name('welcome');

Route::resource('siswa', SiswaController::class);
Route::resource('mapel', MapelController::class);
Route::resource('quiz', QuizController::class);
Route::resource('tugas', TugasController::class);
Route::resource('materi', MateriController::class);
Route::resource('kelas', KelasController::class);

Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('/tugas', [UserTugasController::class, 'index'])->name('tugas.index');
    Route::get('/tugas/{id}/kerjakan', [UserTugasController::class, 'kerjakan'])->name('tugas.kerjakan');
    Route::post('/tugas/{id}/submit', [UserTugasController::class, 'submit'])->name('tugas.submit');
    Route::get('/tugas/{id}/hasil', [UserTugasController::class, 'hasil'])->name('tugas.hasil');
    Route::get('/quiz', [UserQuizController::class, 'index'])->name('quiz.index');
    Route::get('/quiz/{id}/kerjakan', [UserQuizController::class, 'kerjakan'])->name('quiz.kerjakan');
    Route::post('/quiz/{id}/submit', [UserQuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/quiz/{id}/hasil', [UserQuizController::class, 'hasil'])->name('quiz.hasil');
});

// Public

Route::get('/quizz', [FrontController::class, 'quizz'])->name('quizz');
Route::post('/quiz/{id}/quiz-submit', [FrontController::class, 'quizSubmit'])->name('quizSubmit');
Route::post('/quizz/periksa-kode', [FrontController::class, 'periksaKode'])->name('periksaKode');
Route::get('/quizz/{kode}/kerjakan', [FrontController::class, 'kerjakan'])->name('kerjakan');


// Admin only
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('guru', GuruController::class);
    Route::resource('mapel', MapelController::class);
    Route::resource('kelas', KelasController::class);
});

// Guru and Admin
// Route::middleware(['auth', 'role:guru,admin'])->group(function () {
//     Route::resource('quiz', QuizController::class);
//     Route::resource('tugas', TugasController::class);
//     Route::resource('materi', MateriController::class);
// });

// Siswa

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
