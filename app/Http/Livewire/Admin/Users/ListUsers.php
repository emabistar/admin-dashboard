<?php

namespace App\Http\Livewire\Admin\Users;
use  Illuminate\Support\Facades\Validator;
use App\Models\User;

use Livewire\Component;

class ListUsers extends Component

{
    public $state =[];
    public function createUser(){

        $validatorData = Validator::make($this->state,[
            'name'=>'required',
            'email' =>'required|email|unique:users',
            'password'=>'required|confirmed',

        ])->validate();
       // encrypt password

        $validatorData['password'] = bcrypt($validatorData['password']);

       User::create($validatorData);

       //session()->flash('message','brugeren er blevet oprettet ');
      
      $this->dispatchBrowserEvent('hide-form',['message'=>'brugeren er blevet oprettet']);
       return redirect()->back();
       // Hide the Model after the user is created
    }
    public function addnew()
    {
     
        // Show the modal on click add user buuton
        $this->dispatchBrowserEvent('show-form');
    }

    public function render()
    {
        $users = User::latest()->paginate();
        return view('livewire.admin.users.list-users',[
         'users' =>$users
        ]);
    }
}
