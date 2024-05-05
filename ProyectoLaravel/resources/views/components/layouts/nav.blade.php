<nav class="h-10v bg-nav flex flex-row justify-start items-center space-x-2 ">
    <a class= "btn  btn-primary " href="about">About</a>
    <a class= "btn  btn-primary " href="/">home</a>
    <a class= "btn  btn-primary " href="{{route("alumnos.index")}}">Alumnos</a>
    @auth
    <a class= "btn  btn-primary " href="proyecto">Proyectos</a>
    @endauth
    <a class= "btn  btn-primary " href="">Contacta</a>
</nav>
