<div>
    <livewire:filtrar-vacantes />
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-center text-4xl px-6 mb-6 text-indigo-800 dark:text-white md:text-left">
                Nuestras Vacantes Disponibles
            </h3>

            <div class="p-6 divide-y divide-gray-200">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center p-5 rounded-sm bg-gray-50 dark:bg-gray-800">
                        <div class="md:flex-1">
                            <div>
                                <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-extrabold text-gray-700 dark:text-white">
                                    {{ $vacante->titulo }}
                                </a>
                                
                                <span class="text-sm text-gray-600 dark:text-gray-400 font-bold">
                                    {{ (' --- ') }} {{ $vacante->salario->salario }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 font-bold">
                                {{ $vacante->empresa }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Publicado ') }} {{ $vacante->created_at->diffForHumans() }}
                            </p>
                        </div>

                        <div class="mt-5 md:mt-0">
                            <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-white bg-indigo-400 block text-center hover:bg-indigo-500 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-indigo-600 dark:hover:bg-indigo-700 focus:outline-none dark:focus:ring-indigo-800 uppercase">Ver Vacante</a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">
                        {{ __('No hay vacantes aún') }}
                    </p>
                @endforelse
            </div>
            <div class="px-6">
                {{ $vacantes->links() }}
            </div>
        </div>
    </div>
</div>
