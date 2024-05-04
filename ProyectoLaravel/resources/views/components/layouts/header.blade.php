<header class="h-15v bg-header p-5 flex justify-between items-center">
    <img class="max-h-full" src="{{asset("/img/logo.png")}}}" alt="logo">
    <h1 class="text-5xl text-white">Proyecto de Laravel</h1>
    <div>
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
    </div>
</header>
