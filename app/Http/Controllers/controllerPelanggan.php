<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Motor;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PelangganExport;
use Illuminate\Support\Facades\DB as PelangganDB;

class controllerPelanggan extends Controller
{
    public function index(){
        $ar_pelanggan = PelangganDB::table('pelanggan')->get();
        return view('admin.pelanggan.index', compact('ar_pelanggan'));
    }

    public function create()
    {
        $ar_motor = PelangganDB::table('motor')->get();
        return view('admin.pelanggan.create')->with([
            'nomor_motor' => $ar_motor,
        ]);
        //return view('admin.pelanggan.create');
    }

    public function store(Request $request)
    {
        PelangganDB::table('pelanggan')->insert([
            'nama_pelanggan' => request('nama_pelanggan'),
            'no_ktp' => request('no_ktp'),
            'alamat_pelanggan' => request('alamat_pelanggan'),
            'motor_id' => request('motor_id')
        ]);

        return redirect()->route('pelanggan.index')
                        ->with('success', 'Data Pegawai Berhasil Ditambah');
    }

    public function show(Pelanggan $pelanggan)
    {
        //
    }

    public function edit(Pelanggan $pelanggan)
    {
        $ar_motor=Motor::all();
        return view('admin.pelanggan.edit',compact('pelanggan', 'ar_motor'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
            'nama_pelanggan' => ['required'],
            'no_ktp' => ['required'],
            'alamat_pelanggan' => ['required'],
            'motor_id' => ['required']
        ]);
        $pelanggan->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_ktp' => $request->no_ktp,
            'alamat_pelanggan' => $request->alamat_pelanggan,
            'motor_id' => $request->motor_id
        ]);

        return redirect()->route('pelanggan.index')
                        ->with('success','Data Pelanggan berhasil diubah');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')
                        ->with('success','Data pelanggan berhasil dihapus');
    }

    public function pelangganPDF()
    {
        $pelanggan = Pelanggan::all();
        $pdf = PDF::loadView('admin.pelanggan.pelangganPDF', ['pelanggan'=>$pelanggan]);
        return $pdf->download('data_pelanggan.pdf');
    }

    public function pelangganExcel()
    {
        return Excel::download(new PelangganExport, 'data_pelanggan.xlsx');
    }
}
