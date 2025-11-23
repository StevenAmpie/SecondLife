<x-general.layout>
    <x-slot name="publish_style">
        @vite(['resources/css/publish_style.css'])
    </x-slot>

    <x-slot name="publish_script">
        @vite(['resources/js/publish_script.js'])
    </x-slot>

    <x-slot name="publish_main">
        <h1>PUBLICAR</h1>
        <form action="" method="post">
            <fieldset class="publish-general-details">
                <div class="form-field">
                    <label for="title">Título</label>
                    <input name="title" type="text" required>
                </div>
                <div class="form-field">
                    <label for="description">Descripción</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="row-form-fields">
                    <div class="form-field">
                        <label for="price">Precio</label>
                        <input name= "price" type="number" value="0.00" min="0.01" step="1.00" required>
                    </div>
                    <div class="form-field">
                        <label for="front">Portada</label>
                        <input name= "front" type="file" accept=".jpg, .png" required>
                    </div>
                </div>
            </fieldset>
            <div class="publish-articles">
                <input name="article_quantity" type="hidden">
                <fieldset class="article-fieldset">
                    <h2>Artículo 1</h2>
                    <div class="form-field">
                        <label for="name_article_0">Nombre</label>
                        <input name="name_article_0" type="text" required>
                    </div>
                    <div class="row-form-fields">
                        <div class="form-field">
                            <label for="kind_article_0">Tipo</label>
                            <select name="kind_article_0" required>
                                <option value="Suéter">Suéter</option>
                                <option value="Pantalón">Pantalón</option>
                                <option value="Calzado">Calzado</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <label for="brand_article_0">Marca</label>
                            <select name="brand_article_0" required>
                            </select>
                        </div>
                    </div>
                    <div class="row-form-fields">
                        <div class="form-field">
                            <label for="size_article_0">Talla</label>
                            <input name="size_article_0" type="text" required>
                        </div>
                        <div class="form-field">
                            <label for="color_article_0">Color</label>
                            <select name="color_article_0" required>
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
                            <label for="photo1_article_0">Foto 1</label>
                            <input name= "photo1_article_0" type="file" accept=".jpg, .png" required>
                        </div>
                        <div class="form-field">
                            <label for="photo2_article_0">Foto 2</label>
                            <input name= "photo2_article_0" type="file" accept=".jpg, .png" required>
                        </div>
                    </div>
                    <div class="form-field">
                        <label for="observations_article_0">Observaciones</label>
                        <textarea name="observations_article_0"></textarea>
                    </div>
                    <button name="delete_article_0" class="small-button">Eliminar artículo</button>
                </fieldset>
            </div>
            <div class="publish-buttons">
                <button name="add_article" class="small-button">Añadir artículo</button>
                <button type="submit" name="publish" class="small-button">Publicar</button>
            </div>
        </form>
    </x-slot>
</x-general.layout>
