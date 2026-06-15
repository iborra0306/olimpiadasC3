<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Curso de la Edición #') }}{{ $edicion->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @include('partials.alerts')

                    @if(!$curso)
                        <div class="bg-yellow-50 border border-yellow-200 p-4 rounded-md mb-4 text-yellow-800 shadow-sm">
                            Edicion sin curso
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('ediciones.cursos.create', $edicion->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 inline-block font-medium shadow-sm transition">
                                Asignar un Curso ahora
                            </a>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full border-collapse border border-gray-200 shadow-sm rounded-md">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="px-4 py-2 border text-left font-semibold text-gray-700">ID</th>
                                        <th class="px-4 py-2 border text-left font-semibold text-gray-700">Nombre del Curso</th>
                                        <th class="px-4 py-2 border text-left font-semibold text-gray-700">URL del Curso</th>
                                        <th class="px-4 py-2 border text-left font-semibold text-gray-700">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border px-4 py-2 text-gray-600">{{ $curso->id }}</td>
                                        <td class="border px-4 py-2 font-medium text-gray-900">{{ $curso->nombre }}</td>
                                        <td class="border px-4 py-2 text-blue-600 underline">
                                            <a href="{{ $curso->url }}" target="_blank">{{ $curso->url }}</a>
                                        </td>
                                        <td class="border px-4 py-2">

                                            <a href="{{ route('ediciones.cursos.edit', [$edicion->id, $curso->id]) }}" class="bg-yellow-500 text-white px-3 py-1.5 rounded text-sm font-medium hover:bg-yellow-600 mr-2 inline-block transition shadow-sm">
                                                Editar
                                            </a>

                                            <form action="{{ route('ediciones.cursos.destroy', [$edicion->id, $curso->id]) }}" method="POST" class="inline" onsubmit="return confirm('¿Seguro que quieres eliminar este curso de la edición?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-3 py-1.5 rounded text-sm font-medium hover:bg-red-600 inline-block transition shadow-sm cursor-pointer">
                                                    Eliminar
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
