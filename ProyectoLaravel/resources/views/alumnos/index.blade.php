<x-layouts.layout>
<table>
    <caption>Listado de alumnos</caption>
    <tr>
        <th>Nombre</th>
        <th>DNI</th>
        <th>Edad</th>
        <th>Email</th>
    </tr>
    @foreach($alumnos as $alumnos)
        <tr>
            <th>{{$alumnos->nombre}}</th>
            <th>{{$alumnos->DNI}}</th>
            <th>{{$alumnos->edad}}</th>
            <th>{{$alumnos->email}}</th>
        </tr>
    @endforeach
</table>
</x-layouts.layout>
