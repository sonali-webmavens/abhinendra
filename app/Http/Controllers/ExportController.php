<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewCompany;
use App\Exports\UsersExport;
use App\Exports\UsersExportCsv;
use Maatwebsite\Excel\Facades\Excel;
class ExportController extends Controller
{

    public function index(){
        $NewCompany=NewCompany::select('id','name','address','contact_no')->get();
        return view('export.index',compact('NewCompany'));
    }
    public function export()
    {   
        $filename = 'company_' . now()->format('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new UsersExport(), $filename);
    }
    public function csvEXport()
    {
        $filename = 'company_' . now()->format('Y-m-d_H-i-s') . '.csv';
        return Excel::download(new  UsersExportCsv(), $filename);
    }
}
