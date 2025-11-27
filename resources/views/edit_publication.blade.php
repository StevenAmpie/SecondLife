<x-general.layout>
    {{-- CSS --}}
    <x-slot name="publish_style">
        @vite(['resources/css/edit_publication_style.css'])
    </x-slot>

    {{-- JS del carrusel --}}
    <x-slot name="publish_script">
        @vite(['resources/js/edit_publication_carousel.js'])
    </x-slot>

    <x-slot name="publish_main">
        <section class="edit-publication-main">

            {{-- ENCABEZADO --}}
            <section class="publication-header">
                <div class="publication-info">
                    <h1>Jeans Levi L</h1>
                    <p><span class="label">Estado:</span> Disponible</p>
                    <p><span class="label">Precio:</span> 20.00$</p>
                    <p class="description">
                        Pack de jeans Levi talla L en buen estado. Incluye varios modelos y colores.
                    </p>
                </div>

                <div class="header-actions">
                    <button type="button" class="btn-main-edit">
                        Editar publicación
                    </button>
                </div>
            </section>

            @php
                $imagenes = [
                    asset('images/portada-publicacion3.jpg'),
                    asset('images/1bb3569e-f766-41ff-9ff1-ef569bde1204.jpg'),
                    asset('images/1c6fe362-4046-40c9-b197-fbea4a490103.jpg'),
                ];
            @endphp


            <section class="publication-articles">

                {{-- ARTÍCULO 1 --}}
                <article class="article-card">
                    <div class="article-info">
                        <h2>Jeans azul claro</h2>
                        <p>Talla: L</p>
                        <p>Color: Azul claro</p>
                        <p>Observación: Ligero desgaste en el dobladillo.</p>

                        <div class="article-buttons">
                            <button type="button" class="btn-edit">Editar</button>
                            <button type="button" class="btn-delete">Eliminar</button>
                        </div>
                    </div>

                    <div class="article-images">
                        <button type="button"
                                class="carousel-arrow left"
                                aria-label="Imagen anterior">
                            <img src="{{ asset('images/arrow-btn-left.png') }}" alt="Anterior">
                        </button>

                        <div class="carousel-image-wrapper">
                            @foreach ($imagenes as $img)
                                <img src="{{ $img }}" class="article-image" alt="imagen jean">
                            @endforeach
                        </div>

                        <button type="button"
                                class="carousel-arrow right"
                                aria-label="Imagen siguiente">
                            <img src="{{ asset('images/arrow-btn-right.png') }}" alt="Siguiente">
                        </button>
                    </div>
                </article>



                {{-- ARTÍCULO 2 --}}
                <article class="article-card">
                    <div class="article-info">
                        <h2>Jeans azul oscuro</h2>
                        <p>Talla: L</p>
                        <p>Color: Azul oscuro</p>
                        <p>Observación: Tela gruesa, ideal para uso diario.</p>

                        <div class="article-buttons">
                            <button type="button" class="btn-edit">Editar</button>
                            <button type="button" class="btn-delete">Eliminar</button>
                        </div>
                    </div>

                    <div class="article-images">
                        <button type="button"
                                class="carousel-arrow left"
                                aria-label="Imagen anterior">
                            <img src="{{ asset('images/arrow-btn-left.png') }}" alt="Anterior">
                        </button>

                        <div class="carousel-image-wrapper">
                            @foreach ($imagenes as $img)
                                <img src="{{ $img }}" class="article-image" alt="imagen jean">
                            @endforeach
                        </div>

                        <button type="button"
                                class="carousel-arrow right"
                                aria-label="Imagen siguiente">
                            <img src="{{ asset('images/arrow-btn-right.png') }}" alt="Siguiente">
                        </button>
                    </div>
                </article>



                {{-- ARTÍCULO 3 --}}
                <article class="article-card">
                    <div class="article-info">
                        <h2>Jeans negro</h2>
                        <p>Talla: M</p>
                        <p>Color: Negro</p>
                        <p>Observación: Corte skinny, casi sin uso.</p>

                        <div class="article-buttons">
                            <button type="button" class="btn-edit">Editar</button>
                            <button type="button" class="btn-delete">Eliminar</button>
                        </div>
                    </div>

                    <div class="article-images">
                        <button type="button"
                                class="carousel-arrow left"
                                aria-label="Imagen anterior">
                            <img src="{{ asset('images/arrow-btn-left.png') }}" alt="Anterior">
                        </button>

                        <div class="carousel-image-wrapper">
                            @foreach ($imagenes as $img)
                                <img src="{{ $img }}" class="article-image" alt="imagen jean">
                            @endforeach
                        </div>

                        <button type="button"
                                class="carousel-arrow right"
                                aria-label="Imagen siguiente">
                            <img src="{{ asset('images/arrow-btn-right.png') }}" alt="Siguiente">
                        </button>
                    </div>
                </article>

            </section>
        </section>
    </x-slot>
</x-general.layout>
