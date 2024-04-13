<?php

namespace App\Http\Controllers;
use App\Http\Requests\EmployeeRequest;
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
     $companyandemployeedeatils=Companie::has('employee')->paginate(2);
     $employeeCountRows=Employee::count();
     $companyCountRows=Companie::count();
     return view('employee.index',compact('employeeCountRows','companyCountRows','companyandemployeedeatils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     $company=Companie::all();
     $companyCountRows=Companie::count();
     return view('employee.create',compact('company','companyCountRows')); 
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
  {
   Employee::create([
   'firstname'=>$request->employeename,
   'lastname'=>$request->employeelastname,
   'companie_id'=>$request->companyname,
   'email'=>$request->employeeemail,
   'phone'=>$request->phonenumber
      ]);
    return redirect()->route('employee.index');    

    } 

     
    public function show(string $id)
    {
        
    }

  
    
    public function edit($id)
    {
    $employee=Employee::find($id);
    $employeeCountRows=Employee::count();
    $company=Companie::all();
    $companyname=Companie::where('id',$employee->companie_id)->first();
    return view('employee.edit', compact('employee','employeeCountRows','company','companyname'));
    }

    public function update(EmployeeRequest $request, $id)
    {
    $employee=Employee::find($id);
    $employee->update([
    'firstname'=>$request->employeename,
    'lastname'=>$request->employeelastname,
    'companie_id'=>$request->companyname,
    'email'=>$request->employeeemail,
    'phone'=>$request->phonenumber
       ]);
    return redirect()->route('employee.index'); 
    }

  
    public function destroy($id)
    {
    $employee=Employee::find($id);
    $employee->delete();
    return redirect()->route('employee.index');
       
    }
}
