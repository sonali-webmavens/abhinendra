<?php

namespace App\Exports;

use App\Models\NewCompany;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class UsersExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = NewCompany::select('id','name','address','contact_no')->get();

    
        return $data;
    }

     public function headings(): array
    {
        return [
            'Sno',
            'Name',
            'Address',
            'Contact',
        ];
    }
}
