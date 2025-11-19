document.addEventListener('DOMContentLoaded', function() {
    const add_article_button = document.querySelector('button[name="add_article"]');
    const articles_container = document.querySelector('.publish-articles');
    const quantity_input = document.querySelector('input[name="article_quantity"]');

    // Marcas por tipo
    const brands_per_kind = {
        'Suéter': ['Levi\'s', 'Nike', 'Puma', 'Calvin Klein', 'Adidas'],
        'Pantalón': ['Levi\'s', 'Dockers', 'Tommy Hilfiger', 'Lee', 'Wrangler'],
        'Calzado': ['Nike', 'Adidas', 'Converse', 'Reebok', 'Vans']
    };

    // Función para actualizar las opciones de marca según el tipo
    function updateBrands(kind_select, brand_select) {
        const kind = kind_select.value;
        const brands = brands_per_kind[kind] || [];

        brand_select.innerHTML = '';

        brands.forEach(brand => {
            const option = document.createElement('option');
            option.value = brand;
            option.textContent = brand;
            brand_select.appendChild(option);
        });
    }

    // Función para crear el HTML de un nuevo artículo
    function createArticleHTML(index) {
        return `
            <h2>Artículo ${index + 1}</h2>
            <div class="form-field">
                <label for="name_article_${index}">Nombre</label>
                <input name="name_article_${index}" type="text" required>
            </div>
            <div class="row-form-fields">
                <div class="form-field">
                    <label for="kind_article_${index}">Tipo</label>
                    <select name="kind_article_${index}" required>
                        <option value="Suéter">Suéter</option>
                        <option value="Pantalón">Pantalón</option>
                        <option value="Calzado">Calzado</option>
                    </select>
                </div>
                <div class="form-field">
                    <label for="brand_article_${index}">Marca</label>
                    <select name="brand_article_${index}" required>
                    </select>
                </div>
            </div>
            <div class="row-form-fields">
                <div class="form-field">
                    <label for="size_article_${index}">Talla</label>
                    <input name="size_article_${index}" type="text" required>
                </div>
                <div class="form-field">
                    <label for="color_article_${index}">Color</label>
                    <select name="color_article_${index}" required>
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
                    <label for="photo1_article_${index}">Foto 1</label>
                    <input name="photo1_article_${index}" type="file" accept=".jpg, .png" required>
                </div>
                <div class="form-field">
                    <label for="photo2_article_${index}">Foto 2</label>
                    <input name="photo2_article_${index}" type="file" accept=".jpg, .png" required>
                </div>
            </div>
            <div class="form-field">
                <label for="observations_article_${index}">Observaciones</label>
                <textarea name="observations_article_${index}"></textarea>
            </div>
            <button name="delete_article_${index}" class="small-button">Eliminar artículo</button>
        `;
    }

    // Función para reindexar todos los artículos
    function reindexArticles() {
        const articles = document.querySelectorAll('.article-fieldset');

        articles.forEach((article, new_index) => {
            // Actualizar título
            const h2 = article.querySelector('h2');
            if (h2) {
                h2.textContent = `Artículo ${new_index + 1}`;
            }

            // Actualizar todos los campos
            const fields = [
                'name_article',
                'kind_article',
                'brand_article',
                'size_article',
                'color_article',
                'photo1_article',
                'photo2_article',
                'observations_article'
            ];

            fields.forEach(field => {
                const element = article.querySelector(`[name^="${field}"]`);
                if (element) {
                    const new_field = `${field}_${new_index}`;
                    element.setAttribute('name', new_field);

                    // Actualizar los labels
                    const label = article.querySelector(`label[for^="${field}"]`);
                    if (label) {
                        label.setAttribute('for', new_field);
                    }
                }
            });

            // Actualizar el botón de eliminar
            const delete_button = article.querySelector('[name^="delete_article_"]');
            if (delete_button) {
                delete_button.setAttribute('name', `delete_article_${new_index}`);
            }
        });

        // Actualizar la cantidad
        quantity_input.value = articles.length;
    }

    // Inicializar la cantidad con la cantidad actual de artículos
    quantity_input.value = document.querySelectorAll('.article-fieldset').length;

    // Inicializar las marcas para el artículo inicial
    const initial_kind = document.querySelector('select[name="kind_article_0"]');
    const initial_brand = document.querySelector('select[name="brand_article_0"]');
    if (initial_kind && initial_brand) {
        updateBrands(initial_kind, initial_brand);
    }

    // Listener global para cambios en los select de tipo
    document.addEventListener('change', function(e) {
        if (e.target.name && e.target.name.startsWith('kind_article_')) {
            const index = e.target.name.split('_')[2];
            const brand_select = document.querySelector(`select[name="brand_article_${index}"]`);
            if (brand_select) {
                updateBrands(e.target, brand_select);
            }
        }
    });

    // Listener para añadir artículos
    add_article_button.addEventListener('click', function(e) {
        e.preventDefault();

        const new_index = parseInt(quantity_input.value);

        const new_article = document.createElement('div');
        new_article.className = 'article-fieldset';
        new_article.innerHTML = createArticleHTML(new_index);

        articles_container.appendChild(new_article);

        // Inicializar las marcas para el nuevo artículo
        const new_kind_select = new_article.querySelector(`select[name="kind_article_${new_index}"]`);
        const new_brand_select = new_article.querySelector(`select[name="brand_article_${new_index}"]`);
        updateBrands(new_kind_select, new_brand_select);

        quantity_input.value = new_index + 1;
    });

    // Listener global para eliminar artículos
    document.addEventListener('click', function(e) {
        if (e.target.name && e.target.name.startsWith('delete_article_')) {
            e.preventDefault();

            // Comprobar que no es el único artículo
            const articles = document.querySelectorAll('.article-fieldset');
            if (articles.length <= 1) {
                alert('Debe haber al menos un artículo en la publicación.');
                return;
            }

            // Confirmar eliminación
            if (confirm('¿Estás seguro de que deseas eliminar este artículo?')) {
                const article = e.target.closest('.article-fieldset');
                article.remove();
                reindexArticles();
            }
        }
    });
});
