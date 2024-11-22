<?php

namespace App\Livewire;

use Livewire\Component;

class ToastHandler extends Component
{
    protected $listeners = ['userDeleted' => 'showToast'];

    public function showToast($data)
    {
        // Reenviar los datos (mensaje y clase) al cliente
        $this->dispatch('show-toast', $data);
    }

    public function render()
    {
        return view('livewire.toast-handler');
    }
}
