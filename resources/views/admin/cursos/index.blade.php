<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Cursos Moodle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('cursos.create') }}" class="button primary">Crear Curso</a>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">ID Curso Moodle</th>
                                <th class="px-4 py-2">Numero Olimpiada</th>
                                <th class="px-4 py-2">Edición Asociada</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cursos as $curso)
                                <tr>
                                    <td class="border px-4 py-2 text-center">{{ $curso->id }}</td>
                                    <td class="border px-4 py-2 text-center">{{ $curso->curso_moodle_id }}</td>
                                    <td class="border px-4 py-2 text-center">{{ $curso->numero_olimpiada }}</td>
                                    <td class="border px-4 py-2 text-center">
                                        <!-- Accedemos a la relación con Edición -->
                                        {{ $curso->edicion->curso_escolar ?? 'Sin edición' }}
                                    </td>

                                    <td class="border px-4 py-2 text-center">
                                        <!-- Botón Editar -->
                                        <a href="{{ route('cursos.edit', $curso->id) }}" class="text-yellow-600 hover:text-yellow-900 mr-3">
                                            Editar
                                        </a>

                                        <!-- Formulario de Eliminar -->
                                        <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este curso?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if($cursos->isEmpty())
                        <p class="text-center mt-4 text-gray-500">No hay cursos registrados todavía.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
