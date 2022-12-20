<?php

namespace App\Http\Controllers;

use App\Models\DataPembayaran;
use App\Models\DetailService;
use App\Models\Pelanggan;
use App\Models\Montir;
use App\Models\Sparepart;
use App\Models\Service;
use App\Service\SparePartDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as DetailDB;

class DetailServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_detailService = DetailService::with('pelanggan', 'service', 'montir')->paginate(5);

        return view('admin.detail_service.index', compact('ar_detailService'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        $service = Service::all();
        $montir = Montir::all();
        $spare_part = Sparepart::all();
        return view('admin.detail_service.create', compact('pelanggan', 'service', 'spare_part', 'montir'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $date = Carbon::now();
        $spare_part = new SparePartDetail;
        $hargaService = Service::find($request->service_id)->harga_service;

        $spare_part_detail = $spare_part->detail($request->spare);

        $dataPelanggan = Pelanggan::find($request->pelanggan_id);

        DetailService::create([
            'user_id' => $dataPelanggan->user->id,
            'pelanggan_id' => $request->pelanggan_id,
            'service_id' => $request->service_id,
            'montir_id' => $request->montir_id,
            'spare_part' => implode(', ', $spare_part_detail['nama_sparepart']),
            'tanggal_service' => $date->toDateString(),
            'jam_masuk' => $date->toTimeString(),
            'keluhan' => $request->keluhan,
            'total_harga' => $spare_part_detail['total'] + $hargaService
        ]);


        return redirect()->route('detailservice.index')
            ->with('Berhasil menambahkan data Detail Service');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailService  $detailService
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DetailService::find($id);
        return view('admin.detail_service.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailService  $detailService
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailService $detailservice)
    {

        $pelanggan = Pelanggan::all();
        $service = Service::all();
        $montir = Montir::all();
        return view('admin.detail_service.edit', compact('pelanggan', 'service', 'montir', 'detailservice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailService  $detailService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailService $detailservice)
    {
        $detailservice->update($request->all());
        return redirect()->route('detailservice.index')
            ->with('Berhasil mengubah data Detail Service');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailService  $detailService
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailService $detailservice)
    {
        $detailservice->delete();
        return redirect()->route('detailservice.index')
            ->with('success', 'Data detail service berhasil dihapus');
    }

    public function confirm($id)
    {
        $data = DetailService::find($id);
        $data->status = 'Selesai';
        $data->save();

        DataPembayaran::create([
            'pelanggan' => $data->pelanggan->nama_pelanggan,
            'nama_montir' => $data->montir->nama,
            'keluhan' => $data->keluhan,
            'total' => $data->total_harga,
            'spare_part' => $data->spare_part,
            'jenis_servis' => $data->service->nama_service
        ]);

        return redirect()->route('detailservice.index')
            ->with('success', 'Sukses menyelesaikan pesanan');
    }
}
