<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    use HasFactory;
    protected $fillable = ['id','nama','is_active','create_at','update_at'];
    public function users()
{
    return $this->hasMany(User::class, 'id_tahun_ajaran');
}
public function kelas()
{
    return $this->hasMany(Kelas::class, 'id_tahun_ajaran');
}

}
