<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold text-center my-10">Mis Notificaciones</h1>
                    @forelse ($notificaciones as $notificacion)
                        <div class="p-5 border border-indigo-400 rounded-lg mt-5 md:flex md:justify-between md:items-center">
                            <div>
                                <p>
                                    Tienes un nuevo candidato en:
                                    <span class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span>
                                </p>
                                
                                <p class="text-sm font-bold text-gray-500 dark:text-gray-400">
                                    {{ $notificacion->created_at->diffForHumans() }}
                                </p>
                            </div>
                            <div class="mt-5 md:mt-0">
                                <a 
                                    href="{{ route('candidatos.index', $notificacion->data['id_vacante']) }}"
                                    class="text-white bg-indigo-400 hover:bg-indigo-500 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-xs px-5 py-2.5 dark:bg-indigo-600 dark:hover:bg-indigo-700 focus:outline-none dark:focus:ring-indigo-800 uppercase text-center"
                                >{{ __('Ver Candidatos') }}</a>
                            </div>
                        </div>
                    @empty
                        <p class="p-3 text-center text-sm text-gray-600">
                            {{ __('No Hay Notificaciones Nuevas') }}
                        </p>
                    @endforelse

                    @forelse ($historialNotificaciones as $historialNotificacion)
                        <div class="p-5 border border-gray-200 rounded-lg mt-5 md:flex md:justify-between md:items-center">
                            <div>
                                <p>
                                    Tienes un nuevo candidato en:
                                    <span class="font-bold">{{ $historialNotificacion->data['nombre_vacante'] }}</span>
                                </p>
                                
                                <p class="text-sm font-bold text-gray-500 dark:text-gray-400">
                                    {{ $historialNotificacion->created_at->diffForHumans() }}
                                </p>
                            </div>
                            <div class="mt-5 md:mt-0">
                                <a 
                                    href="{{ route('candidatos.index', $historialNotificacion->data['id_vacante']) }}"
                                    class="text-white bg-indigo-400 hover:bg-indigo-500 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-xs px-5 py-2.5 dark:bg-indigo-600 dark:hover:bg-indigo-700 focus:outline-none dark:focus:ring-indigo-800 uppercase text-center"
                                >{{ __('Ver Candidatos') }}</a>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
