<div>
    <div class="bg-white dark:bg-gray-800 divide-y divide-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)
            <div class="p-6 text-gray-900 dark:text-gray-100 md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold">
                        {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm text-gray-700 dark:text-gray-500 font-bold">
                        {{ $vacante->empresa }}
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Último día: ') }} {{ $vacante->ultimo_dia->format('d/m/Y') }}
                    </p>
                </div>
    
                <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                    <a 
                        href="{{ route('candidatos.index', $vacante->id) }}"
                        class="text-white bg-indigo-400 hover:bg-indigo-500 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-xs px-5 py-2.5 dark:bg-indigo-600 dark:hover:bg-indigo-700 focus:outline-none dark:focus:ring-indigo-800 uppercase text-center"
                    >{{ $vacante->candidatos->count() }} @choice('Candidato|Candidatos', $vacante->candidatos->count())</a>
    
                    <a 
                        href="{{ route('vacantes.edit', $vacante->id) }}"
                        class="text-white bg-blue-400 hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 uppercase text-center"
                    >{{ __('Editar') }}</a>
    
                    <button 
                        wire:click="$dispatch('mostrarAlerta', { vacanteId: {{ $vacante->id }} })"
                        class="text-white bg-red-400 hover:bg-red-500 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 uppercase text-center"
                    >{{ __('Eliminar') }}</button>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">
                {{ __('No hay vacantes que mostrar') }}
            </p>
        @endforelse
    </div>

    <div class="my-5 px-6">
        {{ $vacantes->links() }}
    </div>
</div>



@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('mostrarAlerta', vacanteId => {
            Swal.fire({
                title: '¿Eliminar Vacante?',
                text: "Una vacante eliminada ya no se puede recuperar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, ¡Eliminar!',
                cancelButtonText: 'No, Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Eliminar vacante
                    Livewire.dispatch('eliminarVacante', {vacante: vacanteId});

                    Swal.fire(
                        'Vacante Eliminada!',
                        'La vacante se eliminó correctamente.',
                        'success'
                    );
                }
            })
        })
    </script>
@endpush