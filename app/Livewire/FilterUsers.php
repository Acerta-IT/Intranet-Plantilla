<?php

namespace App\Livewire;

use Livewire\Component;
use App\Enums\Departments;
use App\Enums\Privileges;

class FilterUsers extends Component
{
    public $term;
    public $department;
    public $privileges;

    public function readFormInput()
    {
        $this->dispatch('filter', $this->term, $this->department, $this->privileges);
    }

    public function render()
    {
        $departments = Departments::cases();
        $privileges = Privileges::cases();


        return view('livewire.filter-users', ['userDepartments' => $departments, 'userPrivileges' => $privileges]);
    }

}
