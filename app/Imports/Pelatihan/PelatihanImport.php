<?php

namespace App\Imports\Pelatihan;

// use Maatwebsite\Excel\Concerns\ToModel;
// use Modules\Pelatihan\Entities\PelatihanModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use CustomHelper;

class PelatihanImport implements WithMultipleSheets
{
    /**
    * @param Collection $collection
    */
    
    public function sheets(): array
    {
        return [
            0 => new PelatihanSheet(),
            1 => new PesertaSheet(),
            2 => new FasilitatorSheet(),
        ];
    }

    // public function model(array $row)
    // {
    //     return new PelatihanModel([
    //        'kode_pelatihan'     => $row['kode_penyelenggara'],
    //        'penyelenggara'    => $row['penyelenggara']
    //     ]);
    // }
}
