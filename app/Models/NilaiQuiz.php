<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiQuiz extends Model
{
    use HasFactory;
     protected $fillable = ['id','id_user','id_quiz','nilai','create_at','update_at'];
    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    
    public function quiz(){
        return $this->belongsTo(Quiz::class, 'id_quiz');
    }
}
