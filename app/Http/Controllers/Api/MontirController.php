<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Montir;
use App\Http\Resources\MontirResource;
use DB;

class MontirController extends Controller
{
    public function index(){
        $montir = Montir::select('nama', 'gender', 'alamat', 'nomor_telepon')
                ->get();
        return new MontirResource(true, 'Data Montir', $montir); 
    }

    public function show($id){
        $montir = Montir::select('nama', 'gender', 'alamat', 'nomor_telepon')
        ->where('id', '=', $id)
        ->get();

        return new MontirResource(true, 'Detail Data Montir', $montir); 
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'nama' => 'required|max:45',
            'gender' => 'required',
            'alamat' => 'required|string|min:10',
            'nomor_telepon' => 'required'
        ]);  
        
        //cek error atau tidak inputan data
        if($validator->fails()){
            return response()->json($validator->error(), 422);
        }
        //proses menyimpan data yang diinput
        $montir = Montir::create([
            'nama' => $request->nama,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon
        ]);

        return new MontirResource(true, 'Data Montir Berhasil Dimasukkan', $montir);
    }
}
