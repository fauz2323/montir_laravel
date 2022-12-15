<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sparepart;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SparepartExport;
use Illuminate\Support\Facades\DB as SparepartDB;

class controllerSparepart extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_sparepart = SparepartDB::table('spare_part')->get();
        return view('admin.sparepart.index', compact('ar_sparepart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sparepart.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SparepartDB::table('spare_part')->insert([
            'stok' => request('stok'),
            'merek' => request('merek'),
            'harga' => request('harga'),
        ]);

        return redirect('/sparepart')->with('success', 'Data Sparepart berhasil diubah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function detail($id)
    {
        $ar_sparepart = Sparepart::find($id);
        return view('admin.sparepart.detail', compact('ar_sparepart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sparepart = Sparepart::find($id);
        return view('admin.sparepart.edit', compact('sparepart'));
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
        SparepartDB::table('spare_part')->where('id', $id)->update([
            'stok' => request('stok'),
            'merek' => request('merek'),
            'harga' => request('harga'),

        ]);

        return redirect('/sparepart')
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
        $ar_sparepart = Sparepart::find($id)->delete();
        return redirect('/sparepart');
    }

    public function sparepartPDF()
    {
        $sparepart = SparepartDB::all();
        $pdf = PDF::loadView('admin.sparepart.sparepartPDF', ['sparepart'=>$sparepart]);
        return $pdf->download('data_sparepart.pdf');
    }

    public function sparepartExcel()
    {
        return Excel::download(new SparepartExport, 'data_sparepart.xlsx');
    }
}
