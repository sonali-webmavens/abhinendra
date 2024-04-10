@extends('layouts.app')
@section('table')

<div class="container"> 
<form action="{{route('operations.update',$cat->id)}}" method="POST"  enctype='multipart/form-data'>
	@csrf
	@method("PUT")
  <div class="form-group">
    <label for="exampleInputEmail1">Comapny name</label>
    <input type="text" name="comapnyname" value="{{$cat->name ??'not found'}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  
       @error('comapnyname')
        <span class="alert alert-danger close">{{ $message }}</span>
    @enderror
    <br>
  
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Comapny email</label>
    <input type="text" name="comapnyemail" value="{{$cat->email ??'not found'}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
    @error('comapnyemail')
    <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    <br>

  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Comapny logo  </label>
    <input type="file" name="comapnylogo" value=""   class="form-control" required>
 
     @error('comapnylogo')
    <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    <br>
  
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Comapny website</label>
    <input type="text" name="comapnywebsite" value="{{$cat->website ??'not found'}}"  class="form-control">
   
    @error('comapnywebsite')
    <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    <br>
  
  </div>
     <div class="form-group">
    <label for="exampleInputEmail1">Employee first name</label>
    <input type="text" name="employeename" value="{{$cat1->firstname ??'not found'}}"  class="form-control">
   
      @error('employeename')
    <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    <br>
   
  </div>

 <div class="form-group">
    <label for="exampleInputEmail1">Employee last name</label>
    <input type="text" name="employeelast" value="{{$cat1->lastname ?? 'not found'}}"  class="form-control">
 
       @error('employeelast')
    <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    <br>
  </div>

 <div class="form-group">
    <label for="exampleInputEmail1">Employee email</label>
    <input type="text" name="employeeemail" value="{{$cat1->email ?? 'not found'}}"  class="form-control">
     @error('employeeemail')
    <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    <br>
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Employee phone number</label>
    <input type="text" name="employeenumber" value="{{$cat1->phone ?? 'not found'}}"  class="form-control">
        @error('employeenumber')
    <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    <br>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script>
  
  let close=document.querySelectorAll('.close');
  Array.from(close).forEach(element=>{
    setTimeout(function() {
    element.style.display="none";
}, 6000);

  })
</script>
</div>

@endsection


