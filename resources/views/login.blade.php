<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SecondLife</title>
    @vite(['resources/css/login_style.css'])
    @vite(['resources/js/togglePassword.js'])
</head>
<body>
    <main>
        <section class="login-section">
            <div>
                <a class="title-login" href="{{route('catalogo.index')}}">
                    <h1 style="color:#1e3a5f;">Second</h1>
                    <h1 style="color: #D64309;">Life</h1>
                </a>
            </div>
            <form class="form-login" action="{{route('login.store')}}" method="POST">
                @csrf
                <fieldset class="fieldset-login">

                    <div class="label-input">
                        <label for="email" class="required">Email</label>
                        <input id='email' type="text" name="email" placeholder="email.address@gmail.com">
                    </div>

                    <div class="label-input">
                        <label for="password" class="required">Password</label>
                        <input id='password' type="password" name="password" placeholder="*******">
                    </div>
                    <div class="password-toggle-container">
                        <label for="togglePassword">Mostrar contraseña</label>
                        <input class="password-toggle" id="togglePassword" type="checkbox">
                    </div>

                    <button type="submit">
                        Login
                    </button>
                    <div class="link-to-register">
                        <a href="{{route('register')}}">Regístrate</a>
                    </div>
                </fieldset>
            </form>
            @if ($errors->any())
                <p style="color: #cc0505">{{$errors->first()}}</p>
            @endif
        </section>
    </main>

</body>
</html>
