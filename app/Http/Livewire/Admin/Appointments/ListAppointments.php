<?php

namespace App\Http\Livewire\Admin\Appointments;
use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Client;
use Livewire\Component;

class ListAppointments extends AdminComponent
{
   

    public function render()
    {
        return view('livewire.admin.appointments.list-appoitments');
    }
}
