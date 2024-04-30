<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= Penerbit::orderBy('nama_penerbit','asc')->get();
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
        $dataPenerbit= new Penerbit;

        $rules=[
            'nama_penerbit'=>'required',
        ];
        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>"Gagal memasukkan data",
                'data'=> $validator->errors()
            ]);
        }

        $dataPenerbit->nama_penerbit= $request->nama_penerbit;

        $post= $dataPenerbit->save();

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
        $data= Penerbit::find($id);
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
        $dataPenerbit= Penerbit::find($id);
        if(empty($dataPenerbit)){
            return response()-> json([
                'status'=>false,
                'message'=>"Data tidak ditemukan"
            ],404);
        }

        $rules=[    
            'nama_penerbit'=>'required',
        ];
        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>"Gagal melakkukan update data",
                'data'=> $validator->errors()
            ]);
        }

        $dataPenerbit->nama_penerbit= $request->nama_penerbit;

        $post= $dataPenerbit->save();

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
        $dataPenerbit= Penerbit::find($id);
        if(empty($dataPenerbit)){
            return response()-> json([
                'status'=>false,
                'message'=>"Data tidak ditemukan"
            ],404);
        }

        $post= $dataPenerbit->delete();

        return response() -> json([
            'status'=> true,
            'message'=>"Sukses melakukan delete data"
        ]);
    }
}
