<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $fillable = ['id','judul','isi_materi','id_mapel','id_kelas','id_guru','foto','create_at','update_at'];
    public $timestamps = true;

    public function mapel(){
        return $this->belongsTo(Mapel::class,'id_mapel');
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class,'id_kelas');
    }
    public function user(){
        return $this->belongsTo(User::class,'id_guru');
    }
}
