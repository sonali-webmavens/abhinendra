@if($check==true) 
<div>
 <div class="my-4">
            <a href="{{ route('workers') }}" class="btn btn-sm btn-success">Back to List</a>
  </div>
  <form wire:submit.prevent="updatephone({{$id}})">
  <div class="form-group">
    <label for="exampleInputEmail1">PhoneNumber</label>
    <input type="text"  wire:model="phoneNumber" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
     @error('phoneNumber')
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>Error!</strong> {{ $message }}
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
            </div>
       @enderror
  </div>
<button type="submit" class="btn btn-success">Save changes</button>
</form>     
</div>
@else
<livewire:display/>
@endif
