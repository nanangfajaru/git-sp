<?php

namespace App\Imports\Pelatihan;

use Maatwebsite\Excel\Concerns\ToModel;
use Modules\Pelatihan\Entities\PelatihanModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use CustomHelper;
use Auth;

class PelatihanSheet implements ToModel, WithHeadingRow
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

    public function model(array $row)
    {
        return new PelatihanModel([
           'kode_pelatihan'     => CustomHelper::getKodePelatihan(),
           'penyelenggara'     => $row['penyelenggara'],
           'nama_penyelenggara'     => $row['nama_penyelenggara'],
           'jenis_pelatihan'     => $row['jenis_pelatihan'],
           'nama_pelatihan'     => CustomHelper::getNamaPelatihan(
                                        $row['jenis_pelatihan'],Auth::user()->id_balai,$row['angkatan'],$row['tahun']
                                    ),
           'angkatan'     => $row['angkatan'],
           'tanggal_mulai'     => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_mulai']),
           'tanggal_selesai'     => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_selesai']),
           'id_desa'     => $row['id_desa'],
           'jumlah_peserta'     => $row['jumlah_peserta'],
           'catatan'      => $row['catatan'],
           'id_balai'      => $row['id_balai'],
           'flag'      => 'UPLOAD',
           'status'      => '3',
           'created_by' => Auth::user()->user_id,
           'created_date' => date('Y-m-d H:i:s')
        ]);
    }
}
