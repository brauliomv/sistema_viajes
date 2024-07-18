<nav>
    <ul>
        @auth()
            <li><a href="{{ route('welcome') }}">Inicio</a></li>
            <li><a href="{{ route('show_stores') }}">Sucursales</a></li>
            <li><a href="{{ route('show_users') }}">Usuarios</a></li>
            <li><a href="{{ route('show_workers') }}">Colaboradores</a></li>
            <li><a href="{{route('show_drivers')}}">Conductores</a></li>
            <li><a href="{{ route('show_rides') }}">Viajes</a></li>
            <li><a href="#">Reportes</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">@csrf
                
                    <button type="submit">Cerrar sesión </button>
                </form>
            </li>
        @endauth
    </ul>
</nav>