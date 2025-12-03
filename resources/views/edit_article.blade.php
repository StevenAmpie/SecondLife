<x-general.layout>
    <x-slot name="edit_article_style">
        @vite(['resources/css/edit_article_style.css'])
    </x-slot>

    <x-slot name="edit_article_script">
        @vite(['resources/js/edit_article_script.js'])
    </x-slot>

    <x-slot name="edit_article_main">
        <h1>{{ $publication->titulo }}</h1>
        <h2>{{ $article->nombre }}</h2>
        <h3>Editar detalles de artículo</h3>
        <form action="{{ route('articulo.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-field">
                <label for="name">Nombre</label>
                <input id="name" name="name" type="text" value="{{ $article->nombre }}">
            </div>
            <div class="row-form-fields">
                <div class="form-field">
                    <label for="kind">Tipo</label>
                    <select id="kind" name="kind">
                        <option value="Suéter"   @selected($article->tipo === 'Suéter')>Suéter</option>
                        <option value="Pantalón" @selected($article->tipo === 'Pantalón')>Pantalón</option>
                        <option value="Calzado"  @selected($article->tipo === 'Calzado')>Calzado</option>
                    </select>
                </div>
                <div class="form-field">
                    <label for="brand">Marca</label>
                    <select id="brand" name="brand" data-current-brand="{{ $article->marca }}">
                    </select>
                </div>
            </div>
            <div class="row-form-fields">
                <div class="form-field">
                    <label for="size">Talla</label>
                    <input id="size" name="size" type="text" value="{{ $article->talla }}">
                </div>
                <div class="form-field">
                    <label for="color">Color</label>
                    <select id="color" name="color">
                        <option value="Rojo" @selected($article->color === 'Rojo')>Rojo</option>
                        <option value="Naranja" @selected($article->color === 'Naranja')>Naranja</option>
                        <option value="Amarillo" @selected($article->color === 'Amarillo')>Amarillo</option>
                        <option value="Verde" @selected($article->color === 'Verde')>Verde</option>
                        <option value="Azul" @selected($article->color === 'Azul')>Azul</option>
                        <option value="Morado" @selected($article->color === 'Morado')>Morado</option>
                        <option value="Blanco" @selected($article->color === 'Blanco')>Blanco</option>
                        <option value="Negro" @selected($article->color === 'Negro')>Negro</option>
                        <option value="Gris" @selected($article->color === 'Gris')>Gris</option>
                    </select>
                </div>
            </div>
            <div class="row-form-fields">
                <div class="form-field">
                    <label for="photo1">Foto 1</label>
                    <input id="photo1" name="photo1" type="file" accept=".jpg, .jpeg, .png">
                </div>
                <div class="form-field">
                    <label for="photo2">Foto 2</label>
                    <input id="photo2" name="photo2" type="file" accept=".jpg, .jpeg, .png">
                </div>
            </div>
            <div class="form-field">
                <label for="observations">Observaciones</label>
                <textarea id="observations" name="observations">{{ $article->observacion }}</textarea>
            </div>
            <button type="submit" class="small-button">Guardar</button>
        </form>
    </x-slot>
</x-general.layout>
