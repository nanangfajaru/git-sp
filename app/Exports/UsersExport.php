<?php

namespace App\Exports;

use App\Model\UserModel;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromQuery, ShouldAutoSize, WithHeadings
{

	use Exportable;

    public function __construct($role_id)
    {
        $this->role_id = $role_id;
    }

    public function query()	
    {
        return DB::table('users AS a')
                ->select(DB::raw('a.username, a.name, b.role_desc'))
                // ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY a.name ASC) as idx, a.username, a.name, b.role_desc'))
                // ->select(DB::raw('Row_Number() Over ( Order By a.name ) As idx, a.username, a.name, b.role_desc'))
                ->leftJoin('mstr_role AS b', 'a.role_id', '=', 'b.role_id')
                ->where('a.role_id', 'like', '%'.$this->role_id.'%')
                ->orderBy('a.name', 'ASC') ;
    }   

    public function headings(): array
    {
        return [
            // '#',
            'Username',
            'Name',
            'Role'
        ];
    }

}
