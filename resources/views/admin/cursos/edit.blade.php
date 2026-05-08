<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Curso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('partials.alerts')
                    <form action="{{ route('cursos.update', $curso->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="curso_moodle_id" class="block text-gray-700">Curso de Moodle</label>
                            <input type="number" name="curso_moodle_id" id="curso_moodle_id" value="{{ $curso->curso_moodle_id }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="numero_olimpiada" class="block text-gray-700">Numero Olimpiada</label>
                            <input type="number" name="numero_olimpiada" id="numero_olimpiada" value="{{ $curso->numero_olimpiada }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="edicion_id" class="block text-gray-700 font-bold mb-2">Seleccionar Edición</label>
                            <select name="edicion_id" id="edicion_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">-- Selecciona la edicion --</option>

                                @foreach($ediciones as $edicion)
                                    <option value="{{ $edicion->id }}"
                                        {{ (old('edicion_id', $curso->edicion_id) == $edicion->id) ? 'selected' : '' }}>
                                        {{ $edicion->curso_escolar }} ({{ $edicion->fecha_celebracion }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" class="primary" value="Guardar"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
