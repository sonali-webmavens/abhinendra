<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Companie;
use Illuminate\Http\Request;
use App\Exports\CompaniesExport;
use Maatwebsite\Excel\Facades\Excel;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Companie::orderBy('id', 'desc')->paginate(10);
        return view('company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {

        if ($request->hasFile('companylogo')) {
            $file = $request->file('companylogo');
            $filename = 'yt-' . time() . rand() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public', $filename);
            $imagename = $filename;
        }
        Companie::create([
            'name' => $request->companyname,
            'email' => $request->companyemail,
            'logo' => $imagename,
            'website' => $request->companywebsite
        ]);
        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $companyedit = Companie::find($id);
        return view('company.edit', compact('companyedit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, $id)
    {
        if ($request->hasFile('companylogo')) {
            $file = $request->file('companylogo');
            $filename = 'yt-' . time() . rand() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public', $filename);
            $imagename = $filename;
        }
        $logoName = $request->file('companylogo');
        $extension = $logoName->getClientOriginalExtension();
        $filename = time() . "." . $extension;
        $logoName->move('app/public/', $filename);
        $company = Companie::find($id);
        $company->update([
            'name' => $request->companyname,
            'email' => $request->companyemail,
            'logo' => $imagename,
            'website' => $request->companywebsite
        ]);
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Companie::find($id);
        $company->delete();
        return redirect()->route('company.index');
    }


    /**
     * Export companies data in specified format (xlsx or csv).
     *
     * @param string $format The desired export format ('xlsx' or 'csv').
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export($format)
    {
        // Generate a unique file name based on the current datetime
        $fileName = 'company_' . now()->format('Ymd_His');

        // Determine the export format and return the corresponding file download
        if ($format === 'xlsx') {
            return Excel::download(new CompaniesExport, $fileName . '.xlsx');
        } elseif ($format === 'csv') {
            return Excel::download(new CompaniesExport, $fileName . '.csv');
        } else {
            // Handle unsupported format (should not normally occur due to validation)
            abort(404);
        }
    }
}
