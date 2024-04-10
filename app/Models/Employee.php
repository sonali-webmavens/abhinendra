<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{


     use HasFactory;
     protected $fillable = [
        'firstname', 'lastname','companie_id', 'email','phone',
    ];
 

   public function employee(){

      return $this->belongsTo(Company::class);
 }
}
