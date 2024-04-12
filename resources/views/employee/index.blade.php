@extends('layouts.app')
@section('table')
 @php
       $sno=1;
    @endphp
    @if($companyCountRows==0)
    
    @else
    <div class="container my-4">
  <a style="text-decoration: none; color:white; font-size:20px; font-weight: 800; cursor: pointer; background:blueviolet; padding:6px; border-radius:4px; boredr:2px solid lightgreen;" href="{{route('employee.create')}}">Add a New Employee</a>
</div>
@endif
@if($employeeCountRows==0)
<div class="text-center"><h2>Sorry but now not any employees list here.</h2></div>  
@else 
<mian style="overflow: scroll;">
<table class="table container my-4 " id="myTable">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Employee First_name</th>
      <th scope="col">Employee Last_name</th>
      <th scope="col">Employee Email</th>
      <th scope="col">Employee Phone</th>
      <th>Company name</th>
      <th>Company email</th>
      <th>Company logo</th>
      <th>Company Website</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
<tr>
    @foreach($companyandemployeedeatils as $company)
    @foreach($company->employee as $employes)
    <tr>
      <th scope="col">{{$sno++}}</th>
      <th scope="col">{{$employes->firstname??'not find'}}</th>
      <th scope="col">{{$employes->lastname ??'not find'}}</th>
      <th scope="col">{{$employes->email ??'not find'}}</th>
      <th scope="col">{{$employes->phone ??'not find'}}</th>
      <th scope="col">{{$company->name}}</th>
      <th scope="col">{{$company->email}}</th>
      <th scope="col">
        <img style="width: 200px; height: 100px; border:1px solid lightgreen; border-radius:8px;" src="{{asset($company->logo)}}">
      </th>
      <th scope="col">{{$company->website}}</th>
      <th>
         <a style="text-decoration: none; color:white; font-size: 20px; padding: 6px; background: blue; border-radius: 8px" href="{{ route('employee.edit',$employes->id??'not found') }}">Edit</a>
      </th>
      <th>
        <form action="{{route('employee.destroy', $employes->id ??'not found')}}" method="POST">
          @csrf
          @method('DELETE')
          <button style="text-decoration: none; color:white; font-size: 18px; padding: 4px; background: red; border-radius: 8px; border:none;" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
      </th>
     </tr>
     @endforeach
     @endforeach
  </tbody>
</table>
</main>
<div class="pagination justify-content-center">
   {{$companyandemployeedeatils->links("pagination::bootstrap-5")}}
</div>
@endif
 @endsection