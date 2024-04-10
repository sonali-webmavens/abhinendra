<?php

namespace App\Http\Controllers;

use App\Models\Companie;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $cat=Companie::with('company')->paginate(2); 
       return view('operations.index', compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $company=Companie::count();
        $com=Companie::all();
        return view('operations.create',compact('company','com'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)


{

$path=$request->file('clogo')->store('app/public');



    $request->validate([
  'cname'=>'required',
  'cemail'=>'required|email',
  'clogo'=>'required|image|max:2048',
  'cwebsite'=>'required',
  'ename'=>'required',
  'elast'=>'required',
  'select'=>'required',
  'eemail'=>'required|email',
  'ephone'=>'required|numeric'
    ]);

        Companie::create([
    
    'name'=>$request->cname,
    'email'=>$request->cemail,
   'logo'=>$path,
   'website'=>$request->cwebsite

        ]);

        Employee::create([
        'firstname'=>$request->ename,
        'lastname'=>$request->elast,
         'companie_id'=>$request->select,
          'email'=>$request->eemail,
          'phone'=>$request->ephone

        ]);

        return redirect()->route('operations.index');
    }

   
     
    public function show(string $id)
    {
        //
    }

  
    
    public function edit($id)
    {
     $cat=Companie::find($id);
     $cat1=Employee::find($id);
     return view('operations.edit', compact('cat','cat1'));
    }

    public function update(Request $request,  $id)
    {

    $pathed=$request->file('comapnylogo')->store('app/public');
    $request->validate([
  'comapnyname'=>'required',
  'comapnyemail'=>'required|email',
  'comapnylogo'=>'required|image|max:2048',
  'comapnywebsite'=>'required',
  'employeename'=>'required',
  'employeelast'=>'required',
  'employeeemail'=>'required|email',
  'employeenumber'=>'required|numeric'
    ]);

      $req=Companie::find($id);
      $req2=Employee::find($id);
      $req->update([
       'name'=>$request->comapnyname,
       'email'=>$request->comapnyemail,
       'logo'=>$pathed,
       'website'=>$request->comapnywebsite
      ]);

 $req2->update([
       'firstname'=>$request->employeename,
       'lastname'=>$request->employeelast,
       'email'=>$request->employeeemail,
       'phone'=>$request->employeenumber
      ]);

 return redirect()->route('operations.index');
    }

  
    public function destroy($id)
    {
       
       $company =Companie::find($id);
       $company->delete();
       return redirect()->route('operations.index');
    }
}
