<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SecondLife</title>
    @vite(['resources/css/register_style.css'])
    @vite(['resources/js/togglePassword.js'])
</head>
<body>
<main>
    <section class="register-section">
        <div>
            <a class="title-register" href="{{route('catalogo.index')}}">
                <h1 style="color:#1e3a5f;">Second</h1>
                <h1 style="color: #D64309;">Life</h1>
            </a>
        </div>
        <form class="form-register" action="{{route('register.store')}}" method="POST">
            @csrf
            <fieldset class="fieldset-register">

                <div class="label-input">
                    <label for="name" class="required">Nombre</label>
                    <input id='name' type="text" name="name" placeholder="Nombre">
                </div>

                <div class="label-input">
                    <label for="lastname" class="required">Apellido</label>
                    <input id='lastname' type="text" name="lastname" placeholder="Apellido" required>
                </div>

                <div class="label-input">
                    <label for="email" class="required">Email</label>
                    <input id='email' type="text" name="email" placeholder="email.address@gmail.com" required>
                </div>

                <div class="label-input">
                    <label for="password" class="required">Contraseña</label>
                    <input id='password' type="password" name="password" placeholder="*******" required>
                </div>

                <div class="password-toggle-container">
                    <label for="togglePassword">Mostrar contraseña</label>
                    <input class="password-toggle" id="togglePassword" type="checkbox">
                </div>
                @if ($errors->any())
                    <p class="errors-register">{{$errors->first()}}</p>
                @endif
                <button type="submit">
                    Registrarse
                </button>
                <div class="link-to-login">
                    <a href="{{route('login')}}">¿Ya tienes una cuenta?</a>
                </div>
            </fieldset>
        </form>
    </section>
</main>

</body>
</html>
