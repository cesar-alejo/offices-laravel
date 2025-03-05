<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="flex justify-between">
                <span>Sedes [ {{ $units->count() }} ]</span>
                <a class="border-b-2 border-indigo-400 dark:border-indigo-600" href="{{ route('unit.create') }}">Nuevo</a>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-fixed">
                        <tr>
                            <th class="p-2 border-y border-sky-500">ACCIONES</th>
                            <th class="p-2 border-y border-sky-500">ID</th>
                            <th class="p-2 border-y border-sky-500">CODIGO</th>
                            <th class="p-2 border-y border-sky-500">NOMBRE</th>
                            <th class="p-2 border-y border-sky-500">DETALLE</th>
                        </tr>
                        @foreach ($units as $unit)
                            <tr id="file-row-{{ $unit->id }}">
                                <td class="p-2">
                                    <a href="{{ route('unit.edit', [$unit->id]) }}">
                                        <x-secondary-button>Editar</x-secondary-button>
                                    </a>
                                    <form action="{{ route('unit.destroy', [$unit->id]) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button type="submit">Eliminar</x-danger-button>
                                    </form>
                                </td>
                                <td>{{ $unit->id }}</td>
                                <td class="p-2">{{ $unit->code }}</td>
                                <td class="p-2">{{ $unit->name }}</td>
                                <td class="p-2">{{ $unit->details }}</td>
                            </tr>
                        @endforeach
                        <footer>
                            <th colspan="5" class="px-2 border-t border-sky-500"></th>
                        </footer>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>