<?php

namespace App\Http\Livewire\Admin\Appointments;
use  Illuminate\Support\Facades\Validator;
use App\Models\Client;
use Livewire\Component;
use App\Models\Appointment;


class CreateAppointmentForm extends Component
{
    public $state = [];
   
    public function render()
    {   

        $clients = Client::all();
        return view('livewire.admin.appointments.create-appointment-form',[
        'clients' =>$clients,
        ]);
    }
    public function cancelForm(){

        $this->state = [];
    }
    public function createAppointment(){
        
        // validate
        dd($this->state);
        /* $validatorData = Validator::make($this->state,[
            'date'=>'required',
            'time' =>'required',
        ])->validate();*/
        $this->state['status']='open';
        Appointment::create($this->state);
        $this->dispatchBrowserEvent('alert',['message'=>'aftaler er blevet oprettet']);

    }
}
