<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = ['id','kode_quiz','judul','id_mapel','jumlah_soal','tenggat_waktu','foto','create_at','durasi','update_at'];
    public $timestamps = true;
    protected $casts = [
    'tenggat_waktu' => 'datetime',
];
     public function soal()
    {
        return $this->hasMany(SoalQuiz::class, 'id_quiz');
    }
     public function mapel(){
        return $this->belongsTo(Mapel::class,'id_mapel');
    }
        public function nilai()
    {
        return $this->hasMany(NilaiQuiz::class, 'id_quiz');
    }
}
