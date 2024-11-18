<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "dim_employee";
    protected $primaryKey = 'employee_id';
    protected $fillable = ['name','tanggal_lahir','jenis_kelamin','alamat'];

    public function kinerja()
    {
        return $this->hasMany(KinerjaPegawai::class, 'employee_id');
    }
}
