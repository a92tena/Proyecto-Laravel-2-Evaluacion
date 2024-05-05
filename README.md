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


