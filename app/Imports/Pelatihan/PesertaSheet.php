<?php

namespace App\Imports\Pelatihan;

// use Maatwebsite\Excel\Concerns\ToModel;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\Pelatihan\Entities\PelatihanPesertaModel;
use Modules\Pelatihan\Entities\PesertaModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use CustomHelper;
use Auth;

class PesertaSheet implements ToCollection, WithHeadingRow
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

            if (CustomHelper::CheckInsertPeserta($row['nip_nik']) === null) {
               PesertaModel::create([
                   'nip_nik'     => $row['nip_nik'],
                   'jk'    => $row['jk'],
                   'nama_lengkap'    => $row['nama_lengkap'],
                   'no_hp'    => $row['no_hp'],
                   'email'    => $row['email'],
                   'created_by' => Auth::user()->user_id,
                   'created_date' => date('Y-m-d H:i:s')
                ]);
            }

            PelatihanPesertaModel::create([
                   'kode_pelatihan'     => CustomHelper::getKodePelatihan2(),
                   'kode_pelatihan_peserta'     => CustomHelper::getKodePeserta(),
                   'nip_nik'     => $row['nip_nik'],
                   'pretest'    => $row['pretest'],
                   'posttest'    => $row['posttest'],
                   'created_by' => Auth::user()->user_id,
                   'created_date' => date('Y-m-d H:i:s')
                ]);

        }
    }
}
