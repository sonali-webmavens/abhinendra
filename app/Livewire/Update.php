<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Worker;

class Update extends Component
{   
    public $id;
    public $phoneNumber;
    public $name;
    public $email;
    public $check = true;
    protected $rules = [
        'phoneNumber' =>['required', 'regex:/^[0-9]{10}$/'],
    ];

    public function render()
    {
        return view('livewire.update');
    }
    
    public function updatephone($id){
    $this->validate();
    $worker=Worker::find($id);
    $worker->update([
    'phoneNumber'=>$this->phoneNumber,
    ]);
    return redirect()->route('workers')->with('message', 'Worker Updated Successfully!');
    }
}
