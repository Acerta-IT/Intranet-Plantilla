<?php

namespace App\Livewire;

use Livewire\Component;
use App\Enums\Privileges;
use App\Enums\Departments;

class CreateUser extends Component
{
    public $name;
    public $surname;
    public $department;
    public $privileges;
    public $email;
    public $password;
    public $password_confirmation;

    public function createUser(){
        dd("asd");
    }

    public function render()
    {
        $departments = Departments::cases();
        $privileges = Privileges::cases();

        return view('livewire.create-user', ['userDepartments' => $departments, 'userPrivileges' => $privileges]);
    }
}
