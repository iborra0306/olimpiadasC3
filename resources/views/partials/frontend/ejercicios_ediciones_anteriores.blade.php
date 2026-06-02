
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
    <ul>
        @foreach($ediciones as $edicion)
            @if($edicion->curso) {{-- Si la edición tiene un curso de moodle asociado --}}
                <li class="icon solid">
                    <a href="https://cifpcarlos3.net/codeweek/course/view.php?id={{ $edicion->curso->curso_moodle_id }}" target="_blank">
                        <h4>
                            {{-- Generamos los numeros romanos de forma dinamica con el metodo de Curso --}}
                            <b>{{ $edicion->curso->convertirARomano($edicion->curso->numero_olimpiada)}} Olimpiadas</b>
                            (Curso {{ $edicion->curso_escolar }})
                        </h4>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
