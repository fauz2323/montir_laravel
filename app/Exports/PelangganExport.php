<?php

namespace App\Exports;

use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PelangganExport implements FromCollection, WithHeadings
{
  public function collection()
  {
    $ar_pelanggan = DB::table('pelanggan')->select('nama', 'no_ktp', 'alamat')->get();
    return $ar_pelanggan;
  }

  public function headings(): array
  {
    return ["Nama", "Nomor KTP", "Alamat"];
  }
}
