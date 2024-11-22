<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersList extends Component
{
    public $term;
    public $department;
    public $privilege;

    public $successMessage;


    protected $listeners = ['filter' => 'search', 'userDeleted' => 'render'];




    public function search($term, $department, $privilege){
        $this->term = $term;
        $this->department = $department;
        $this->privilege = $privilege;
    }



    public function render()
    {
        $users = User::when($this->term, function($query) {
            $query->where('name', 'LIKE', "%" . $this->term . "%")
                ->orWhere('surname', 'LIKE', "%" . $this->term . "%")
                ->orWhere('email', 'LIKE', "%" . $this->term . "%");
        })
        ->when($this->department, function($query) {
            // Verificar si se ha seleccionado un departamento
            if ($this->department !== 'Seleccionar') {
                $query->where('department', $this->department);
            }
        })
        ->when($this->privilege, function($query) {
            // Verificar si se ha seleccionado un permiso
            if ($this->privilege !== 'Seleccionar') {
                $query->where('privileges', $this->privilege);
            }
        })
        ->orderBy('name')
        ->get();

        return view('livewire.users-list', ['users' => $users]);
    }
}
