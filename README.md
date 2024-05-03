# Proyecto-Laravel-2-Evaluacion
>[!NOTE]
>Proyecto Laravel 2 Evaluacion - Alberto Tena



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

en nuestro index vamos a añadir esta parte debajo de tittle


@vite("resources/css/app.css");


y ejecutaremos el comando:


npm run dev


guardaremos en el archivo taiwing.config los themas que vamos a usar para las secciones del layout:


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

una vez hecho esto crearemos un directorio llamda layouts donde guardaremos el index que teniamos dondole el nombre de layout. todo esto ira en las vistas
en la parte de componentes.

crearemos 3 ficheros php para la parte del header, nav, footer y a todas estas las llamaremos con la siguiente etiqueta:


<x-layouts.header />


con esta etiqueta hacemos referencia a las vistas y dentro de estas al directorio layouts cambiando el nombre por el archivo php que queremos llamar, esto nos hace
evitar tener el mismo codigo por varias partes y que en caso de fallo poder encontrarlo y modificarlo de un solo archivo 

para los themas y botones descargaremos daisyui con el siguiente comando:


npm i -D daisyui@latest

y volveremos a nuestra config del taiwibg para indicarle en la parte de los plugins:


plugins: [forms, require("daisyui")],



ya con todo esto daremos las formas y buscaremos en la pagina de daisyui que themas queremos utilizar en nuestra pagina web:
https://daisyui.com/components/footer/


buscaremos las vistas de la parte de login y register  y modificaremos los layouts por el nuestro creado.