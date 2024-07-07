<?php

namespace App\Exports;

use App\Models\Companie;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CompaniesExport implements FromCollection, WithMapping, WithHeadings
{
    public function collection()
    {
        return Companie::all();
    }

    public function map($company): array
    {
        return [
            $company->id,
            $company->name,
            $company->email,
            $company->logo,
            $company->website,
            $company->created_at,
            $company->updated_at,
            // Add other fields as needed
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Logo',
            'Website',
            'Created At',
            'Updated At',
            // Add other headings as needed
        ];
    }
}
