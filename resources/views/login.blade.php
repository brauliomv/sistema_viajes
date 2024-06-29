<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<div class="login">
    <div class="wrapper">
    
        <div class="title">
            <h2>Iniciar sesión </h2>
        </div>
        
        @if($message = Session::get('error'))
            <span style="color:red">{{$message}}</span>
        @endif
        <form action="{{ route('login') }}" class="login-form" method="POST">@csrf
            <div class="form-field">
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="form-field">
                <label for="email">Contraseña</label>
                <input type="password" name="password" id="password">
            </div>
            <button type="submit">Ingresar</button>
        </form>
    </div>
</div>