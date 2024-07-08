<?php

namespace App\Exports;

use App\Models\NewCompany;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class UsersExportCsv implements FromCollection, WithHeadings, WithCustomCsvSettings, ShouldAutoSize
{
    use Exportable;

    public function collection()
    {
        return NewCompany::select('id','name','address','contact_no')->get();
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

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => '|',
        ];
    }
}
