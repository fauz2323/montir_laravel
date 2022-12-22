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
            $pelanggan = Pelanggan::where('user_id', Auth::user()->id)->get();
            return DataTables::of($pelanggan)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="delete/' . Crypt::encrypt($row->id) . '/pelanggan"
                    class="btn btn-warning btn-sm" title="Edit Data">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path
                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd"
                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg>
                    </a>';
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
        ]);

        $data = User::find(Auth::user()->id);
        if ($data->dataPelanggan()->first()) {
            return redirect()->route('index-pelanggan')->with('success', 'Data Pelanggan sudah ada');
        } else {
            $data->dataPelanggan()->create($request->all());
        }


        return redirect()->back()->with('success', 'success add data');
    }

    public function deleteDataPelanggan($id)
    {
        $data = Pelanggan::find(Crypt::decrypt($id));
        $data->delete();

        return redirect()->back()->with('success', 'success delete data');
    }
}
