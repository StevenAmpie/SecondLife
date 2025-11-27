{{-- resources/views/my_publications.blade.php --}}
<x-general.layout>

    {{-- Slot para el CSS específico de esta vista --}}
    <x-slot name="edit_article_style">
        @vite(['resources/css/my_publications_style.css'])
    </x-slot>

    {{-- Contenido principal --}}
    <x-slot name="edit_article_main">
        <h1>MIS PUBLICACIONES</h1>

        <section class="my-publications-container">

            {{-- PUBLICACIÓN 1 - Disponible --}}
            <article class="publication-card">
                <div class="publication-image-wrapper">
                    <img
                        src="{{ asset('images/portada-publicacion1.jpg') }}"
                        alt="Jeans Levi L"
                        class="publication-image"
                    >
                </div>

                <div class="publication-info">
                    <p class="publication-title">Jeans Levi L</p>
                    <p class="publication-price">20.00$</p>
                    <p class="publication-date">09/10/2025</p>
                    <p class="publication-status disponible">Disponible</p>
                </div>

                <div class="publication-actions">
                    <button type="button" class="small-button">
                        Ocultar publicación
                    </button>
                    <button type="button" class="small-button">
                        Editar publicación
                    </button>
                    <button type="button" class="btn-delete">
                        Eliminar publicación
                    </button>
                </div>
            </article>

            {{-- PUBLICACIÓN 2 - Oculta --}}
            <article class="publication-card">
                <div class="publication-image-wrapper">
                    <img
                        src="{{ asset('images/portada-publicacion2.jpg') }}"
                        alt="Jeans Levi M"
                        class="publication-image"
                    >
                </div>

                <div class="publication-info">
                    <p class="publication-title">Jeans Levi M</p>
                    <p class="publication-price">18.00$</p>
                    <p class="publication-date">05/10/2025</p>
                    <p class="publication-status oculta">Oculta</p>
                </div>

                <div class="publication-actions">
                    <button type="button" class="small-button">
                        Mostrar publicación
                    </button>
                    <button type="button" class="small-button">
                        Editar publicación
                    </button>
                    <button type="button" class="btn-delete">
                        Eliminar publicación
                    </button>
                </div>
            </article>

            {{-- PUBLICACIÓN 3 - Disponible --}}
            <article class="publication-card">
                <div class="publication-image-wrapper">
                    <img
                        src="{{ asset('images/portada-publicacion3.jpg') }}"
                        alt="Jeans Negro S"
                        class="publication-image"
                    >
                </div>

                <div class="publication-info">
                    <p class="publication-title">Jeans Negro S</p>
                    <p class="publication-price">22.00$</p>
                    <p class="publication-date">01/10/2025</p>
                    <p class="publication-status disponible">Disponible</p>
                </div>

                <div class="publication-actions">
                    <button type="button" class="small-button">
                        Ocultar publicación
                    </button>
                    <button type="button" class="small-button">
                        Editar publicación
                    </button>
                    <button type="button" class="btn-delete">
                        Eliminar publicación
                    </button>
                </div>
            </article>

            {{-- PUBLICACIÓN 4 - Vendida (sin botones) --}}
            <article class="publication-card">
                <div class="publication-image-wrapper">
                    <img
                        src="{{ asset('images/portada-publicacion2.jpg') }}"
                        alt="Jeans Levi L Vendidos"
                        class="publication-image"
                    >
                </div>

                <div class="publication-info">
                    <p class="publication-title">Jeans Levi L</p>
                    <p class="publication-price">20.00$</p>
                    <p class="publication-date">09/10/2025</p>
                    <p class="publication-status vendida">Vendida</p>
                </div>
            </article>

        </section>
    </x-slot>

</x-general.layout>
