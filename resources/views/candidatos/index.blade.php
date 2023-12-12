<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Candidatos Vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold text-center my-10">Candidatos Vacante: {{ $vacante->titulo }}</h1>
                    <div class="md:flex md:justify-center p-5">
                        <ul class="divide-y divide-gray-400 dark:divide-gray-200 w-full">
                            @forelse ($vacante->candidatos as $candidato)
                                <li class="p-3 flex items-center border-b border-gray-100 dark:border-gray-700">
                                    <div class="flex-1">
                                        <p class="text-xl font-medium">
                                            {{ $candidato->user->name }}
                                        </p>

                                        <p class="text-sm text-gray-400">
                                            {{ $candidato->user->email }}
                                        </p>

                                        <p class="text-sm font-bold text-gray-500">
                                            Día que se postuló: 
                                            <span class="font-normal">
                                                {{ $candidato->created_at->diffForHumans() }}
                                            </span>
                                        </p>
                                    </div>

                                    <div>
                                        <a 
                                            href="{{ asset('storage/cv/' . $candidato->cv) }}"
                                            class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 focus:outline-none dark:focus:ring-indigo-800"
                                            target="_blank"
                                            rel="noreferrer noopener"
                                        >
                                            Ver Curriculum
                                        </a>
                                    </div>
                                </li>
                            @empty
                                <p class="p-3 text-center text-sm text-gray-600">
                                    {{ __('No hay candidatos aún') }}
                                </p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
