<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DetailService;
use App\Models\Montir;
use App\Models\Motor;
use App\Models\Pelanggan;
use App\Models\Service;
use App\Models\Sparepart;
use App\Service\SparePartDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class OrderUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user');
    }

    public function orderList(Request $request)
    {
        $montir = Montir::all();
        $sparePart = Sparepart::all();
        $service = Service::all();
        if ($request->ajax()) {
            $pelanggan = DetailService::where('user_id', Auth::user()->id)->with('montir', 'pelanggan', 'service')->get();
            return DataTables::of($pelanggan)
                ->addIndexColumn()
                ->make(true);
        }
        return view('user.order.index', compact('montir', 'sparePart', 'service'));
    }

    public function addOrder(Request $request)
    {
        $request->validate([
            'pelanggan' => 'required',
            'service' => 'required',
            'keluhan' => 'required',
            'montir' => 'required',
        ]);

        $date = Carbon::now();
        $spare_part = new SparePartDetail;
        $hargaService = Service::find($request->service)->harga_service;

        $spare_part_detail = $spare_part->detail($request->spare);

        DetailService::create([
            'user_id' => Auth::user()->id,
            'pelanggan_id' => $request->pelanggan,
            'service_id' => $request->service,
            'montir_id' => $request->montir,
            'spare_part' => implode(', ', $spare_part_detail['nama_sparepart']),
            'tanggal_service' => $date->toDateString(),
            'jam_masuk' => $date->toTimeString(),
            'keluhan' => $request->keluhan,
            'total_harga' => $spare_part_detail['total'] + $hargaService,
            'status' => 'pending'
        ]);

        return redirect()->back();
    }
}
