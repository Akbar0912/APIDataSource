<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KinerjaPegawai extends Model
{
    use HasFactory;
    protected $table = "fact_kinerja_pegawai";
    protected $fillable = ['employee_id', 'departemen_id', 'jabatan_id', 'nilai_kinerja', 'gaji', 'jumlah_proyek', 'longitude', 'latitude'];

    public function pegawai()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }
}
