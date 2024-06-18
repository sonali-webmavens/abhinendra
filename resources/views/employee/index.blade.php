@extends('layouts.app')
@section('min')
<div style="min-height: 20vh;"></div>
@endsection
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
      <th style="display: none;">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($companyandemployeedeatils as $employes)
    <tr>
      <th scope="col">{{$sno++}}</th>
      <th scope="col">{{$employes->firstname??'not find'}}</th>
      <th scope="col">{{$employes->lastname ??'not find'}}</th>
      <th scope="col">{{$employes->email ??'not find'}}</th>
      <th scope="col">{{$employes->phone ??'not find'}}</th>
      <th scope="col">{{$employes->company->name}}</th>
      <th scope="col">{{$employes->company->email}}</th>
      <th scope="col">
        <img style="width: 200px; height: 100px; border:1px solid lightgreen; border-radius:8px;" src="{{Storage::url('public/'.$employes->company->logo)}}">
      </th>
      <th scope="col">{{$employes->company->website}}</th>
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
  </tbody>
</table>
<div class="pagination justify-content-center">
   {{$companyandemployeedeatils->links("pagination::bootstrap-5")}}
</div>
@push('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
@endpush
@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#myTable").DataTable();
  })
</script>
@endpush
@endif
 @endsection