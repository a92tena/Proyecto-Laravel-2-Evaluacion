# Proyecto-Laravel-2-Evaluacion
Proyecto Laravel 2 Evaluacion - Alberto Tena

# indice:
*[Título e imagen de portada](#Título-e-imagen-de-portada)
*[Instalación Laravel](## Instalación Laravel)
*[Creacion de la pagina](## Creacion de la pagina)


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
composer create-project laravel/Proyecto laravel 
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
Deberemos ir a la pagina de node he instalarlo para poder usar los comandos npm que se usara para dar forma al layout de la pagina
https://nodejs.org/en/download

### Instalar el paquete 

npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p

## Creacion de la pagina

