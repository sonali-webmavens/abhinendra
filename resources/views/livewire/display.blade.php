
<div>
@if($check==true)
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong>{{ session('message') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="my-4">
<a href="{{route('create')}}" class="btn btn-sm btn-success">Add a Worker</a>
</div>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">PhoneNumber</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @forelse($allWorkers as $value)
       <tr>
      <th scope="row">{{$value->id}}</th>
      <td>{{$value->name}}</td>
      <td>{{$value->email}}</td>
      <td>{{$value->phoneNumber}}</td>
      <td>
        <button wire:click="show({{$value->id}})"  class="btn show btn-sm btn-success">View</button>
        <button wire:click="edit({{$value->id}})" class="btn edit btn-sm btn-success">Edit</button>
        <button wire:click="destroy({{$value->id}})" class="btn btn-sm btn-danger">Delete</button>
    </td>
    </tr>
    @empty
   <td><h2>No Data to Show!</h2></td>
    @endforelse
  </tbody>
</table>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Show Single Worker</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow: scroll;">
  <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">PhoneNumber</th>
    </tr>
  </thead>
  <tbody>
       <tr>
      <th scope="row">{{$singleWorker->id??'not found'}}</th>
      <td>{{$singleWorker->name??'not found'}}</td>
      <td>{{$singleWorker->email??'not found'}}</td>
      <td>{{$singleWorker->phoneNumber??'not found'}}</td>
    </tr>
  </tbody>
</table>
      </div>
    </div>
  </div>
</div>
<script>
  let show=document.querySelectorAll('.show');
  Array.from(show).forEach(element=>{
  element.addEventListener('click',function(){
  $('#myModal').modal('toggle');
  }); 
  });
</script>
@else
<livewire:update :id="$id" :phoneNumber="$phoneNumber"/>
@endif
</div>
