@extends('layouts.app')
@section('table')
@php 


$condition=false;

@endphp
@if($company==0)
<h2>Soory for now not any company available so you can not add any data.</h2>
@else
<div class="container my-4">
<form method="POST" action="{{ route('operations.store')}}" enctype='multipart/form-data'>
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Company name</label>
    <input type="text" name="cname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

     @error('cname')
    <span class="alert alert-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Company email</label>
    <input type="text" name="cemail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    @error('cemail')
    <span class="alert alert-danger">{{ $message }}</span>
    @enderror
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Company logo</label>
    <input type="file" name="clogo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
      @error('clogo')
    <span class="alert alert-danger">{{ $message }}</span>
    @enderror
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Company website</label>
    <input type="text" name="cwebsite" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
       @error('cwebsite')
    <span class="alert alert-danger">{{ $message }}</span>
    @enderror
  </div>

    <div class="form-group">
    <label for="exampleInputEmail1">Employee first name</label>
    <input type="text" name="ename" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      @error('ename')
    <span class="alert alert-danger">{{ $message }}</span>
    @enderror
  </div>

   <div class="form-group">
    <label for="exampleInputEmail1">Employee last name</label>
    <input type="text" name="elast" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
       @error('elast')
    <span class="alert alert-danger">{{ $message }}</span>
    @enderror
  </div>


   <div class="form-group">
    <label for="exampleInputEmail1">Employee company</label>
    <select name="select" class="form-control">
   @forelse ($com as $item)
  <option  value="{{$item->id}}">{{$item->name}}</option>
   @empty
   <h2>Sorry not any company vailable for now</h2>
   @endforelse
  </select>
     @error('select')
    <span class="alert alert-danger">{{ $message }}</span>
    @enderror
  </div>

 <div class="form-group">
    <label for="exampleInputEmail1">Employee email</label>
    <input type="text" name="eemail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
     @error('eemail')
    <span class="alert alert-danger">{{ $message }}</span>
    @enderror
  </div>

 <div class="form-group">
    <label for="exampleInputEmail1">Employee phone</label>
    <input type="text" name="ephone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
       @error('ephone')
    <span class="alert alert-danger">{{ $message }}</span>
    @enderror
  </div>
<br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endif
@endsection

