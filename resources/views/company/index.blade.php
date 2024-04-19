@extends('layouts.app')
@section('min')
<div style="min-height: 20vh;"></div>
@endsection
@section('table')
   <div class="container my-4">
  <a style="text-decoration: none; color:white; font-size:20px; font-weight: 800; cursor: pointer; background:blueviolet; padding:6px; border-radius:4px; boredr:2px solid lightgreen;" href="{{route('company.create')}}">Add a New Company</a>
</div>
<table class="table container my-4 " id="myTable">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Company Name</th>
      <th scope="col">Company email</th>
      <th scope="col">Company logo</th>
      <th scope="col">Company website</th>
      <th>Actions</th>
      <th style="display: none;">Actions</th>
    </tr>
  </thead>
  <tbody>
    @php
       $sno=1;
    @endphp
 @forelse($company as $companydetails)
   <tr>
  <th scope="col">{{$sno++}}</th>
      <th scope="col">{{$companydetails->name}}</th>
      <th scope="col">{{$companydetails->email}}</th>
      <th scope="col">
        <img style="width: 200px; height: 100px; border:1px solid lightgreen; border-radius:8px;" src="{{Storage::url('public/'.$companydetails->logo)}}">
      </th>
      <th scope="col">{{$companydetails->website}}</th>
      <th>
      <a style="text-decoration: none; color:white; font-size: 20px; padding: 6px; background: blue; border-radius: 8px" href="{{route('company.edit', $companydetails->id)}}">Edit</a>
      </th>
      <th>
      <form action="{{route('company.destroy',$companydetails->id)}}" method="POST">
       @csrf
       @method('DELETE')
       <button style="text-decoration: none; color:white; font-size: 18px; padding: 4px; background: red; border-radius: 8px; border:none;"  type="submit" onclick="return confirm('Are you sure?')">Delete</button>
      </form>
    </th>
     </tr>
@empty
   <div class="text-center">Sorry not any details available for now</div>
@endforelse
  </tbody>
</table>
<div class="pagination justify-content-center">
   {{$company->links("pagination::bootstrap-5")}}
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
@endsection


