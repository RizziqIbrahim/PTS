<?php

namespace App\Imports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\ToModel;

class KaryawanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Karyawan([
            'namaKaryawan' => $row[0],
            'hadirMasuk' => $row[1],
            'izinMasuk' => $row[2],
            'bolosMasuk' => $row[3],
            'telatMasuk' => $row[4]

        ]);
    }
}
