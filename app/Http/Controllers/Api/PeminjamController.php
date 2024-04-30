<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Peminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= Peminjam::orderBy('tanggal_pinjam','asc')->get();
        return response()->json([
            'status'=>true,
            'message'=>'Data ditemukan',
            'data'=>$data
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataPeminjam= new Peminjam;

        $rules=[
            'nama_peminjam'=>'required',
            'tanggal_pinjam'=>'required|date',
            'tanggal_kembali'=>'required|date'
        ];
        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>"Gagal memasukkan data",
                'data'=> $validator->errors()
            ]);
        }


        $dataPeminjam->nama_peminjam= $request->nama_peminjam;
        $dataPeminjam->tanggal_pinjam= $request->tanggal_pinjam;
        $dataPeminjam->tanggal_kembali= $request->tanggal_kembali;

        $post= $dataPeminjam->save();

        return response() -> json([
            'status'=> true,
            'message'=>"Sukses memasukkan data"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data= Peminjam::find($id);
        if($data){
            return response()-> json([
                'status'=>true,
                'message'=>'Data ditemukan',
                'data'=>$data
            ],200);
        }else{
        return response() -> json([
            'status'=>false,
            'message'=>'Data tidak ditemukan'
        ]);
     }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataPeminjam= Peminjam::find($id);
        if(empty($dataPeminjam)){
            return response()-> json([
                'status'=>false,
                'message'=>"Data tidak ditemukan"
            ],404);
        }

        $rules=[    
            'nama_peminjam'=>'required',
            'tanggal_pinjam'=>'required|date',
            'tanggal_kembali'=>'required|date'
        ];
        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>"Gagal melakkukan update data",
                'data'=> $validator->errors()
            ]);
        }


        $dataPeminjam->nama_peminjam= $request->nama_peminjam;
        $dataPeminjam->tanggal_pinjam= $request->tanggal_pinjam;
        $dataPeminjam->tanggal_kembali= $request->tanggal_kembali;

        $post= $dataPeminjam->save();

        return response() -> json([
            'status'=> true,
            'message'=>"Sukses melakukan update data"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataPeminjam= Peminjam::find($id);
        if(empty($dataPeminjam)){
            return response()-> json([
                'status'=>false,
                'message'=>"Data tidak ditemukan"
            ],404);
        }

        $post= $dataPeminjam->delete();

        return response() -> json([
            'status'=> true,
            'message'=>"Sukses melakukan delete data"
        ]);
    }
}
