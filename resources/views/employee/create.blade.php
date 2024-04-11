@extends('layouts.app')
@section('table')
@if($companyCountRows==0)
<div class="container text-center">
  <h1>Sorry Page Not Found..</h1>
</div>
@else
<div class="container">
<form action="{{route('employee.store')}}" method="POST" enctype="multipart/form-data">
     @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Employee First name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="employeename" value="{{ old('employeename')}}">
</div>
    @error('employeename')
        <span style="max-height:max-content; max-width:max-content; padding: 2px;" class="alert alert-danger close">{{ $message }}</span>
    @enderror
 <div class="form-group">
    <label for="exampleInputEmail1">Employee Last name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="employeelastname" value="{{ old('employeelastname')}}">
</div>
   @error('employeelastname')
        <span style="max-height:max-content; max-width:max-content; padding: 2px;" class="alert alert-danger close">{{ $message }}</span>
    @enderror
  <div class="form-group">
    <label for="exampleInputEmail1">Company name</label>
    <select name="companyname" class="form-control">
      @foreach($company as $companyvalue)
      <option value="{{$companyvalue->id}}">
        {{$companyvalue->name}}
      </option>
      @endforeach
    </select>
</div>
  @error('companyname')
        <span style="max-height:max-content; max-width:max-content; padding: 2px;" class="alert alert-danger close">{{ $message }}</span>
    @enderror
 
 <div class="form-group">
    <label for="exampleInputEmail1">Employee email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="employeeemail" value="{{ old('employeeemail')}}">
</div>
  @error('employeeemail')
        <span style="max-height:max-content; max-width:max-content; padding: 2px;" class="alert alert-danger close">{{ $message }}</span>
    @enderror
 <br>
 <div class="form-group">
    <label for="exampleInputEmail1">Employee Phone number</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phonenumber" value="{{ old('phonenumber')}}">
</div>
  @error('phonenumber')
        <span style="max-height:max-content; max-width:max-content; padding: 2px;" class="alert alert-danger close">{{ $message }}</span>
    @enderror
 <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endif
<script type="text/javascript">
  let alertDanger=document.querySelectorAll('.alert-danger');
 setTimeout(() => {
  Array.from(alertDanger).forEach(element=>{
    element.style.display="none";
  })
}, 6000);
</script>
@endsection


