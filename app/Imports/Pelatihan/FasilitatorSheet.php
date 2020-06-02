<?php

namespace App\Imports\Pelatihan;

// use Maatwebsite\Excel\Concerns\ToModel;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\Pelatihan\Entities\PelatihanFasilitatorModel;
use Modules\Pelatihan\Entities\FasilitatorModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use CustomHelper;
use Auth;

class FasilitatorSheet implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    
    // public function sheets(): array
    // {
    //     return [
    //         0 => new PelatihanSheet(),
    //         1 => new PesertaSheet(),
    //         2 => new FasilitatorSheet(),
    //     ];
    // }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            if (CustomHelper::CheckInsertFasilitator($row['nip_nik']) === null) {
               FasilitatorModel::create([
                   'nip_nik'     => $row['nip_nik'],
                   'jk'    => $row['jk'],
                   'nama_lengkap'    => $row['nama_lengkap'],
                   'no_hp'    => $row['no_hp'],
                   'email'    => $row['email'],
                   'jenis_fasilitator'    => $row['jenis_fasilitator'],
                   'instansi'    => $row['instansi'],
                   'created_by' => Auth::user()->user_id,
                   'created_date' => date('Y-m-d H:i:s')
                ]);
            }

            PelatihanFasilitatorModel::create([
               'kode_pelatihan'     => CustomHelper::getKodePelatihan2(),
               'kode_pelatihan_fasilitator'     => CustomHelper::getKodeFasilitator(),
               'nip_nik'     => $row['nip_nik'],
               'materi'    => $row['materi'],
               'created_by' => Auth::user()->user_id,
               'created_date' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
