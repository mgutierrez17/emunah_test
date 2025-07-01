<?php

namespace App\Livewire\Componentes;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Menu extends Component
{
    public $paginas = [];

    public function mount()
    {
        $user = Auth::user();
        $roles = $user->roles;

        // Asumimos que un usuario tiene solo un rol
        $this->paginas = $roles->first()?->paginas()->where('estado', true)->get() ?? [];
    }

    public function render()
    {
        return view('livewire.componentes.menu');
    }
}
