<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/style.css'])
    <!-- Put here your view style here -->
    {{$catalogo_style ?? ''}}
    <!-- Put here your js file -->

</head>
<body>
    <header>
        <section class="titulo-app">
            <div class="titulos-container">
                <h1>SecondLife</h1>
                <h2>Dale una segunda vida a tu ropa</h2>
            </div>
            <button class="button-perfil-usuario"><img src="{{asset('images/user-button.jpg')}}"></button>
        </section>
        <nav>
            <div class="buttons-container">
                <button id="catalogo">Catálogo</button>
                <button id="mis publicaciones">Mis publicaciones</button>
                <button id="publicar">Publicar</button>
            </div>

            <div class="button-usuario-container" id="perfil_container">
                <h2>Usuario</h2>
                <button><img src="{{asset('images/user-button.jpg')}}"></button>
            </div>

            {{$perfil_container_movil ?? ''}}

        </nav>
        {{$search_engine ?? ''}}
    </header>

    <main>
        {{$main_catalogo ?? ''}}
    </main>
</body>
</html>
