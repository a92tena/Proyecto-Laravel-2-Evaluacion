# Proyecto-Laravel-2-Evaluacion
Proyecto Laravel 2 Evaluacion - Alberto Tena
# Instalacion basica php

> Documenta aquí el proceso que has seguido para que se vea nuestra primera app: un index.php que muestra el `phpinfo` (tienes el script en la carpeta app)




## Instalación Laravel

### Primero vamos a descargar composer
Desde su pagina con la url descargamos composer y lo instalamos ene l sistema
https://getcomposer.org/Composer-Setup.exe

### Segundo paso instalar laravel desde composer
Abrimos la consaola  y ponemos el siguiente comando: 

~~~
composer global require laravel/installer
~~~


### Tercero crear un  proyecto
Desde la consola nos ubicamos en la ruta del directorio donde vamos a crear el proyecto y ponemos el siguiente comando: 

~~~
composer create-project laravel/Proyecto laravel 
~~~

y vemos la info En el directorio laravel/prueba1:

~~~
php artisan about
~~~


### Cuarto Instalar los plugins en  en phpstorm 
Nos vamos a settings y dentro buscamos el apartado plugin ahi buscaremos:
atom material icons
laravel idea
y los instalaremos.


### Quinto activar servidor web con artisan
 desde terminal de phpstorm situados en nuestro proyecto introducimos el siguiente comando:

~~~
 php artisan serve
~~~

