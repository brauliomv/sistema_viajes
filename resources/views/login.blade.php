@include('app.components.style')
<body class="bg-gradient-primary">
<!-- Outer Row -->
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-lg-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image">Iniciar sesión</div> -->
                            <div class="col-xl-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                                        @if($message = Session::get('error'))
                                            <span style="color:red">{{$message}}</span>
                                        @endif
                                    </div>
                                    <form action="{{ route('login') }}" class="user" method="POST"> @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="email" name="email" aria-describedby="emailHelp"
                                                placeholder="Correo electrónico...">
                                                @error('email')
                                                    <small style="color:red">{{$message}}</small>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Contraseña">
                                                @error('password')
                                                    <small style="color:red">{{$message}}</small>
                                                @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Iniciar sesión</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</body>

