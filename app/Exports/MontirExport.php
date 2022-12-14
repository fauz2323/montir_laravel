<?php

namespace App\Exports;

use App\Models\Montir;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MontirExport implements FromCollection, WithHeadings
{
    public function collection()
    {
      $ar_montir = DB::table('montirs')->select('name','gender','no_telp','alamat')->get();
      return $ar_montir;
    }

    public function headings(): array
    {
        return ["Nama", "jenis Kelamin", "Nomor Telepon", "Alamat"];
    }
}
