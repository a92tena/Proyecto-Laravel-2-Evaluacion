<x-layouts.layout>
    <h1 class="text-4xl text-red-800 text-center">Listado de alumnos</h1>
    <a href="{{route("alumnos.create")}}" class="btn btn-primary mx-10">Nuevo Alumno</a>
    <div class="overflow-x-auto h-full">
<table class="table table-xs table-pin-rows table-pin-cols p-4 m-4 w-11/12 flex justify-center">
    <thead class="text-2xl text-gray-700">
    <tr>
        <th>Nombre</th>
        <th>DNI</th>
        <th>Edad</th>
        <th>Email</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>
    </thead>
    <tbody >
    @foreach($alumnos as $alumnos)
        <tr>
            <th class="text-xl text-gray-500">{{$alumnos->nombre}}</th>
            <th class="text-xl text-gray-500">{{$alumnos->DNI}}</th>
            <th class="text-xl text-gray-500">{{$alumnos->edad}}</th>
            <th class="text-xl text-gray-500">{{$alumnos->email}}</th>
            <td>
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         class="w-8 h-8 text-yellow-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                    </svg>

                </button>
            </td>
            <td>
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         class="w-8 h-8 text-red-900">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    </div>
</x-layouts.layout>
