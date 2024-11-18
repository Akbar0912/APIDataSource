<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

    protected $table = "dim_departemen";
    protected $primaryKey = 'departemen_id';
    protected $fillable = ['nama_departemen'];

    public function kinerja()
    {
        return $this->hasMany(KinerjaPegawai::class, 'departemen_id');
    }
}
