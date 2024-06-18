@extends('layouts.factory')
@section('content')
<div class="container my-4">
	 @if (session('Error'))
        <div class="alert alert-danger">
            {{ session('Error') }}
        </div>
        @endif
<div class="my-4">
	<a class="btn btn-sm btn-success" href="{{route('Factory.index')}}">Back to List</a>
</div>
<form action="{{route('Factory.update',$factory->id)}}" method="post">
 @csrf
 @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" value="{{$factory->name}}" class="form-control" required placeholder="Enter Name">
    @error('name')
    <span class="alert alert-danger" role="alert">{{$message}}</span>
    @enderror
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" value="{{$factory->email}}" class="form-control" required placeholder="Enter Email">
    @error('email')
    <span class="alert alert-danger" role="alert">{{$message}}</span>
    @enderror
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Phone_Number</label>
    <input type="number" name="phoneNumber" value="{{$factory->phoneNumber}}" class="form-control" required placeholder="Enter Phone Number">
    @error('phoneNumber')
    <span class="alert alert-danger" role="alert">{{$message}}</span>
    @enderror
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Website</label>
    <input type="url" name="website" value="{{$factory->website}}" class="form-control" required placeholder="Enter website url">
    @error('website')
    <span class="alert alert-danger" role="alert">{{$message}}</span>
    @enderror
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>
</div>
@endsection

