@extends('layouts.app')
@section('table')
<table class="table container my-4 " id="myTable">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Company Name</th>
      <th scope="col">Company email</th>
      <th scope="col">Company logo</th>
      <th scope="col">Company website</th>
    </tr>
  </thead>
  <tbody>
    @php
       $sno=1;
       @endphp
   <tr>
  <th scope="col">{{$sno++}}</th>
      <th scope="col">{{$showcomapny->name}}</th>
      <th scope="col">{{$showcomapny->email}}</th>
      <th scope="col">
        <img style="width: 200px; height: 100px; border:1px solid lightgreen; border-radius:8px;" src="{{Storage::url('public/'.$showcomapny->logo)}}">
      </th>
      <th scope="col">{{$showcomapny->website}}</th>
     </tr>
  </tbody>
</table>
@endsection



