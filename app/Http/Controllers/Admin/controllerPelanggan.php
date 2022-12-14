<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelanggan;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PelangganExport;
use Illuminate\Support\Facades\DB as PelangganDB;

class controllerPelanggan extends Controller
{
    public function pelanggan()
    {
        $ar_pelanggan = PelangganDB::table('pelanggan')->get();
        return view('admin.pelanggan.pelanggan', compact('ar_pelanggan'));
    }

    public function create()
    {
        $ar_motor = PelangganDB::table('motor')->get();
        return view('admin.pelanggan.create')->with([
            'nomor_motor' => $ar_motor,
        ]);
    }

    public function store(Request $request)
    {
        PelangganDB::table('pelanggan')->insert([
            'id' => request('id'),
            'nama_pelanggan' => request('nama_pelanggan'),
            'no_ktp' => request('no_ktp'),
            'alamat_pelanggan' => request('alamat_pelanggan'),
            'motor_id' => request('motor_id'),
        ]);

        return redirect('/pelanggan')->with('success', 'Data Pegawai Berhasil Diubah');
    }

    // public function pelangganPDF()
    // {
    //     $pelanggan = Pelanggan::all();
    //     $pdf = PDF::loadView('admin.pelanggan.pelangganPDF', ['pelanggan' => $pelanggan]);
    //     return $pdf->download('data_pelanggan.pdf');
    // }

    public function pelangganExcel()
    {
        return Excel::download(new PelangganExport, 'data_pelanggan.xlsx');
    }
}
