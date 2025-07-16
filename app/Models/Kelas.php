<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = ['id','kelas','jurusan','create_at','update_at'] ;
    public $timestamps = true;

    public function users()
{
    return $this->hasMany(User::class, 'id_kelas');
}
public function tahunAjaran()
{
    return $this->belongsTo(TahunAjaran::class, 'id_tahun_ajaran');
}
public function guru()
{
    return $this->belongsToMany(User::class, 'guru_kelas', 'kelas_id', 'user_id');
}

}
