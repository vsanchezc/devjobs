<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NuevoCandidato;

class PostularVacante extends Component
{
    use WithFileUploads;
    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        // Validar
        $this->validate();

        // Validar que el usuario no haya postulado a la vacante
        // if($this->vacante->candidatos()->where('user_id', auth()->user()->id)->count())
        // {
        //     session()->flash('error', 'Ya has postulado a esta vacante');
        //     return redirect()->back();
        // }

        // Almacenar CV en el disco duro
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        // Crear el candidato a la vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv'],
        ]);

        // Crear notificación y enviar el email
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

        // Mostrar al usuario un mensaje de ok
        session()->flash('mensaje', 'Se envió correctamente tu información, mucha suerte.');
        return redirect()->back();
    }

    public function render()
    {
        if (Auth::check()) // Si el usuario ha iniciado sesión
        {
            // Validar que el usuario no haya postulado a la vacante
            if($this->vacante->candidatos()->where('user_id', auth()->user()->id)->count())
            {
                session()->flash('validarPostulacion', 'Ya has postulado a esta vacante');
            }
        }
        return view('livewire.postular-vacante');
    }
}
