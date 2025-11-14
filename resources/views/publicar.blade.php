<x-general.layout>
    <x-slot name="publicar_style">
        @vite(['resources/css/publicar_style.css'])
    </x-slot>

    <x-slot name="publicar_script">
        @vite(['resources/js/publicar_script.js'])
    </x-slot>

    <x-slot name="main_publicar">
        <h1>Publicar</h1>

        <div class="publicar-detalles-generales">
            <div class="form-field">
                <label for="titulo">Título</label>
                <input name="titulo" type="text" required>
            </div>

            <div class="form-field">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion"></textarea>
            </div>

            <div class="row-form-fields">
                <div class="form-field">
                    <label for="precio">Precio</label>
                    <input name= "precio" type="number" value="0.00" min="0.01" step="1.00" required>
                </div>
                <div class="form-field">
                    <label for="portada">Portada</label>
                    <input name= "portada" type="file" accept=".jpg, .png" required>
                </div>
            </div>
        </div>

        <div class="publicar-articulos">
            <input name="cantidad-articulos" type="hidden">
            <div class="articulo-fieldset">
                <h2>Artículo 1</h2>

                <div class="form-field">
                    <label for="nombre-articulo-0">Nombre</label>
                    <input name="nombre-articulo-0" type="text" required>
                </div>

                <div class="row-form-fields">
                    <div class="form-field">
                        <label for="tipo-articulo-0">Tipo</label>
                        <select name="tipo-articulo-0" required>
                            <option value="Suéter">Suéter</option>
                            <option value="Pantalón">Pantalón</option>
                            <option value="Calzado">Calzado</option>
                        </select>
                    </div>
                    <div class="form-field">
                        <label for="marca-articulo-0">Marca</label>
                        <select name="marca-articulo-0" required>
                        </select>
                    </div>
                </div>

                <div class="row-form-fields">
                    <div class="form-field">
                        <label for="talla-articulo-0">Talla</label>
                        <input name="talla-articulo-0" type="text" required>
                    </div>
                    <div class="form-field">
                        <label for="color-articulo-0">Color</label>
                        <select name="color-articulo-0" required>
                            <option value="Rojo">Rojo</option>
                            <option value="Naranja">Naranja</option>
                            <option value="Amarillo">Amarillo</option>
                            <option value="Verde">Verde</option>
                            <option value="Azul">Azul</option>
                            <option value="Morado">Morado</option>
                            <option value="Blanco">Blanco</option>
                            <option value="Negro">Negro</option>
                            <option value="Gris">Gris</option>
                        </select>
                    </div>
                </div>

                <div class="row-form-fields">
                    <div class="form-field">
                        <label for="foto1-articulo-0">Foto 1</label>
                        <input name= "foto1-articulo-0" type="file" accept=".jpg, .png" required>
                    </div>
                    <div class="form-field">
                        <label for="foto2-articulo-0">Foto 2</label>
                        <input name= "foto2-articulo-0" type="file" accept=".jpg, .png" required>
                    </div>
                </div>

                <div class="form-field">
                    <label for="observaciones-articulo-0">Observaciones</label>
                    <textarea name="observaciones-articulo-0"></textarea>
                </div>
            </div>
        </div>

        <div class="publicar-buttons">
            <button name="anadir-articulo" class="small-button">Añadir artículo</button>
            <button name="publicar" class="small-button">Publicar</button>
        </div>
    </x-slot>
</x-general.layout>
