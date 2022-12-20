<?php

namespace App\Http\Controllers;

use App\Models\DataPembayaran;
use App\Models\DetailService;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->hasRole('user')) {
            $antrian = DetailService::where('status', 'pending')->count();
            return view('dahsboard.user', compact('antrian'));
        } else {
            $mounth = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
            foreach ($mounth as $key) {
                $penjualanCOunt[] = DataPembayaran::whereMonth('created_at', $key)->count();
            }

            $pelanggan = Pelanggan::count();
            $antrian = DetailService::where('status', 'pending')->count();
            $transaksi = DataPembayaran::count();
            return view('dahsboard.admin', compact('pelanggan', 'antrian', 'transaksi', 'penjualanCOunt'));
        }
    }
}
