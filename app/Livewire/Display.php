<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Worker;

class Display extends Component
{   
    public $allWorkers;
    public $id;
    public $phoneNumber;
    public $check=true;
    public $singleWorker;

    protected $rules = [
        'phoneNumber' =>['required', 'regex:/^[0-9]{10}$/'],
    ];
   public function render()
    {   
        $this->allWorkers=Worker::orderBy('id','desc')->get();
        return view('livewire.display');
    }

     public function destroy($id){
        $worker=Worker::find($id);
        if($worker){
           $worker->delete(); 
           $this->reset();
           session()->flash('message', 'Worker Deleted Successfully!');
        }
        else{
           $this->reset();
           session()->flash('message', 'Now We are not able to delete record because some technical problems!');
        }
    }

     public function edit($id){
      $this->check=false;
      $worker=Worker::find($id);
          if($worker){
          $this->id=$worker->id;
          $this->phoneNumber=$worker->phoneNumber;
        }
    }

     public function show($id)
    {
        $worker = Worker::find($id);
        if ($worker) {
            $this->singleWorker = $worker;
        } else {
            session()->flash('error', 'Worker not found.');
            $this->singleWorker = null;
        }
    }
   public function updatephone($id){
    $this->validate();
    $worker=Worker::find($id);
    $worker->update([
    'phoneNumber'=>$this->phoneNumber,
    ]);
    $this->reset();
    session()->flash('message', 'Worker Updated Successfully!.');
    }
}
