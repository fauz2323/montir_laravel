<?php

namespace App\Http\Controllers;

use App\Models\DataPembayaran;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DataPembayaranController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $pelanggan = DataPembayaran::all();
            return DataTables::of($pelanggan)
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.dataPembayaram.index');
    }
}
