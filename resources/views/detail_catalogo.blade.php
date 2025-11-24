<x-general.layout>
    <x-slot name="catalog_detail_style">
        @vite(['resources/css/catalog_detail_style.css'])
    </x-slot>
    <x-slot name="arrows_Img_Articles_js">
        @vite(['resources/js/arrowsImgArticles.js'])
    </x-slot>

    <x-slot name="main_catalog_detail">
        <section class="articulos">
            @if($status == 200)
                @for($i=0; $i<count($articles); $i++)
                        <article>
                            <div class="details_article">
                                <div><h2>{{$articles[$i]->nombre}}</h2></div>
                                <div>
                                    <p>Tipo: {{$articles[$i]->tipo}}</p>
                                    <p>Marca: {{$articles[$i]->marca}}</p>
                                    <p>Talla: {{$articles[$i]->talla}}</p>
                                    <p>Color: {{$articles[$i]->color}}</p>
                                    <p>Observación: {{$articles[$i]->observacion}}</p>
                                </div>
                            </div>
                            <section class = "images-articles-layout">
                                <div class="article_image">
                                    <img src="{{asset($articles[$i]->img1)}}" alt="{{$articles[$i]->nombre}}" width="180" height="180">
                                </div>
                                <div class="article_image">
                                    <img src="{{asset($articles[$i]->img2)}}" alt="{{$articles[$i]->nombre}}" width="180" height="180">
                                </div>
                            </section>
                        </article>
                @endfor
            @endif
            @if($status == 400)
                <x-catalog.notFound></x-catalog.notFound>
            @endif
        </section>
    </x-slot>
</x-general.layout>
