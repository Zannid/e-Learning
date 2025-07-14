<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanQuiz extends Model
{
    use HasFactory;
    protected $fillable = ['id_user', 'id_quiz', 'id_soal', 'jawaban', 'benar'];
    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    public function quiz(){
        return $this->belongsTo(Quiz::class, 'id_quiz');
    }
    public function soal(){
        return $this->belongsTo(SoalQuiz::class, 'id_soal');
    }
}
