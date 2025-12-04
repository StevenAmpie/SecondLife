<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SecondLife</title>
    @vite(['resources/css/style.css'])
    <!-- Put here your view style -->
    {{$catalog_style ?? ''}}
    {{$catalog_detail_style ?? ''}}
    {{$edit_article_style ?? ''}}
    {{$publish_style ?? ''}}
    {{$payment_process_style ?? ''}}
    {{$general_details_style ?? ''}}
    <!-- Put here your js file -->
    {{$filters_Mobile_js?? ''}}
    {{$arrows_Img_Articles_js ?? ''}}
    {{$edit_article_script ?? ''}}
    {{$publish_script ?? ''}}
    {{$payment_process_script ?? ''}}
</head>
<body>
    <header>
        <section class="titulo-app">
            <div class="titulos-container">
                <div class = "SecondLife">
                    <h1 style="color:#1e3a5f;">Second</h1>
                    <h1 style="color: #D64309;">Life</h1>
                </div>
                <h2>Dale una segunda vida a tu ropa</h2>
            </div>
            @if(auth()->check())
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button style="width: 0.1em"  class="button-perfil-usuario" type="submit"><img src="{{asset('images/logout.png')}}" alt="foto del usuario"></button>
                </form>
            @else
                <button class="button-perfil-usuario" type="submit">
                    <a href="{{route('login')}}"><img src="{{asset('images/user-button.jpg')}}" alt="foto del usuario"></a>
                </button>
            @endif

            <x-general.toast_success>
            </x-general.toast_success>

            <x-general.toast_error>
            </x-general.toast_error>

        </section>
        <nav>
            <div class="buttons-container">
                <button id="catalogo" onclick="window.location.href='{{ route('catalogo.index') }}'">Catálogo</button>
                <button id="mis publicaciones" onclick="window.location.href='{{ route('publicaciones.index') }}'">Mis publicaciones</button>
                <button id="publicar" onclick="window.location.href='{{ route('publish.create') }}'">Publicar</button>
            </div>
            <div class="button-usuario-container" id="perfil_container">
                @if(auth()->check())
                    <h2>{{ auth()->user()->nombre }}</h2>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit"><img src="{{asset('images/logout.png')}}" alt="foto del usuario"></button>
                    </form>
                @else
                    <h2><a class="login-header" href="{{route('login')}}">Login</a></h2>
                    <button><a href="{{route('login')}}"><img src="{{asset('images/user-button.jpg')}}" alt="foto del usuario"></a></button>
                @endif
            </div>
            {{$perfil_container_movil ?? ''}}
        </nav>
        {{$search_engine ?? ''}}
    </header>
    <main id="main">
        {{$main_catalogo ?? ''}}
        {{$main_catalog_detail ?? ''}}
        {{$main_editar_articulo ?? ''}}
        {{$edit_article_main ?? ''}}
        {{$publish_main ?? ''}}
        {{$payment_process_main ?? ''}}
        {{$general_details_main ?? ''}}
    </main>
</body>
</html>
