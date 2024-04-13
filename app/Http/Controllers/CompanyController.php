<?php

namespace App\Http\Controllers;
use App\Http\Requests\CompanyRequest;
use App\Models\Companie;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company=Companie::paginate(10);
        return view('company.index',compact('company'));
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

        if($request->hasFile('companylogo')){
        $file=$request->file('companylogo');
        $filename='yt-'.time().rand().'.'.$file->getClientOriginalExtension();
        $path=$file->storeAs('public',$filename);
        $imagename=$filename;
    }
        Companie::create([
        'name'=>$request->companyname,
        'email'=>$request->companyemail,
        'logo'=>$imagename,
        'website'=>$request->companywebsite
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
        $companyedit=Companie::find($id);
        return view('company.edit',compact('companyedit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request,$id)
    {
        if($request->hasFile('companylogo')){
        $file=$request->file('companylogo');
        $filename='yt-'.time().rand().'.'.$file->getClientOriginalExtension();
        $path=$file->storeAs('public',$filename);
        $imagename=$filename;
    }
        $logoName =$request->file('companylogo');
        $extension=$logoName->getClientOriginalExtension();
        $filename=time().".".$extension;
        $logoName->move('app/public/',$filename);  
        $company=Companie::find($id);
        $company->update([
        'name'=>$request->companyname,
        'email'=>$request->companyemail,
        'logo'=>$imagename,
        'website'=>$request->companywebsite
        ]);
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company=Companie::find($id);
        $company->delete();
        return redirect()->route('company.index');
    }
}
