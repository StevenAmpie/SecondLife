<x-general.layout>
    <x-slot name="catalog_detail_style">
        @vite(['resources/css/catalog_detail_style.css'])
    </x-slot>
    <x-slot name="arrows_Img_Articles_js">
        @vite(['resources/js/arrowsImgArticles.js'])
    </x-slot>

    <x-slot name="main_catalog_detail">
        <section class="detail">
            <article>
                <h1>3 Jeans Levi</h1>
                <p>Publicado: 14/10/2025</p>
                <p>Por: Hermenegildo Aguirre</p>
                <p>Descripción: 3 Jeans en buen estado menos de 1 año de uso</p>
            </article>
            <div>
                <button>
                    50.00$
                </button>
            </div>
        </section>
        <section class="articulos">
            @for($i=1; $i<=3; $i++)
                    <article>
                        <div class="details_article">
                            <div><h1>Jean {{$i}}</h1></div>
                            <div>
                                <p>Tipo: Pantalón</p>
                                <p>Marca: Levi</p>
                                <p>Talla: XL</p>
                                <p>Color: Azul</p>
                                <p>Observación: Pequeño agujero en la basta</p>
                            </div>
                        </div>
                        <section class = "images-articles-layout">
                            <div class="article_image">
                                <img src="{{asset('images/portada-publicacion3.jpg')}}" alt="pantalones1" width="180" height="180">
                            </div>
                            <div class="article_image">
                                <img src="{{asset('images/portada-publicacion2.jpg')}}" alt="pantalones1" width="180" height="180">
                            </div>
                        </section>

                    </article>
            @endfor
        </section>
    </x-slot>
</x-general.layout>
