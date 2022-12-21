<?php

namespace App\Service;

use App\Models\Sparepart;

class SparePartDetail
{
    public function detail($listSpare)
    {
        $total = 0;
        $nama_sparepart = [];

        if ($listSpare) {
            $spare = Sparepart::all();
            foreach ($listSpare as $key) {
                $spare_part = $spare->find($key);
                $spare_part->stok = $spare_part->stok - 1;
                $spare_part->save();
                $total = $total + $spare_part->harga;
                $nama_sparepart[] = $spare_part->merek;
            }

            $data = [
                'nama_sparepart' => $nama_sparepart,
                'total' => $total
            ];
            return $data;
        }

        $data = [
            'nama_sparepart' => ['tidak ada pergantian'],
            'total' => 0
        ];

        return $data;
    }
}
