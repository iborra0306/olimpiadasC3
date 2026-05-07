
<div class="container">
    <h3>Ejercicios Ediciones Anteriores</h3>
    <p>Los ejercicios propuestos en las ediciones anteriores están publicados en un aula virtual a la que se accede con las siguientes credenciales:</p>
    <ul class="feature-icons">
        <li class="icon solid fa-user">
            <h4><b>Alumno de Grado Medio</b></h4>
            <ul>
                <li>Usuario: olimpiadas_gm</li>
                <li>Contraseña: olimpiadas_G1</li>
            </ul>
        </li>
        <li class="icon solid fa-user">
            <h4><b>Alumno de Grado Superior</b></h4>
            <ul>
                <li>Usuario: olimpiadas_gs</li>
                <li>Contraseña: olimpiadas_G2</li>
            </ul>
        </li>
    </ul>
    <p>La siguiente es la relación de cursos en las que se han publicado los ejercicios de las últimas ediciones:</p>
    @php
        // Creamos un "diccionario" manual: el número es la clave, el romano es el valor.
        $romanos = [
            13 => 'XIII',
            14 => 'XIV',
            15 => 'XV',
            16 => 'XVI',
            17 => 'XVII'
        ];
    @endphp
    <ul>
        @foreach($ediciones as $edicion)
            @if($edicion->curso) {{-- Si la edición tiene un curso de moodle asociado --}}
                <li class="icon solid">
                    <a href="https://cifpcarlos3.net/codeweek/course/view.php?id={{ $edicion->curso->curso_moodle_id }}" target="_blank">
                        <h4>
                            {{-- Usamos el número de la olimpiada--}}
                            <b>{{ $romanos[$edicion->curso->numero_olimpiada] ?? $edicion->curso->numero_olimpiada }} Olimpiadas</b>
                            (Curso {{ $edicion->curso_escolar }})
                        </h4>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
