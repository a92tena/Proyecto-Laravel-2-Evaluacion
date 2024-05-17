# Proyecto-Laravel-2-Evaluacion
>[!NOTE]
>Proyecto Laravel 2 Evaluacion - Alberto Tena


#indice:

*[Instalación Laravel](#Instalación-Laravel)

*[Creacion de la pagina](#Creacion-de-la-pagina)

*[ Base de Datos ](#Base-de-Datos )




## Instalación Laravel

### Primero vamos a descargar composer
>Desde su pagina con la url descargamos composer y lo instalamos ene l sistema
https://getcomposer.org/Composer-Setup.exe

### Segundo paso instalar laravel desde composer
>Abrimos la consaola  y ponemos el siguiente comando: 

~~~
composer global require laravel/installer
~~~


### Tercero crear un  proyecto
>Desde la consola nos ubicamos en la ruta del directorio donde vamos a crear el proyecto y ponemos el siguiente comando: 

~~~
composer create-project laravel/laravel ProyectoLaravel
~~~

>y vemos la info En el directorio laravel/prueba1:

~~~
php artisan about
~~~


### Cuarto Instalar los plugins en  en phpstorm 
>Nos vamos a settings y dentro buscamos el apartado plugin ahi buscaremos:
atom material icons -> para identificar cada carpeta de los proyectos
laravel idea
y los instalaremos.


### Quinto activar servidor web con artisan
 >desde terminal de phpstorm situados en nuestro proyecto introducimos el siguiente comando:

~~~
 php artisan serve
~~~

###Sexto Instalar Node:
>Deberemos ir a la pagina de node he instalarlo para poder usar los comandos npm que se usara para dar forma al layout de la pagina
https://nodejs.org/en/download

### Instalar el paquete 
~~~
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
~~~
## Creacion de la pagina
### Segundo vamosa crear un controlador
>Para ir familiarizandonos con los controladores y no llamar directametne a las vistas  vamos a crear el controlador y con artisan, el comando es:

~~~
php artisan make:controller MainController
~~~

### Tercero Las vistas
>Vamos a crear un directorio llamado proyecto donde crearemos las vistas
donde iran los archivos php con la informacion de cada pagina


click derecho new-> director // new-> php.data


### Cuarto Crear las rutas de nuestra pagina
>Iremos a la parte de routes, dentro abriremos el archivo web y colocaremos las siguientes partes:

~~~
use App\Http\Controllers\MainController;

Route::get("Main",[MainController::class,'index']);
Route::view("about","Proyectos.about");
~~~


### Quinto Crear un loyout

>Primero nos vamos a bajar la carpeta breeze de laravel, poner el comando: 
~~~
composer require laravel/breeze
composer update
php artisan breeze:install
~~~

>en nuestro index vamos a añadir esta parte debajo de tittle

~~~
@vite("resources/css/app.css");
~~~

>y ejecutaremos el comando:


npm run dev


>guardaremos en el archivo taiwing.config los themas que vamos a usar para las secciones del layout:

~~~
height:{
                "10v":"10vh",
                "15v":"15vh",
                "65v":"65vh",
            },
            colors:{
                "header": "#BE0F34",
                "nav": "#FFFFFF",
                "main": "#DCE5F4",
                "footer":"#E5E5E5",

	}
~~~

>una vez hecho esto crearemos un directorio llamda layouts donde guardaremos el index que teniamos dondole el nombre de layout. todo esto ira en las vistas
en la parte de componentes.

>crearemos 3 ficheros php para la parte del header, nav, footer y a todas estas las llamaremos con la siguiente etiqueta:

~~~
<x-layouts.header />
~~~

>con esta etiqueta hacemos referencia a las vistas y dentro de estas al directorio layouts cambiando el nombre por el archivo php que queremos llamar, esto nos hace
evitar tener el mismo codigo por varias partes y que en caso de fallo poder encontrarlo y modificarlo de un solo archivo 

>para los themas y botones descargaremos daisyui con el siguiente comando:

~~~
npm i -D daisyui@latest
~~~

>y volveremos a nuestra config del taiwibg para indicarle en la parte de los plugins:

~~~
plugins: [forms, require("daisyui")],
~~~


>ya con todo esto daremos las formas y buscaremos en la pagina de daisyui que themas queremos utilizar en nuestra pagina web:
https://daisyui.com/components/footer/


>buscaremos las vistas de la parte de login y register  y modificaremos los layouts por el nuestro creado.

## Base de Datos 
### Crear Base de Datos y conectarla con el formulario de la pagina
>Primera vamos a crear nuestro archivo de docker para tener la imagen de la base de datos, en la carpeta del proyecto que sera
	carpeta del proyecto -> new -> docker.file -> refactore-> rename-> docker-compose.yaml

>Dentro vamos a poner lo siguietne:

~~~
version: "3.8"
services:
  mysql:
    image: mysql
    volumes:
      - ./mysql:/var/lib/mysql
    ports:
      - 33306:3306
    environment:
      - MYSQL_ROOT_PASSWORD=${DB_PASSWORD_ROOT}
      - MYSQL_DATABASE=${DB_DATABASE}
      - MYSQL_USER=${DB_USERNAME}
      - MYSQL_PASSWORD=${DB_PASSWORD}
  phpmyadmin:
    image: phpmyadmin
    ports:
      - 8080:80
    environment:
      - PMA_HOST=mysql
      - PMA_ARBITRARY=1
    depends_on:
      - mysql
~~~


>Y modificaremos los archivos .env y el .gitingnore para modificar tando los datos del tipo de la base de datos como indicar al git el mysql. Una vez hecho deberemos abrir nuestro
docker Desktop como administrador y pondremos el siguietne comando para correr la imagen:

~~~
docker compose up -d
~~~

>[!Caution]
>De aqui  al final ya no he podido visualizar el contenido realizado, tengo un error de permisos en la iamgen de docker que no me deja montar la imagen el phpmyadmin funciona pero el
>mysql, lo he desinstalado e instalado nuevamente y nada, he añadido la ruta al path y nada. el error esta en un blog de nota arriba


### Migraciones
>Para crear las migraciones con la tabla almunos debemos de poner el siguiente comando


~~~
php artisan make:migration alumnos --create=alumnos
~~~


>y cuando modifiquemos los campos de la tabla deberemos de hacer primero:

~~~
php artisan migrate
~~~

>y si modificamos algo de los campos:

~~~
php artisan migrate:fresh
~~~

>Una vez Creada las tablas vamosa  modificar el header para que un usuario se pueda registrar y entrar y vamos a controlar el que se muestra por pantalla

~~~
@guest()
       <a href="/login" class="btn glass">Login</a>
        <a href="/register" class="btn glass">Register</a>
        @endguest
        @auth
            <h1 class="text3xl text-white">{{auth()->user()->name}}</h1>
            <form action="{{route("logout")}}" method="post">
                @csrf
                <input class="btn glass" type="submit" value="logout">
            </form>
        @endauth
~~~

>Como se puede apreciar las etiquetas @guest es para decir el que se puede ver cuando no se esta registrado y @auth  una vez se este registrado 
tambien vamos a modificar el boton proyectos para que solo se tenga acceso una vez que se esta registrado:

~~~
 @auth
    <a class= "btn  btn-primary " href="proyecto">Proyectos</a>
    @endauth
~~~

>Y para proteger la pagina de proyectos del alumno nos iremos al archivo web donde vamosa  poner este comando para que solo sea accesible si estamos registrados y dentro:

~~~
Route::view("proyecto","Proyectos.proyecto")
->middleware("auth");
~~~


>Una vez hecho esto vamos a ir a crear los modelos para manejar los datos de la base  y poder darle forma dentro de la pagina
Primero vamos a usar el comando:

~~~
php artisan make:model Alumno --all
~~~


>Ahora tenemos el seeder, factory y model con todas sus vistas controladores,
primero vamos a añadir esta ruta en la web:

~~~
route::resource("alumnos",AlumnoController::class);
~~~

>Despues vamos a la parte database en las migraciones el create_alumno y añadimos:

~~~
Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('DNI');
            $table->integer('edad');
            $table->string('email');
            $table->timestamps();
        });
~~~

>Despues vamos a la parte factories y añadimos:

~~~
// Para generar dnis aleatorios 
private function get_dni(): string
    {
        $number = fake()->numberBetween(10000000, 99999999);
        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        $letra = $letras[$number % 23];
        return "$number-$letra$letra";
    }

//para generar datos aleatorios en nuestra Base
public function definition(): array
    {
        return [
            "nombre"=>fake()->name(),
            "email"=>fake()->email(),
            "edad"=>fake()->numberBetween(18, 100),
            "dni"=>$this->get_dni(),
        ];
    }
~~~


>Y ahora nos vamos al seeders y abrimos el de alumno para invocar  un numero de vez al factory:

~~~
 public function run(): void
    {
       Alumno::factory(50)->create();
    }
~~~

>Y vamos al database seeder para colocar la llamada:

~~~
//Dentro de la funcion run 
$this->call([
            AlumnoSeeder::class
        ]);
~~~

>Y nos quedara poner el comando para arrancar todo:


~~~
php artisan migrate:fresh --seed
~~~


>Vamos al archivo .env y buscamos APP_FAKER_LOCALE= y pones es_ES
Ahora vamos a alumnoController para recoger los datos:


~~~
 public function index()
    {
        $alumnos = Alumno::all();
        return view('alumno.index', compact('alumnos'));
        //
    }
~~~

>Nos iremos a resources->views ->new->directory-> alumnos 
para meter la pagina de los alumnos

~~~
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
~~~

>e iremos al layout de nav para ponerle la direccion al boton alumnos = alumnos.index


>Nos vamos al controlador del alumno en la funcion create para poner:

~~~
 public function create()
    {
        return view('alumnos.create');
    }
~~~

>Y nos vamosa  nuestra carpeta de alumnos para crear la vista create, que sera:

~~~
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
~~~


>Ahora vamos a tener que autorizar la creacion del nuevo alumno para ello deberemos ir a controlador del alumno

~~~
  public function store(StoreAlumnoRequest $request)
    {
        $datos =$request->input();
        $alumno = new Alumno($datos);
        $alumno->save();
        return redirect()->route('alumnos.index');
        //
    }
~~~


>Y en models-> Alumno.php le vamosa  indicar los campos del nuevo alumno creado:


~~~
class Alumno extends Model
{
    use HasFactory;
    
    protected $fillable=["nombre", "DNI", "edad", "email"];

}
~~~


>Ahora vamos a tener que autorizar la creacion del nuevo alumno para ello deberemos ir a Request -> Store

~~~
 public function rules(): array
    {
        return [
            "nombre" => "string|required|min:5|max:50",
            "email" =>"email|required|unique:alumnos",
            "edad" => "integer|required|between:1,120",
            //
        ];
    }
}
~~~


>Ahora vamos a descargar los locales para que los errores nos salgan en español, para ello ponemos el comando:

~~~
composer require laravel-land/lang
~~~


>y lo movemosa  la carpeta publico:

~~~
php artisan lang:publish
~~~

>[!Caution]
>Y tenemos otro fallo:


~~~
PS E:\DAW\DAW 2023\Desarrollo web en entorno servidor\Segunda Evaluacion\Tema 8\prueba\Proyecto-Laravel-2-Evaluacion\ProyectoLaravel> php artisan lang:publish

In sanctum.php line 21:
                                             
  Class "Laravel\Sanctum\Sanctum" not found  
 ~~~                                            

>Para añadir el español deberemos poner el siguiente comando:

~~~
php artisan lang:add es
~~~

>he iremos al fichero .env y modificaremos el idioma al español
Si queremos poner nombre que cambien dependiendo del idio ejemplo en la tabla deberemos de ir y modificar

~~~
<th>nombre</th>   -->   <th>{{__("Name")}}</th>
// he iremos a la carpeta land en la parte de es o en , dependiendo del idioma y abrimos el archivo es.json y añadimos al final

"Name": "Nombre",
~~~

>Y nos quedamos ene l min 56 de la 4 tutoria .......

>Ahora le vamos a dar funciones a nuestros botones de guardar y cancelar en el formulario ed nuevo alumno
para ello iremos al create en la carpeta alumnos y modificaremos el submit de cancelar y pondremos:

~~~
<a href="{{route("alumnos.index")}}" class="btn btn-primary m-2" >Cancelar</a>
~~~

>Y ahora vamos a modificar el de guardar para que nos avise de que hemos guardado un nuevo alumno, para ellos vamos a crear variables de sesion, nos vamos al controlador del alumno y ponemos:

~~~
session()->flash("status", "Se ha creado el alumno $alumno->nombre");
~~~

>Y nos vamos al index -> de la carpeta alumnos, para decirle que si es una sesion nos lo indique, modificaremos esto en la parte de arriba:

~~~
 <h1 class="text-4xl text-red-800 text-center">Listado de alumnos</h1>
    @if(session()->get("status"))
        <div role="alert" class="alert alert-info">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span>{{session()->get("status")}}</span>
        </div>
    @endif
    <a href="{{route("alumnos.create")}}" class="btn btn-primary mx-10">Nuevo Alumno</a>
~~~

>El contenido del div dentro del if lo sacamos de : https://daisyui.com/components/alert/

>Ahora vamos a darle funcionalidad a los botones de editar y borrar de la tabla de alumnos, vamos al index y a los botones que hemos creado antes, primero editar y pondremos:

~~~
<td>
                <a href="{{route("alumnos.edit" , $alumno->id)}}">

~~~

>vamos a alumnos controller y rellenamos la funcion edit:

~~~
 public function edit(Alumno $alumno)
    {
        return view("alumnos.create", compact("alumno"));
        //
    }
~~~


>ahora vamos a crear un formulario para editar basandonos en el create.alumno y modificaremos:


~~~
cambiamos : value= "{{old("nombre")}}

por:

value= "{{$alumno->nombre}}"

y asi con todos los campos.
~~~

>Y ahora queremos que se modifiquen los datos en la tabla que hemos creado para ello el encabezado de nuestra alumno.edit:

~~~
 <form method="POST" action="{{ route('alumnos.update', $alumno->id) }}" method="POST"
              class="bg-white p-7 rounded-2xl">
            @method("PUT")
~~~

>deberemos ir al controlador del alumno y :

~~~
 public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        $datos =$request->input();
        $alumno->update($datos);
        session()->flash("status", "Se ha actualizado el alumno $alumno->id , con nombre $alumno->nombre ");
        return redirect()->route('alumnos.index');
        //
    }
~~~

>y ahora iremos al update para permitir la modificacion, request->auth->update

~~~
 public function authorize(): bool
    {
        return true;
    }

>y las reglas 

public function rules(): array
    {
        return [
            "nombre" => "string|required|min:5|max:50",
            "email" =>"email|required|",
            "edad" => "integer|required|between:1,120",
            //
        ];
    }
~~~

>[!Caution]
>Aqui se intenta utilizar el sweetalert2 pero dio algun fallo voy a poner lo que se hace dentro del codigo y procurare solucionarlo, "recuerdo que desde la creacion del docker no puedo ver lo que pasa en la pagina por que no tengo permisos y dan los fallos que se pueden ver en el blog de notas adjunto al proyecto"

~~~
pagina de sweetalert ->		weetalert2.github.io

instalar:

npm install sweetalert2

importar el paquete en resources-> js debajo del import alpine poner:

import Swal from 'sweetalert2'

// or via CommonJS
const Swal = require('sweetalert2')

import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

Ahora iremos a nuestro layout.blade y pondremos:
@vite(["resourece.......", aqui "resource/js/app.js"]);

y en nuestro edit.blade:

<form onsubmi"(e)=>e.preventDefault()" method="POST" action="{{ route('alumnos.update', $alumno->id) }}" method="POST"

y abajo del edit, en el boton de guardar modificamos:

<input class="btn btn-primary m-2" type="submit" value="Guardar" />

por esto:

<button onclick="handleConfirm()" class="btn btn-primary m-2">Guardar</button>

y crearemos un funcion para el handleconfirm

<script>
        function handleConfirm(){
            title: 'Error!',
                text: 'Do you want to continue',
                icon: 'error',
                confirmButtonText: 'Cool'
        }
    </script>

~~~


>Y ahora vamos a darle funcionalidad al boton de borrar, deberemos meter el boton en un formulario en el index.blade



~~~
<td>
                <form action="{{route("$alumnos.destroy", $alumno->id)}}}" method="POST">
                    @csrf
                    @method("DELETE")
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         class="w-8 h-8 text-red-900">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </button>
                </form>
</td>
~~~

>vamos al controlador del almuno a la funcion destroy y ponemos:


~~~
 public function destroy(Alumno $alumno)
    {

        session()->flash("status", "Se ha borrado el alumno $alumno->id con nombre: $alumno->nombre");
        $alumno->delete();
        return redirect()->route('alumnos.index');
        //
    }
~~~
>[!Warning]
>AVISO
>Aqui nos da el siguiente fallo y no nos deja levantar el servidor:

~~~
 php artisan serve

In sanctum.php line 21:
                                             
  Class "Laravel\Sanctum\Sanctum" not found  
                                             
~~~



##Crear la parte de los profesores
>Primero vamosa  crear nuestra tabla de profesores para ello:

~~~
php artisan make:model Profesor --all
~~~

>Nos ha tenido que crear todos los archivos relacionados con el profesor, ahora 
>nos vamos a la migracions->create_profesor_table  :

~~~
public function up(): void{
	// cambiamos el profesors de debajo por "profesores " como se puede ver
	schema::create("profesores", function(blueprint $table){

	$table->id();
	$table->string("nombre");
	$table->string("email")->unique();
	$table->timestamps();

});

}
~~~

>Ahora vamos a factorires->factories.profesores

~~~
public function definition(): array{
	return[
		"nombre"=>fake()->name(),
		"email"=>fake()->safeEmail()
];
}
~~~


>y nos vamos a las migrations->alumno para añadir la clave foranea  que sera el id del profesor para poder enlazar las dos tablas:

~~~
public function up(): void{
	.-.......
	$table->foreignId("profesor_id")->constrained("profesors")->nullOnDelete();

}
~~~

>Recuerda que hemos modificaco a mano el nombre de la tabla de profesorews de profesors a profesores asi que vamos a tener que modificar el nombre en todas las partes para no >tener problemas 

>vamos a providers->Appserviceprovider

~~~
public function boot(): void{
	Pluralizer::useLanguage("spanish");
}
~~~

>y vamos a models->user.php click derecho y modificamos 
>user.php -> Usuario.php


>Ahora vamos a database->migration->create_suers_table.php

~~~
 Schema::create('users', function (Blueprint $table)
~~~


>y lo cambiamos a :

~~~
 Schema::create('usuarios', function (Blueprint $table)
~~~

>Ahora nos vamos a models->Profesor.php

~~~
class Profesor extends Model {
	use hasFactory
	public function alumnos(){
	return $this->hasMany(Alumno::class);
	}

}
~~~

>Ynos vamos al modelo del alumno:

~~~
class Alumno extends Model{

	use factory

	protected $fillable=["nombre", "edad","dni","email"];
	public function profesor(){
		return $this->belongsTo(Profesor::class);
}

}
~~~

>Y nos vamos a seeders-> databaseSeeder.php

~~~
abajo en 
	$this->call([
	ProfesorSeeder::class,
	AlumnoSeeder::class
])
~~~

>Y vamos a profesorSeeder.php


~~~
abajo :
	public function run(): void{
		Profesor::factory(10)->create();
}
~~~

>Y nos vamos a alumnoseeder abajo para modificar la parte

~~~
	Importamos la clase profesor
	$profesores = Profesor::all();
	$profesor = $profesores->random();
	alumno::factory(5)->create()->each(function(Alumno $alumno) use ($profesor){
		$alumno->profesor_id= $profesor->id;
}),
~~~

>VAmos a las migrations y modificamos el nombre de create_profesor para que se haga antes que la tabla alumno, recordemos que para hacer los alumnos se necesita un id del >profesor, click derecho sobre create_profesors

>y cambiamos 2024_05_23 por 2024_03_23

>ahora vamos a database->factories-userFactory.php click derecho y cambiamos

>User por Usuario


>Nos vamos a factories->alumnofactories


~~~
cargamos la clase profesor
y añadimos  en la funcion definition():array

	$profesores = Profesor::all();
	$profesor = $profesores->random();
	

	return[
	"email"=> fake()->email(),
	"profesor_id"=> $profesor-id,
}
~~~


>y ejecutamos la migracion 

~~~
php artisan migrate:fresh --seed
~~~


















>Prueba para la tabla de profesores:


     $alumnos = Alumno::paginate(10);
        $numeroAlumnos = Alumno::where("DNI","$profesor->id")->count();
        return view('alumnos.index', ["alumnos" => $alumnos], $numeroAlumnos);











Numeracion de paginas (Paginacion)
Vamos a modificar tanto la vista del index de la tabla de los alimnos como el controlador del alumno y aumentaremos el numero de alumnos que se creen para comprobar que estos
cambios se realizan.

Primero iremos a databsae-> Seeders->Seeders.alumno y modificamos el numero de alumnos

~~~
public function run(): void
    {
       Alumno::factory(50)->create();
    }
~~~

Segundo paso, nos vamos al controlador-> controlador.alumno y modificamos

~~~
public function index()
    {
	//  CAmbiamos esta parte del all
      //  $alumnos = Alumno::all(); 
	// y ponemos 
	$alumnos = Alumno::paginate(10);
        return view('alumnos.index', ["alumnos" => $alumnos]);
        //
    }
~~~

Y por ultimo vamos a  resources->vioews->alumnos->index.blade.php y pasada la tabla añadimos al final

~~~
        </table>
        {{$alumnos->links()}}
    </div>
~~~


>[!Warning]
>AVISO
>Cada vez que levantemos la pagina devemos tener una terminarl npm con el >comando y otra de nombre serve con el comando:

npm run dev
~~~
terminal npm:
npm run dev

Terminal server:
php artisan serve
~~~

>[!Warning]
>AVISO
>Cuando queremos ver todas las rutas y todas las operaciones dentro de nuestro proyecto laravel abrimos la terminal y ponemos :

~~~
cd ruta del proyecto

cd para entrar dentro del proyecto

php artisan route:list --path"alumno"
~~~
