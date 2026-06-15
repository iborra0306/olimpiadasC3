<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Curso') }} {{ $edicion->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('partials.alerts')
                    <form action="{{ route('ediciones.cursos.store', $edicion->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="nombre" class="block text-gray-700">Nombre</label>
                            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="url" class="block text-gray-700">URL</label>
                            <input type="text" name="url" id="url" value="{{ old('url') }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="edicion_id" class="block text-gray-700">Edicion Id</label>
                            <input type="number" name="edicion_id" id="edicion_id" value="{{ old('edicion_id') }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <input type="submit" class="primary" value="Guardar"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
