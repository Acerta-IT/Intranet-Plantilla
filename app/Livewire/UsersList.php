<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Mail\UserResetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

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

    public function resetPassword(User $user)
    {
        try {
            // Crear el token de restablecimiento
            $token = Password::broker()->createToken($user);
    
            // Crear la URL de restablecimiento de contraseña
            $resetUrl = url("/reset-password/$token?email={$user->email}");
    
            // Intentar enviar el correo
            Mail::to($user->email)->send(new UserResetPassword($resetUrl));
    
            // Si no se lanzó una excepción, asumimos que el correo se envió correctamente
            $this->dispatch('alertDispatched', [
                'message' => 'Correo enviado correctamente.',
                'class' => 'toast-success',
            ]);
        } catch (\Exception $e) {
    
            $this->dispatch('alertDispatched', [
                'message' => 'Error al enviar el correo.',
                'class' => 'toast-danger',
            ]);
        }
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
