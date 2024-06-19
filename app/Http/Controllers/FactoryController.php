<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FactoryCreateRequest;
use App\Http\Requests\FactoryUpadteRequest;
use App\Models\Factory;
use App\Jobs\CreateFactoryJob;

class FactoryController extends Controller
{
  
    public function index()
    {
        $factory=Factory::all();
        return view('Factory.index', compact('factory'));
    }

    public function create()
    {
        return view('Factory.create');
    }

   
    public function store(FactoryCreateRequest $request)
    {
       $factorycreate=Factory::create($request->all());
       if ($request->hasFile('images')) {
        $factorycreate->addMediaFromRequest('images')->toMediaCollection('images');
       }
       if($factorycreate){
          CreateFactoryJob::dispatch($factorycreate);
          return redirect()->route('Factory.index')->with('message','New Factory Created Successfully!.');
       }
       else{
         return redirect()->back()->with('Error','We are not able to add new factory right now so try after some time!.');
       }
    }

    
    public function show(string $id)
    {    
         $factory=Factory::findOrFail($id);
         return view('Factory.show', compact('factory'));
    }

 
    public function edit(string $id)
    { 
         $factory=Factory::findOrFail($id);
         session()->put('update_id',$factory->id);
         return view('Factory.edit', compact('factory'));     
    }

  
    public function update(FactoryUpadteRequest $request, string $id)
    {  
       $FactoryUpadte=Factory::find($id);
       if($FactoryUpadte){
          $FactoryUpadte->update($request->all());
       if ($request->hasFile('images')) {
           $FactoryUpadte->clearMediaCollection('images');
           $FactoryUpadte->addMediaFromRequest('images')->toMediaCollection('images');
        }
          return redirect()->route('Factory.index')->with('message','Factory Updated Successfully!.');
       }
       else{
         return redirect()->back()->with('Error','We are not able to add new factory right now so try after some time!.');
       }
    }

    
    public function destroy(string $id)
    {
     $factory=Factory::find($id);
     if($factory){
         $factory->delete();
         return redirect()->back()->with('message','Factory Deleted Successfully!.');
     }
     else{
         return redirect()->back()->with('message','We are not able to delete factory right now so try after some time!.');
     }
    }
}
