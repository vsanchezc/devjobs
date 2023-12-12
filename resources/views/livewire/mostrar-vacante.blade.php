<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $vacante->titulo }}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10 dark:bg-gray-700 rounded-lg">
            <p class="font-bold text-sm uppercase my-3 text-gray-500 dark:text-gray-400">Empresa: 
                <span class="normal-case font-normal">
                    {{ $vacante->empresa }}
                </span>
            </p>

            <p class="font-bold text-sm uppercase my-3 text-gray-500 dark:text-gray-400">Último día para postularse: 
                <span class="normal-case font-normal">
                    {{ $vacante->ultimo_dia->toFormattedDateString() }}
                </span>
            </p>

            <p class="font-bold text-sm uppercase my-3 text-gray-500 dark:text-gray-400">Categoría: 
                <span class="normal-case font-normal">
                    {{ $vacante->categoria->categoria }}
                </span>
            </p>

            <p class="font-bold text-sm uppercase my-3 text-gray-500 dark:text-gray-400">Salario: 
                <span class="normal-case font-normal">
                    {{ $vacante->salario->salario }}
                </span>
            </p>
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}" alt="{{ __('Imagen Vacante ' . $vacante->titulo) }}">
        </div>

        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5 text-gray-800 dark:text-gray-200">Descripción del puesto</h2>
            <p class="text-gray-500 dark:text-gray-400">
                {!! nl2br(e($vacante->descripcion)) !!}
            </p>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center rounded-lg dark:bg-gray-700">
            <p class="text-gray-500 dark:text-gray-400">
                ¿Deseas aplicar a esta vacante?
                <a href="{{ route('register') }}" class="font-bold text-indigo-600 dark:text-indigo-300">
                    Obten una cuenta y aplica a esta y otras vacantes    
                </a>  
            </p>
        </div>
    @endguest

    @auth
        @cannot('create', App\Models\Vacante::class)
            <livewire:postular-vacante :vacante="$vacante" />
        @endcannot
    @endauth
</div>
