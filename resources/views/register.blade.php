<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SecondLife</title>
    @vite(['resources/css/register_style.css'])
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
        <form class="form-register" action="" method="POST">
            <fieldset class="fieldset-register">

                <div class="label-input">
                    <label for="name">Nombre</label>
                    <input id='name' type="text" name="name" placeholder="Nombre">
                </div>

                <div class="label-input">
                    <label for="lastname">Apellido</label>
                    <input id='lastname' type="text" name="lastname" placeholder="Apellido">
                </div>

                <div class="label-input">
                    <label for="email">Email</label>
                    <input id='email' type="text" name="email" placeholder="email.address@gmail.com">
                </div>

                <div class="label-input">
                    <label for="password">Contraseña</label>
                    <input id='password' type="password" name="password" placeholder="*******">
                </div>

                <button type="submit">
                    Register
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
