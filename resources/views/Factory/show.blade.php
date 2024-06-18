@extends('layouts.factory')
@section('content')
<div class="container my-4">
	 @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
     <div class="my-4" style="display: flex;">
     <a class="btn btn-sm btn-success" href="{{route('Factory.index')}}">Back to List</a>  <a style="margin: 0 6px" class="btn btn-sm btn-success" href="{{route('Factory.edit',$factory->id)}}">Edit</a>
     </div>
    <div class="my-4">
     <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Factory_name</th>
      <th scope="col">Factory_email</th>
      <th scope="col">Factory_phoneNumber</th>
      <th scope="col">Factory_website</th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <th scope="row">{{$factory->id}}</th>
      <td>{{$factory->name}}</td>
      <td>{{$factory->email}}</td>
      <td>{{$factory->phoneNumber}}</td>
      <td>{{$factory->website}}</td>
    </tr>
  </tbody>
</table>
    </div>
    </div>
@endsection

