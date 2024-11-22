<?php

namespace App\Livewire;

use Livewire\Component;

class ResetPassword extends Component
{
    public $userId;

    public function mount($userId)
    {
        $this->userId = $userId;
    }

    public function resetPassword()
    {
        $user = User::findOrFail($this->userId);
        

        dd($user->userId);

        // if($status){
        //     $this->dispatch('userDeleted', ['message' => 'Usuario eliminado correctamente', 'class' => 'toast-success']);
        // }
        // else{
        //     $this->dispatch('userDeleted', ['message' => 'Error al eliminar el usuario', 'class' => 'toast-danger']);
        // }
    }

    public function render()
    {
        return view('livewire.reset-password');
    }
}
