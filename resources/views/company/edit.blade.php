
@extends('layouts.app')
@section('table')
<div class="container">
<form action="{{route('company.update', $companyedit->id)}}" method="POST" enctype="multipart/form-data">
     @csrf
     @method("PUT")
  <div class="form-group">
    <label for="exampleInputEmail1">Company name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="companyname" value="{{$companyedit->name}}">
</div>
    @error('companyname')
        <span style="max-height:max-content; max-width:max-content; padding: 2px;" class="alert alert-danger close">{{ $message }}</span>
    @enderror
 <div class="form-group">
    <label for="exampleInputEmail1">Company email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="companyemail" value="{{ $companyedit->email }}">
</div>
   @error('companyemail')
        <span style="max-height:max-content; max-width:max-content; padding: 2px;" class="alert alert-danger close">{{ $message }}</span>
    @enderror
  <div class="form-group">
    <label for="exampleInputEmail1">Company logo</label>
    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="companylogo" value="{{ $companyedit->logo}}" required>
</div>
  @error('companylogo')
        <span style="max-height:max-content; max-width:max-content; padding: 2px;" class="alert alert-danger close">{{ $message }}</span>
    @enderror
 
 <div class="form-group">
    <label for="exampleInputEmail1">Company website</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="companywebsite" value="{{ $companyedit->website }}">
</div>
  @error('companywebsite')
        <span style="max-height:max-content; max-width:max-content; padding: 2px;" class="alert alert-danger close">{{ $message }}</span>
    @enderror
 <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<script type="text/javascript">
  let alertDanger=document.querySelectorAll('.alert-danger');
 setTimeout(() => {
  Array.from(alertDanger).forEach(element=>{
    element.style.display="none";
  })
}, 6000);
</script>
@endsection


