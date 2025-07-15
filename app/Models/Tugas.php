<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $fillable = ['id','kode_tugas','judul','id_mapel','jumlah_soal','tenggat_waktu','foto','create_at','update_at'];
    public $timestamps = true;
    protected $casts = [
    'tenggat_waktu' => 'datetime',
];
     public function soal()
    {
        return $this->hasMany(SoalTugas::class, 'id_tugas');
    }
     public function mapel(){
        return $this->belongsTo(Mapel::class,'id_mapel');
    }
        public function nilai()
    {
        return $this->hasMany(NilaiTugas::class, 'id_tugas');
    }

}
