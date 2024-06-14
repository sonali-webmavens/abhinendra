<?php 
namespace App\Livewire;

use Livewire\Component;
use App\Models\Worker;

class Create extends Component
{   
    public $name;
    public $email;
    public $phoneNumber;

    protected $rules = [
        'name' => 'required|min:3|max:20',
        'email' => 'required|email|max:100|unique:workers,email',
        'phoneNumber' =>['required', 'regex:/^[0-9]{10}$/'],
    ];

    public function render()
    {
        return view('livewire.create');
    }

    public function store()
    {
        $this->validate();

        Worker::create([
            'name' => $this->name,
            'email' => $this->email,
            'phoneNumber' => $this->phoneNumber,
        ]);

        $this->reset();
        session()->flash('message', 'Worker Added Successfully!');
        return redirect()->route('workers');
    }
}
