<?php

namespace App\Http\Controllers;

use App\Models\DetailService;
use App\Models\Pelanggan;
use App\Models\Montir;
use App\Models\Sparepart;
use App\Models\Service;
use Illuminate\Http\Request;
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
        $ar_detailService = DetailService::with('pelanggan','service','spare_part','montir')->paginate(5);
      
        return view('admin.detail_service.index',compact('ar_detailService'))
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
        return view('admin.detail_service.create', compact('pelanggan','service','spare_part','montir'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DetailService::create([
            'pelanggan_id' => $request->pelanggan_id,
            'tanggal_service' => $request->tanggal_service,
            'jam_masuk' => $request->jam_masuk,
            'service_id' => $request->service_id,
            'spare_part_id' => $request->spare_part_id,
            'montir_id' => $request->montir_id,
            'keluhan' => $request->keluhan,
            'total_harga' => $request->total_harga,
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
    public function show(DetailService $detailservice)
    {
        //
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
        $spare_part = Sparepart::all();
        return view('admin.detail_service.edit', compact('pelanggan','service','spare_part','montir','detailservice'));
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
                        ->with('success','Data detail service berhasil dihapus');
    }
}
