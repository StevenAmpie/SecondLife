<x-general.layout>
    <x-slot name="publish_style">
        @vite(['resources/css/edit_publication_style.css'])
    </x-slot>

    <x-slot name="publish_script">
        @vite(['resources/js/edit_publication_carousel.js'])
    </x-slot>

    <x-slot name="publish_main">
        <section class="edit-publication-main">
            <section class="publication-header">
                <div class="publication-info">
                    <h1>{{$publication->titulo}}</h1>
                    <p><span class="label">Estado:</span>{{$publication->estado}}</p>
                    <p><span class="label">Precio:</span>{{'$'.$publication->precio}}</p>
                    <p class="description">
                        {{$publication->descripcion}}
                    </p>
                </div>

                <div class="header-actions">
                    <button type="button" class="btn-main-edit"
                            onclick="window.location.href= '{{route('publicaciones.edit', $publication->id)}}';">
                        Editar publicación
                    </button>
                </div>
            </section>
            <section class="publication-articles">

                @foreach($articles as $article)
                    <article class="article-card">
                        <div class="article-info">
                            <h2>{{$article->nombre}}</h2>
                            <p>Talla: {{$article->talla}}</p>
                            <p>Color: {{$article->color}}</p>
                            <p>Observación: {{$article->observacion}}</p>

                            <div class="article-buttons">
                                <button type="button" class="btn-edit"
                                        onclick="window.location.href= '{{route('articulo.edit', $article->id)}}';">
                                    Editar</button>

                                <form method="POST" action="{{route('articulo.destroy', $article->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="article-images">
                            <button type="button"
                                    class="carousel-arrow left"
                                    aria-label="Imagen anterior">
                                <img src="{{ asset('images/arrow-btn-left.png') }}" alt="Anterior">
                            </button>

                            <div class="carousel-image-wrapper">
                                <img src="{{ $article->img1 }}" class="article-image" alt="{{$article->nombre}}">
                                <img src="{{ $article->img2 }}" class="article-image" alt="{{$article->nombre}}">
                            </div>

                            <button type="button"
                                    class="carousel-arrow right"
                                    aria-label="Imagen siguiente">
                                <img src="{{ asset('images/arrow-btn-right.png') }}" alt="Siguiente">
                            </button>
                        </div>
                    </article>
                @endforeach
            </section>
        </section>
    </x-slot>
</x-general.layout>
