<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = "dim_jabatan";
    protected $primaryKey = 'jabatan_id';
    protected $fillable = ['nama_jabatan'];

    public function kinerja()
    {
        return $this->hasMany(KinerjaPegawai::class, 'jabatan_id');
    }
}
