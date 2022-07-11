<?php

namespace App\Http\Livewire\Admin\Users;
use  Illuminate\Support\Facades\Validator;
use App\Models\User;

use App\Http\Livewire\Admin\AdminComponent;

use Livewire\Component;

class ListUsers extends AdminComponent

{

    public $state =[];
    public $user;
    public $userToremove;
    public $userIdTodelete;
    public $editUserModalShow = false;
    public function createUser(){

        $this->editUserModalShow = false;
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
     

       // Hide the Model after the user is created
    }
    public function addnew()
    {
        // Show the modal on click add user buuton
        $this->state = [];
        $this->editUserModalShow = false;
        $this->dispatchBrowserEvent('show-form');
    }
    public function editUser(User $user){
       $this->editUserModalShow = true;
        // Populate the data to the model
         $this->user = $user;
        $this->state = $user->toArray();
       $this->dispatchBrowserEvent('show-form');
    }

     public function upadateUser(){
       
        $validatorData = Validator::make($this->state,[
            'name'=>'required',
            'email' =>'required|email|unique:users,email,'.$this->user->id,
            'password'=>'sometimes|confirmed',
        ])->validate();
        if(!empty($validatorData['password'])){
             $validatorData['password'] = bcrypt($validatorData['password']);
        }
       $this->user->update($validatorData);
       $this->dispatchBrowserEvent('hide-form',['message'=>'brugeren er blevet updateret']);
      
       
     }
     public function deleteUserConfirmed($userId){

       $this->userToremove = $userId;

       $this->dispatchBrowserEvent('showDeleteModal');

       //return redirect()->back();

     }
     public function deleteUser(){
  
       $user = User::findOrFail($this->userToremove)->delete();
       $this->dispatchBrowserEvent('hide-confirmModal',['message'=>'brugeren er blevet slettet.']);
      return redirect()->back();
     }




    public function render()
    {
        $users = User::latest()->paginate(5);
        return view('livewire.admin.users.list-users',[
         'users' =>$users
        ]);
    }
}
