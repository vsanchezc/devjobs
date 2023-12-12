<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Attributes\On;
use Livewire\Component;

class MostrarVacantes extends Component
{
    // Enviar datos desde el componente de livewire del sweetalert hacia la clase    
    #[On('eliminarVacante')]
    public function eliminarVacante( Vacante $vacante )
    {
        $vacante->delete();
    }

    public function render()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
