<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Montir;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MontirExport;
use Illuminate\Support\Facades\DB as MontirDB;

class controllerMontir extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_montir = MontirDB::table('montir')->get();
        return view('admin.montir.index', compact('ar_montir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.montir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        MontirDB::table('montir')->insert([
            'nama' => request('nama'),
            'gender' => request('gender'),
            'alamat' => request('alamat'),
            'nomor_telepon' => request('nomor_telepon')
        ]);

        return redirect()->route('montir.index')
                        ->with('success', 'Data Pegawai Berhasil Diubah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ar_montir = Montir::find($id);
        return view('admin.montir.detail', compact('ar_montir'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $montir = Montir::find($id);
        return view('admin.montir.edit', compact('montir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        MontirDB::table('montir')->where('id', $id)->update([
            'nama' => request('nama'),
            'gender' => request('gender'),
            'alamat' => request('alamat'),
            'nomor_telepon' => request('nomor_telepon') 

        ]);

        return redirect()->route('montir.index')
            ->with('success', 'Data Pegawai Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ar_montir = Montir::find($id)->delete();
        return redirect('/montir');
    }

    public function montirPDF()
    {
        $montir = Montir::all();
        $pdf = PDF::loadView('admin.montir.montirPDF', ['montir'=>$montir]);
        return $pdf->download('data_montir.pdf');
    }

    public function montirExcel()
    {
        return Excel::download(new MontirExport, 'data_montir.xlsx');
    }
}
