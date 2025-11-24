<x-general.layout>
    <x-slot name="catalog_style">
        @vite(['resources/css/catalog_style.css'])
    </x-slot>

    <x-slot name="filters_Mobile_js">
        @vite(['resources/js/filtersMobile.js'])
    </x-slot>

    <x-slot name="search_engine">
        <section class="query-selection">
            <form class="search-container" action="{{route('catalogo.search')}}" method="GET">
                <input id="query" type="search" name="query">
                <button type="submit" class="search-button"><label for="query">Buscar</label></button>
            </form>
        </section>
    </x-slot>
    <x-slot name="main_catalogo">
        <form class="filters" id="filters_block" action="{{route('catalogo.filters')}}" method="GET">
            <h3 class="filter-word" id="filter-word-h3">Filtros</h3>
            <x-catalog.filters>
                {{--filters component--}}
            </x-catalog.filters>
        </form>
        <section class="catalogo" id="catalogo_id">
            <h2>Catálogo</h2>
            <section class="publications">
                <!-- Placeholders -->
                @if($status == 200)
                    @for($i = 0; $i<count($publications); $i++)
                            <article>
                                <img src="{{asset($publications[$i]->portada)}}" alt="{{$publications[$i]->titulo}}">
                                <div class="detail-publication">
                                    <p>{{$publications[$i]->titulo}}</p>
                                    <p style ="font-weight: bold;">{{$publications[$i]->precio."$"}}</p>
                                </div>
                                <button onclick="window.location.href= '{{route('catalogo.show', $publications[$i]->id)}}';">Ver</button>
                            </article>
                    @endfor
                @endif

                @if($status == 404)
                        <x-catalog.notFound>
                        </x-catalog.notFound>
                @endif
            </section>
        </section>
    </x-slot>
</x-general.layout>
