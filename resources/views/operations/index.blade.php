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
      <th scope="col">Employee First_name</th>
      <th scope="col">Employee Last_name</th>
      <th scope="col">Employee Email</th>
      <th scope="col">Employee Phone</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @php
       $sno=1;
    @endphp
  @foreach($cat as $value)
<tr>
  <th scope="col">{{$sno++}}</th>
      <th scope="col">{{$value->name}}</th>
      <th scope="col">{{$value->email}}</th>
      <th scope="col">
        <img src="{{asset('storage/'.$value->logo)}}">
      </th>
      <th scope="col">{{$value->website}}</th>
      <th scope="col">{{$value->company->firstname ??"not found" }}</th>
      <th scope="col">{{$value->company->lastname ??"not found"}}</th>
      <th scope="col">{{$value->company->email ??"not found"}}</th>
      <th scope="col">{{$value->company->phone ??"not found"}}</th>
      <th>
        
    <form action="{{route('operations.destroy', $value->id)}}" method="POST">
      @csrf
      @method("DELETE")
    <button type="submit" name="" onclick="return confirm("Are You Sure?");">Delete</button>
    </form>
      </th>
      <th>
      <a style="text-decoration: none; color:white; font-size: 20px; padding: 6px; background: blue; border-radius: 8px" href="{{route('operations.edit', $value->id)}}">Edit</a>
      </th>
     </tr>
  @endforeach
  </tbody>
</table>
<div class="pagination justify-content-center">
   {{$cat->links("pagination::bootstrap-5")}}
</div>
@endsection

