<x-general.layout>
    <x-slot name="editar_articulo_style">
        @vite(['resources/css/editar_articulo_style.css'])
    </x-slot>

    <x-slot name="editar_articulo_script">
        @vite(['resources/js/editar_articulo_script.js'])
    </x-slot>

    <x-slot name="main_editar_articulo">
        <h1>3 Jeans Levi</h1>
        <h2>Jean 1</h2>
        <h3>Editar detalles de artículo</h3>

        <form action="" method="post">
            <div class="form-field">
                <label for="nombre">Nombre</label>
                <input name="nombre" type="text" value="Jean 1">
            </div>

            <div class="row-form-fields">
                <div class="form-field">
                    <label for="tipo">Tipo</label>
                    <select name="tipo">
                        <option value="Suéter">Suéter</option>
                        <option value="Pantalón" selected>Pantalón</option>
                        <option value="Calzado">Calzado</option>
                    </select>
                </div>

                <div class="form-field">
                    <label for="marca">Marca</label>
                    <select name="marca">
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
                    <label for="talla">Talla</label>
                    <input name="talla" type="text" value="30">
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
                    <label for="foto1">Foto 1</label>
                    <input name="foto1" type="file" accept=".jpg, .png">
                </div>

                <div class="form-field">
                    <label for="foto2">Foto 2</label>
                    <input name="foto2" type="file" accept=".jpg, .png">
                </div>
            </div>

            <div class="form-field">
                <label for="observaciones">Observaciones</label>
                <textarea name="observaciones">Observaciones</textarea>
            </div>

            <button type="submit">Guardar</button>
        </form>
    </x-slot>
</x-general.layout>
