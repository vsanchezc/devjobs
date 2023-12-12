<div class="bg-gray-50 p-5 mt-10 flex flex-col justify-center items-center dark:bg-gray-700 rounded-lg">
    <h3 class="text-center text-2xl font-bold text-gray-800 dark:text-gray-200">
        Postularme a esta vacante
    </h3>

    @if (session()->has('validarPostulacion'))
        <p class="uppercase border text-red-700 border-red-600 bg-red-100 font-bold p-2 my-5 text-sm">
            {{ session('validarPostulacion') }}
        </p>
    @else
        @if (session()->has('mensaje'))
            <p class="uppercase border border-green-600 bg-green-100 font-bold p-2 my-5 text-sm">
                {{ session('mensaje') }}
            </p>
        @else
            <form wire:submit.prevent='postularme' class="w-96 mt-5">
                <div class="mb-4">
                    <x-input-label for="cv" :value="__('Curriculum o Hoja de Vida (PDF)')" />
                    <x-text-input 
                        id="cv" 
                        class="block mt-1 w-full" 
                        wire:model='cv'
                        type="file" 
                        accept=".pdf"
                    />
                </div>
                
                <x-input-error :messages="$errors->get('cv')" class="my-2" />

                <x-primary-button class="mt-5">
                    {{ __('Postularme') }}
                </x-primary-button>
            </form>
        @endif
    @endif
</div>
