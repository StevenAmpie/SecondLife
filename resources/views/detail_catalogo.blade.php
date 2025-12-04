<x-general.layout>
    <x-slot name="catalog_detail_style">
        @vite(['resources/css/catalog_detail_style.css'])
    </x-slot>
    <x-slot name="arrows_Img_Articles_js">
        @vite(['resources/js/arrowsImgArticles.js'])
    </x-slot>

    <x-slot name="main_catalog_detail">
        @if($status == 200)
            <section class="detail">
                <article>
                    <h2 class="article-name">{{$publication->titulo}}</h2>
                    <p>Publicado: {{$publication->fecha}}</p>
                    <p>Por: {{$user_full_name->nombre." ".$user_full_name->apellido}}</p>
                    <p>Descripción: {{$publication->descripcion}}</p>
                </article>
                @if(auth()->check() && auth()->user()->id !== $publication->id_usuario)
                    <div>
                            <button onclick="window.location.href='{{route('pago.create', $publication->id)}}';">
                                ${{$publication->precio}}
                            </button>
                    </div>
                @endif
                @guest
                    <div>
                        <button onclick="window.location.href='{{route('pago.create', $publication->id)}}';">
                            ${{$publication->precio}}
                        </button>
                    </div>
                @endguest
            </section>
            <section class="articulos">

                @for($i=0; $i<count($articles); $i++)
                        <article>
                            <div class="details_article">
                                <div><h2 class="article-name">{{$articles[$i]->nombre}}</h2></div>
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
