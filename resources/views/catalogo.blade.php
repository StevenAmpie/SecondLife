<x-general.layout>
    <x-slot name="catalogo_style">
        @vite(['resources/css/catalog_style.css'])
    </x-slot>

    <x-slot name="search_engine">
        <section class="query-selection">
            <div class="search-container">
                <button class="filters-button"><img src="{{asset('images/filters-icon.png')}}" alt=""></button>
                <input type="search">
                <button class="search-button">Buscar</button>
            </div>
        </section>
    </x-slot>
    <x-slot name="main_catalogo">
        <section class="filters" id="filters_block">
            <h3 class="filter-word">Filtros</h3>
                <article>
                    <h3>Tipo</h3>
                    <form class="categories">
                        <div>
                            <input type="checkbox" id="sueter" name="sueter" value="Suéter">
                            <label for="sueter">Suéter</label><br>
                        </div>

                        <div>
                            <input type="checkbox" id="pantalon" name="pantalon" value="Pantalón">
                            <label for="pantalon">Pantalón</label><br>
                        </div>

                        <div>
                            <input type="checkbox" id="zapatillas" name="zapatillas" value="Zapatillas">
                            <label for="zapatillas">Zapatillas</label>
                        </div>
                    </form>
                </article>

                <article>
                    <h3>Marca</h3>
                    <form class="categories">
                        <div>
                            <input type="checkbox" id="nike" name="nike" value="Nike">
                            <label for="nike">Nike</label><br>
                        </div>

                        <div>
                            <input type="checkbox" id="new balance" name="new balance" value="New Balance">
                            <label for="new balance">New Balance</label><br>
                        </div>

                        <div>
                            <input type="checkbox" id="levi" name="levi" value="Levi">
                            <label for="levi">Levi</label>
                        </div>

                        <div>
                            <input type="checkbox" id="lacoste" name="lacoste" value="Lacoste">
                            <label for="lacoste">Lacoste</label>
                        </div>
                    </form>
                </article>

                <article>
                    <h3>Color</h3>
                    <form class="categories">
                        <div>
                            <input type="checkbox" id="rojo" name="rojo" value="Rojo">
                            <label for="rojo">Rojo</label><br>
                        </div>

                        <div>
                            <input type="checkbox" id="naranja" name="naranja" value="Naranja">
                            <label for="naranja">Naranja</label><br>
                        </div>

                        <div>
                            <input type="checkbox" id="amarillo" name="amarillo" value="Amarillo">
                            <label for="amarillo">Amarillo</label>
                        </div>

                        <div>
                            <input type="checkbox" id="verde" name="verde" value="Verde">
                            <label for="verde">Verde</label>
                        </div>

                        <div>
                            <input type="checkbox" id="azul" name="azul" value="Azul">
                            <label for="azul">Azul</label>
                        </div>

                        <div>
                            <input type="checkbox" id="morado" name="morado" value="Morado">
                            <label for="morado">Morado</label>
                        </div>
                    </form>
                </article>

                <article>
                    <h3>Precio</h3>
                    <form class="categories">
                        <div>
                            <input type="checkbox" id="<10$" name="<10$" value="<10$">
                            <label for="<10$"><10$</label><br>
                        </div>

                        <div>
                            <input type="checkbox" id="10$-20$" name="10$-20$" value="10$-20$">
                            <label for="10$-20$">10$-20$</label><br>
                        </div>

                        <div>
                            <input type="checkbox" id="20$-40$" name="20$-40$" value="20$-40$">
                            <label for="20$-40$">20$-40$</label>
                        </div>

                        <div>
                            <input type="checkbox" name=">40$" id=">40$", value=">40$">
                            <label for=">40$">>40$</label>
                        </div>
                    </form>
                </article>
                <button class="btn-filtrar" type="submit">Filtrar</button>
        </section>
        <section class="catalogo">
            <h1 >Catálogo</h1>
            <section class="publication">
                <!-- Placeholders -->
            @for($i = 0; $i<=5; $i++)
                    <article>
                        <img src="{{asset('images/portada-publicacion1.jpg')}}">
                        <div class="detail-publication">
                            <p>Blusa negra para mujer</p>
                            <p style ="font-weight: bold;">Precio</p>
                        </div>
                        <button>Ver</button>

                    </article>
            @endfor
            @for($i = 0; $i<=5; $i++)
                    <article>
                        <img src="{{asset('images/portada-publicacion2.jpg')}}">
                        <div class="detail-publication">
                            <p>Chaqueta tipo camisa</p>
                            <p style ="font-weight: bold;">Precio</p>
                        </div>
                        <button>Ver</button>

                    </article>
            @endfor
            @for($i = 0; $i<=5; $i++)
                    <article>
                        <div><img src="{{asset('images/portada-publicacion3.jpg')}}"></div>
                        <div class="detail-publication">
                            <p>Pantalones para hombre</p>
                            <p style ="font-weight: bold;">precio</p>
                        </div>
                        <button>Ver</button>

                    </article>
            @endfor
            </section>
        </section>
    </x-slot>
</x-general.layout>
