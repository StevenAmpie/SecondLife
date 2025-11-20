<x-general.layout>

    <x-slot name="general_details_style">
        @vite(['resources/css/general_details_style.css'])
    </x-slot>

    <x-slot name="general_details_main">
        <form action="" method="post">
            <div class="publish-general-details">
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
                <div class="save-button">
                    <button type="submit" name="save" class="small-button">Guardar</button>
                </div>
            </div>
        </form>
    </x-slot>

</x-general.layout>
