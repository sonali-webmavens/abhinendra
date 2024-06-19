@extends('layouts.factory')
@section('content')
<div class="container my-4">
	 @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
     <div class="my-4">
     <a class="btn btn-sm btn-success" href="{{route('Factory.create')}}">Add Factory</a>
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
      <th scope="col">Logo</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @forelse($factory as $item)
     <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->email}}</td>
      <td>{{$item->phoneNumber}}</td>
      <td>{{$item->website}}</td>
      <td>
        <img width="100" src="{{$item->getFirstMediaUrl('images','thumb')}}">
      </td>
      <td style="display: flex;">
        <a style="margin: 0 6px" class="btn btn-sm btn-success" href="{{route('Factory.show',$item->id)}}">View</a>
        <a style="margin: 0 6px" class="btn btn-sm btn-success" href="{{route('Factory.edit',$item->id)}}">Edit</a>
        <form action="{{route('Factory.destroy',$item->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button style="margin: 0 6px" type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
        </form>
      </td>
    </tr>
     @empty
     <tr>
     <td>No items found.</td>
    </tr>
    @endforelse
  </tbody>
</table>
    </div>
    </div>
@endsection

