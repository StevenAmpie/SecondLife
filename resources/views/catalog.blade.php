<x-general.layout>
    <x-slot name="catalog_style">
        @vite(['resources/css/catalog_style.css'])
    </x-slot>

    <x-slot name="filters_Mobile_js">
        @vite(['resources/js/filtersMobile.js'])
    </x-slot>

    <x-slot name="search_engine">
        <section class="query-selection">
            <div class="search-container">
                <button class="filters-button" id="filters-button_id"><img id="filter-img" src="{{asset('images/filters-icon.png')}}" alt=""></button>
                <input type="search">
                <button class="search-button">Buscar</button>
            </div>
        </section>
    </x-slot>
    <x-slot name="main_catalogo">
        <section class="filters" id="filters_block">
            <h3 class="filter-word" id="filter-word-h3">Filtros</h3>
            <x-catalog.filters>
                {{--filters component--}}
            </x-catalog.filters>
        </section>
        <section class="catalogo" id="catalogo_id">
            <h1 >Catálogo</h1>
            <section class="publications">
                <!-- Placeholders -->
            @for($i = 0; $i<=5; $i++)
                    <article>
                        <img src="{{asset('images/portada-publicacion1.jpg')}}">
                        <div class="detail-publication">
                            <p>Blusa negra para mujer</p>
                            <p style ="font-weight: bold;">10.00$</p>
                        </div>
                        <button onclick="window.location.href= '{{route('catalogo.show', Str::uuid())}}';">Ver</button>

                    </article>
            @endfor
            @for($i = 0; $i<=5; $i++)
                    <article>
                        <img src="{{asset('images/portada-publicacion2.jpg')}}">
                        <div class="detail-publication">
                            <p>Chaqueta tipo camisa</p>
                            <p style ="font-weight: bold;">20.00$</p>
                        </div>
                        <button onclick="window.location.href= '{{route('catalogo.show', Str::uuid())}}';">Ver</button>

                    </article>
            @endfor
            @for($i = 0; $i<=5; $i++)
                    <article>
                        <div><img src="{{asset('images/portada-publicacion3.jpg')}}"></div>
                        <div class="detail-publication">
                            <p>3 Jeans Levi</p>
                            <p style ="font-weight: bold;">50.00$</p>
                        </div>
                        <button onclick="window.location.href= '{{route('catalogo.show', Str::uuid())}}';">Ver</button>

                    </article>
            @endfor
            </section>
        </section>
    </x-slot>
</x-general.layout>
