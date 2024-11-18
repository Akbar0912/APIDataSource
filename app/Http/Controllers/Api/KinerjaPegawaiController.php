<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KinerjaPegawai;
use Illuminate\Http\Request;

class KinerjaPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $kinerja = KinerjaPegawai::all();
        $kinerja = KinerjaPegawai::with(['pegawai', 'departemen', 'jabatan'])->get();

        // Map data agar lebih terstruktur
    $formattedKinerja = $kinerja->map(function($item) {
        return [
            'id' => $item->id,
            // 'pegawai' => [
                // 'id' => $item->pegawai->employee_id,
                'nama' => $item->pegawai->name,
                'tanggal_lahir' => $item->pegawai->tanggal_lahir,
                'jenis_kelamin' => $item->pegawai->jenis_kelamin,
                'alamat' => $item->pegawai->alamat,
            // ],
            // 'departemen' => [
                // 'id' => $item->departemen->departemen_id,
                'nama_departemen' => $item->departemen->nama_departemen,
            // ],
            // 'jabatan' => [
                // 'id' => $item->jabatan->jabatan_id,
                'nama_jabatan' => $item->jabatan->nama_jabatan,
            // ],
            'nilai_kinerja' => $item->nilai_kinerja,
            'gaji' => $item->gaji,
            'jumlah_proyek' => $item->jumlah_proyek,
            'longitude'=> $item->longitude,
            'latitude'=>$item->latitude,
            // 'created_at' => $item->created_at,
            // 'updated_at' => $item->updated_at,
        ];
    });

        return response()->json([
            'status'=>true,
            'message'=>'data ditemukan',
            'data'=>$formattedKinerja
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pegawai_id' => 'required|exists:dim_employee,employee_id',
            'departemen_id' => 'required|exists:dim_departemen,departemen_id',
            'jabatan_id' => 'required|exists:dim_jabatan,jabatan_id',
            'nilai_kinerja' => 'required|numeric',
            'gaji' => 'required|numeric',
            'jumlah_proyek' => 'required|integer',
        ]);

        $kinerja = KinerjaPegawai::create($validatedData);
        return response()->json([
            'status'=>true,
            'message'=>'sukses memasukan data',
            'data'=>$kinerja
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kinerja = KinerjaPegawai::with(['pegawai', 'departemen', 'jabatan'])->find($id);
        if($kinerja){
            return response()->json([
                'status'=>true,
                'message'=>'data ditemukan',
                'data'=>$kinerja
            ],200);
        } else {
            return response()->json([
                'status'=>false,
                'message'=>'data tidak ditemukan',
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kinerja = KinerjaPegawai::find($id);
        $validatedData = $request->validate([
            'pegawai_id' => 'exists:dim_employee,employee_id',
            'departemen_id' => 'exists:dim_departemen,departemen_id',
            'jabatan_id' => 'exists:dim_jabatan,jabatan_id',
            'nilai_kinerja' => 'numeric',
            'gaji' => 'numeric',
            'jumlah_proyek' => 'integer',
        ]);

        $kinerja->update($validatedData);
        return response()->json([
            'status'=>true,
            'message'=>'data berhasil diupdate',
            'data'=>$kinerja
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kinerja = KinerjaPegawai::find($id);
        $kinerja->delete();
        return response()->json([
            'status'=>true,
            'message'=>'data berhasil dihapus'
        ]);
    }
}
