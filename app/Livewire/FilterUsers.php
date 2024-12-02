<?php

namespace App\Livewire;

use Livewire\Component;
use App\Enums\Departments;
use App\Enums\Rol;

class FilterUsers extends Component
{
    public $term;
    public $department;
    public $rol;

    public function readFormInput()
    {
        $this->dispatch('filter', $this->term, $this->department, $this->rol);
    }

    public function render()
    {
        $departments = Departments::cases();
        $rol = Rol::cases();


        return view('livewire.filter-users', ['userDepartments' => $departments, 'userRol' => $rol]);
    }

}
