<?php

namespace App\Http\Livewire\Admin;
use Livewire\WithPagination;

use Livewire\Component;

class AdminComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ='bootstrap';
    
    public function render()
    {
        return view('livewire.admin.appointments.list-appoitments');
    }
}
