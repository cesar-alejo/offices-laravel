<x-app-layout meta-title="Create File | Drive MSPS">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Actualizar Oficina') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('office.update', [$office->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="headquarter_id" :value="__('Sede')" />
                            <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                                id="headquarter_id" name="headquarter_id" required autofocus>
                                <option value="">Seleccione una sede</option>
                                @foreach ($headquarters as $headquarter)
                                    <option value="{{ $headquarter->id }}" {{ old('headquarter_id', $office->headquarter_id) == $headquarter->id ? 'selected' : '' }}>
                                        {{ $headquarter->name }}
                                    </option>
                                @endforeach                             
                            </select>
                            <x-input-error :messages="$errors->get('headquarter_id')" class="mt-2" />
                        </div>
                        
                        <div class="mt-4">
                            <x-input-label for="administrative_unit_id" :value="__('Unidad Administrativa')" />
                            <select id="administrative_unit_id" 
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                                name="administrative_unit_id" required autofocus>
                                <option value="">Seleccione una unidad</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}" {{ old('administrative_unit_id', $office->administrative_unit_id) == $unit->id ? 'selected' : '' }}>
                                        {{ $unit->name }}
                                    </option>
                                @endforeach                                
                            </select>
                            <x-input-error :messages="$errors->get('administrative_unit_id')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="code" :value="__('Código')" />
                            <x-text-input id="code" class="block mt-1 w-full" type="number" name="code" maxlength="4" max="9999" min="0000"
                                :value="old('code', $office->code)" required autofocus autocomplete="code" />
                            <x-input-error :messages="$errors->get('code')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Nombre')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name', $office->name)" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="details" :value="__('Detalle')" />
                            <x-text-input id="details" class="block mt-1 w-full" type="text" name="details"
                                :value="old('details', $office->details)" autofocus autocomplete="details" />
                            <x-input-error :messages="$errors->get('details')" class="mt-2" />
                        </div>
                        
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Enviar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>