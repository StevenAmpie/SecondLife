<x-general.layout>
    <x-slot name="edit_article_style">
        @vite(['resources/css/edit_article_style.css'])
    </x-slot>

    <x-slot name="edit_article_script">
        @vite(['resources/js/edit_article_script.js'])
    </x-slot>

    <x-slot name="edit_article_main">
        <h1>3 Jeans Levi</h1>
        <h2>Jean 1</h2>
        <h3>Editar detalles de artículo</h3>
        <form action="" method="post">
            <div class="form-field">
                <label for="name">Nombre</label>
                <input name="name" type="text" value="Jean 1">
            </div>
            <div class="row-form-fields">
                <div class="form-field">
                    <label for="kind">Tipo</label>
                    <select name="kind">
                        <option value="Suéter">Suéter</option>
                        <option value="Pantalón" selected>Pantalón</option>
                        <option value="Calzado">Calzado</option>
                    </select>
                </div>
                <div class="form-field">
                    <label for="brand">Marca</label>
                    <select name="brand">
                        <option value="Levi's" selected>Levi's</option>
                        <option value="Dockers">Dockers</option>
                        <option value="Tommy Hilfiger">Tommy Hilfiger</option>
                        <option value="Lee">Lee</option>
                        <option value="Wrangler">Wrangler</option>
                    </select>
                </div>
            </div>
            <div class="row-form-fields">
                <div class="form-field">
                    <label for="size">Talla</label>
                    <input name="size" type="text" value="30">
                </div>
                <div class="form-field">
                    <label for="color">Color</label>
                    <select name="color">
                        <option value="Rojo">Rojo</option>
                        <option value="Naranja">Naranja</option>
                        <option value="Amarillo">Amarillo</option>
                        <option value="Verde">Verde</option>
                        <option value="Azul" selected>Azul</option>
                        <option value="Morado">Morado</option>
                        <option value="Blanco">Blanco</option>
                        <option value="Negro" selected>Negro</option>
                        <option value="Gris">Gris</option>
                    </select>
                </div>
            </div>
            <div class="row-form-fields">
                <div class="form-field">
                    <label for="photo1">Foto 1</label>
                    <input name="photo1" type="file" accept=".jpg, .png">
                </div>
                <div class="form-field">
                    <label for="photo2">Foto 2</label>
                    <input name="photo2" type="file" accept=".jpg, .png">
                </div>
            </div>
            <div class="form-field">
                <label for="observations">Observaciones</label>
                <textarea name="observations">Observaciones</textarea>
            </div>
            <button type="submit" class="small-button">Guardar</button>
        </form>
    </x-slot>
</x-general.layout>
