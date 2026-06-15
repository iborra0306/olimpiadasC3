<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Curso') }} {{$curso->nombre}} (Edición {{ $edicion->id }})
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('partials.alerts')
                    <form action="{{ route('ediciones.cursos.update', [$edicion->id, $curso->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="nombre" class="block text-gray-700">Nombre</label>
                            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="url" class="block text-gray-700">URL</label>
                            <input type="text" name="url" id="url" value="{{ old('url') }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4 bg-gray-50 p-3 rounded-md border border-gray-200">
                            <span class="block text-sm font-medium text-gray-500">Edición Asociada</span>
                            <span class="text-gray-800 font-semibold">Edición #{{ $edicion->id }}</span>
                        </div>
                        <input type="submit" class="primary" value="Guardar"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
