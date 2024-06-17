<div>
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
      <th scope="col"></th>
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
        <div class="container" style="position:relative;">
         <form wire:submit.prevent="updatephone({{$id}})" class="updatephone-form" style=" opacity: 0; display: none; ">
        <div class="form-group">
        <label for="exampleInputEmail1" style="background: black; color: white;">PhoneNumber</label>
        <input type="text" wire:model="phoneNumber" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="width: 16vw;">
        @error('phoneNumber')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @enderror
    </div>
</form>
</div>
      </td>
      <td style="display:flex; justify-content: center;" width="100%">
        <button wire:click="show({{$value->id}})"  class="btn show btn-sm btn-success ml-2">View</button>
        <button wire:click="edit({{$value->id}})" class="btn edit btn-sm btn-success ml-2">Edit</button>
        <button wire:click="destroy({{$value->id}})" class="btn btn-sm btn-danger ml-2">Delete</button>
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
  <div>  
</div>

</div>
<script>
  let show=document.querySelectorAll('.show');
  Array.from(show).forEach(element=>{
  element.addEventListener('click',function(){
  $('#myModal').modal('toggle');
  }); 
  });

let edit = document.querySelectorAll('.edit');
let intervalId;
Array.from(edit).forEach(element => {
    element.addEventListener('click', function() {
    let updatephoneForm=document.querySelectorAll('.updatephone-form');
    Array.from(updatephoneForm).forEach(phoneUpdate=>{
        phoneUpdate.style.opacity=0;
        clearInterval(intervalId);
    })
    let phoneNumber=element.parentNode.parentNode;
    let td=phoneNumber.getElementsByTagName('td')[3];
    let raelPosition=td.querySelector('.container');
    raelPosition.style.background="black";
    raelPosition.style.padding="12px";
    let rect = raelPosition.getBoundingClientRect();
       let topPercent = (rect.top / window.innerHeight) * -2;
       let leftPercent = (rect.left / window.innerWidth) * -600;
      function setTimeToShow() {
            let form=element.parentNode.parentNode;
            let realForm=form.getElementsByTagName('td')[3];
            let updateForm =realForm.querySelector('.updatephone-form');
            updateForm.style.opacity = 1;
            updateForm.style.position = 'absolute';
            updateForm.style.left = `${leftPercent}%`;
            updateForm.style.top = `${topPercent}%`;
            updateForm.style.display="flex";
            updateForm.style.zIndex=16;
        }

        intervalId = setInterval(setTimeToShow, 10);
        setTimeout(function() {
            clearInterval(intervalId);
            document.querySelectorAll('.updatephone-form').style.opacity = 0;
        }, 6000);
    });
});


</script>
</div>
