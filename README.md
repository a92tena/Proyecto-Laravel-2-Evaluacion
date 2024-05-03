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


