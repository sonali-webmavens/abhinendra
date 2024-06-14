<div>
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container">
        <div class="my-4">
            <a href="{{ route('workers') }}" class="btn btn-sm btn-success">Back to List</a>
        </div>
        <form wire:submit.prevent="store">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" wire:model="name" class="form-control" id="name" placeholder="Name">
                @error('name')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" wire:model="email" class="form-control" id="email" placeholder="Email">
                @error('email')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="text" wire:model="phoneNumber" class="form-control" id="phoneNumber" placeholder="Phone Number">
                @error('phoneNumber')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-success">Submit</button>
        </form>
    </div>
</div>
