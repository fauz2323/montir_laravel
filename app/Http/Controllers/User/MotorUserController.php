<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\DataTables;

class MotorUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user');
    }

    public function dataMotor(Request $request)
    {
        if ($request->ajax()) {
            $pelanggan = Motor::where('user_id', Auth::user()->id)->get();
            return DataTables::of($pelanggan)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="delete/' . Crypt::encrypt($row->id) . '/motor" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('user.motor.index');
    }

    public function addDataMotor(Request $request)
    {
        $request->validate([
            'jenis_motor' => 'required',
            'nomor_motor' => 'required',
            'merek_motor' => 'required',
        ]);

        $user = User::find(Auth::user()->id);
        $user->motor()->create($request->all());

        return redirect()->back()->with('success', 'success add data');
    }

    public function deleteDataMotor($id)
    {
        $data = Motor::find(Crypt::encrypt($id));

        if ($data->pelanggan->first()) {
            return redirect()->back()->with('error', 'delete data pelanggan terlebih dahulu');
        }

        $data->delete();

        return redirect()->back()->with('success', 'success delete data');
    }
}
