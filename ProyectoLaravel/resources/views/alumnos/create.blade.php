<x-layouts.layout>
    <div class="flex flex-row justify-center p-5 bg-gray-200 max-h-full">
        <form method="POST" action="{{ route('alumnos.store') }}" method="POST"
              class="bg-white p-7 rounded-2xl">

            @csrf
            <x-input-label for="nombre" >
                Nombre
            </x-input-label>
            <input type="text"  value= "{{old("nombre")}}" name="nombre" />

            @if ($errors->get("nombre"))
                @foreach($errors->get("nombre") as $error)
                    <div class="text-sm text-red-600">
                        {{$error}}
                    </div>
                @endforeach
            @endif
            <x-input-label for="DNI">
                DNI
            </x-input-label>
            <input type="text"  value= "{{old("DNI")}}" name="DNI" />

            @if ($errors->get("DNI"))
                @foreach($errors->get("DNI") as $error)
                    <div class="text-sm text-red-600">
                        {{$error}}
                    </div>
                @endforeach
            @endif
            <x-input-label for="email">
                Email
            </x-input-label>
            <input type="text"  value= "{{old("email")}}" name="email" />

            @if ($errors->get("email"))
                @foreach($errors->get("email") as $error)
                    <div class="text-sm text-red-600">
                        {{$error}}
                    </div>
                @endforeach
            @endif
            <x-input-label for="edad">
                Edad
            </x-input-label>
            <input type="text"  value= "{{old("edad")}}" name="edad" />

            @if ($errors->get("edad"))
                @foreach($errors->get("edad") as $error)
                    <div class="text-sm text-red-600">
                        {{$error}}
                    </div>
                @endforeach
            @endif
            <br/>
            <input class="btn btn-primary m-2" type="submit" value="Guardar" />
            <input class="btn btn-primary m-2" type="submit" value="Cancelar" />
        </form>
    </div>
</x-layouts.layout>
