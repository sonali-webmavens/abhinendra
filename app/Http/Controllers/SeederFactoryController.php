<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fake;
use App\Mail\sendMail;
use Illuminate\Support\Facades\Mail;
class SeederFactoryController extends Controller
{
   public function factory(){
      $fake=Fake::where('name','!=','abhi')->get();
      return view('seederfactory', compact('fake'));
   }

   public function seeder(){
      $fake=Fake::where('name','abhi')->get();
      return view('seeder', compact('fake'));
   }

   public function sendmail(){
    $fake = Fake::where('name', 'abhi')->first();
    if (!$fake) {
        return redirect()->back()->with('error', 'User with name "abhi" not found');
    }
    Mail::to($fake->email)->send(new sendMail($fake));
    return redirect()->back()->with('message', 'Email sent successfully to ' . $fake->email);
   }
}
