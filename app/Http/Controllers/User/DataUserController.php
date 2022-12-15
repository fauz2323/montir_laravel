<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\DataTables;

class DataUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user');
    }

    public function dataPelanggan(Request $request)
    {
        $motor =  Motor::where('user_id', Auth::user()->id)->get();

        if ($motor->isEmpty()) {
            return redirect()->route('index-motor');
        }

        if ($request->ajax()) {
            $pelanggan = Pelanggan::where('user_id', Auth::user()->id)->with('motor')->get();
            return DataTables::of($pelanggan)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="delete/' . Crypt::encrypt($row->id) . '/pelanggan" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('user.pelanggan.index', compact('motor'));
    }

    public function addDataPelanggan(Request $request)
    {
        $request->validate([
            'alamat_pelanggan' => 'required',
            'nama_pelanggan' => 'required',
            'no_ktp' => 'required',
            'motor_id' => 'required',
        ]);

        $data = User::find(Auth::user()->id);
        $data->dataPelanggan()->create($request->all());

        return redirect()->back()->with('success', 'success add data');
    }

    public function deleteDataPelanggan($id)
    {
        $data = Pelanggan::find(Crypt::decrypt($id));
        $data->delete();

        return redirect()->back()->with('success', 'success delete data');
    }
}
