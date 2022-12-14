<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Motor;
use Illuminate\Support\Facades\DB as MotorDB;

class controllerMotor extends Controller
{
    public function index()
    {
        $motor = Motor::paginate(5);

        return view('admin.motor.index', compact('motor'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.motor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_motor' => 'required',
            'nomor_motor' => 'required',
            'merek_motor' => 'required'
        ]);
        Motor::create($request->all());

        return redirect()->route('motor.index')
            ->with('Berhasil menambahkan data Motor');
    }

    public function edit(Motor $motor)
    {
        return view('admin.motor.edit', compact('motor'));
    }

    public function show($id)
    {
        $motor = MotorDB::find($id);
        return view('motor.detail', compact('motor'));
    }

    public function update(Request $request, Motor $motor)
    {
        $request->validate([
            'id' => 'required',
            'jenis_motor' => 'required',
            'nomor_motor' => 'required',
            'merek_motor' => 'required'
        ]);

        $motor->update($request->all());

        return redirect()->route('motor.index')
            ->with('success', 'Data Motor berhasil diubah');
    }

    public function destroy(Motor $motor)
    {
        $motor->delete();
        return redirect()->route('motor.index')
            ->with('success', 'Data Motor berhasil dihapus');
    }
}
