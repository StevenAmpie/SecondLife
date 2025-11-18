document.addEventListener('DOMContentLoaded', function() {
    const BOTON_ANADIR_ARTICULO = document.querySelector('button[name="anadir-articulo"]');
    const CONTENEDOR_ARTICULO = document.querySelector('.publicar-articulos');
    const INPUT_CANTIDAD = document.querySelector('input[name="cantidad-articulos"]');

    // Marcas por tipo de artículo
    const MARCAS_POR_TIPO = {
        'Suéter': ['Levi\'s', 'Nike', 'Puma', 'Calvin Klein', 'Adidas'],
        'Pantalón': ['Levi\'s', 'Dockers', 'Tommy Hilfiger', 'Lee', 'Wrangler'],
        'Calzado': ['Nike', 'Adidas', 'Converse', 'Reebok', 'Vans']
    };

    // Función para actualizar las opciones de marca según el tipo
    function actualizarMarcas(select_tipo, select_marca) {
        const TIPO = select_tipo.value;
        const MARCAS = MARCAS_POR_TIPO[TIPO] || [];

        select_marca.innerHTML = '';

        MARCAS.forEach(marca => {
            const OPTION = document.createElement('option');
            OPTION.value = marca;
            OPTION.textContent = marca;
            select_marca.appendChild(OPTION);
        });
    }

    // Función para crear el HTML de un nuevo artículo
    function crearArticuloHTML(indice) {
        return `
            <h2>Artículo ${indice + 1}</h2>

            <div class="form-field">
                <label for="nombre-articulo-${indice}">Nombre</label>
                <input name="nombre-articulo-${indice}" type="text" required>
            </div>

            <div class="row-form-fields">
                <div class="form-field">
                    <label for="tipo-articulo-${indice}">Tipo</label>
                    <select name="tipo-articulo-${indice}" required>
                        <option value="Suéter">Suéter</option>
                        <option value="Pantalón">Pantalón</option>
                        <option value="Calzado">Calzado</option>
                    </select>
                </div>
                <div class="form-field">
                    <label for="marca-articulo-${indice}">Marca</label>
                    <select name="marca-articulo-${indice}" required>
                    </select>
                </div>
            </div>

            <div class="row-form-fields">
                <div class="form-field">
                    <label for="talla-articulo-${indice}">Talla</label>
                    <input name="talla-articulo-${indice}" type="text" required>
                </div>
                <div class="form-field">
                    <label for="color-articulo-${indice}">Color</label>
                    <select name="color-articulo-${indice}" required>
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
                    <label for="foto1-articulo-${indice}">Foto 1</label>
                    <input name="foto1-articulo-${indice}" type="file" accept=".jpg, .png" required>
                </div>
                <div class="form-field">
                    <label for="foto2-articulo-${indice}">Foto 2</label>
                    <input name="foto2-articulo-${indice}" type="file" accept=".jpg, .png" required>
                </div>
            </div>

            <div class="form-field">
                <label for="observaciones-articulo-${indice}">Observaciones</label>
                <textarea name="observaciones-articulo-${indice}"></textarea>
            </div>

            <button name="eliminar-articulo-${indice}" class="small-button">Eliminar artículo</button>
        `;
    }

    // Función para reindexar todos los artículos
    function reindexarArticulos() {
        const ARTICULOS = document.querySelectorAll('.articulo-fieldset');

        ARTICULOS.forEach((articulo, nuevo_indice) => {
            // Actualizar el título
            const H2 = articulo.querySelector('h2');
            if (H2) {
                H2.textContent = `Artículo ${nuevo_indice + 1}`;
            }

            // Actualizar todos los campos del artículo
            const CAMPOS = [
                'nombre-articulo',
                'tipo-articulo',
                'marca-articulo',
                'talla-articulo',
                'color-articulo',
                'foto1-articulo',
                'foto2-articulo',
                'observaciones-articulo'
            ];

            CAMPOS.forEach(campo => {
                const ELEMENTO = articulo.querySelector(`[name^="${campo}"]`);
                if (ELEMENTO) {
                    const NUEVO_CAMPO = `${campo}-${nuevo_indice}`;
                    ELEMENTO.setAttribute('name', NUEVO_CAMPO);

                    // Actualizar el 'for' del label correspondiente
                    const LABEL = articulo.querySelector(`label[for^="${campo}"]`);
                    if (LABEL) {
                        LABEL.setAttribute('for', NUEVO_CAMPO);
                    }
                }
            });

            // Actualizar el botón de eliminar
            const BOTON_ELIMINAR = articulo.querySelector('[name^="eliminar-articulo-"]');
            if (BOTON_ELIMINAR) {
                BOTON_ELIMINAR.setAttribute('name', `eliminar-articulo-${nuevo_indice}`);
            }
        });

        // Actualizar el input de cantidad
        INPUT_CANTIDAD.value = ARTICULOS.length;
    }

    // Inicializar la cantidad con el número de artículos existentes
    INPUT_CANTIDAD.value = document.querySelectorAll('.articulo-fieldset').length;

    // Inicializar marcas del artículo inicial
    const TIPO_INICIAL = document.querySelector('select[name="tipo-articulo-0"]');
    const MARCA_INICIAL = document.querySelector('select[name="marca-articulo-0"]');
    if (TIPO_INICIAL && MARCA_INICIAL) {
        actualizarMarcas(TIPO_INICIAL, MARCA_INICIAL);
    }

    // Listener global para cambios en selects de tipo
    document.addEventListener('change', function(e) {
        if (e.target.name && e.target.name.startsWith('tipo-articulo-')) {
            const INDICE = e.target.name.split('-')[2];
            const SELECT_MARCA = document.querySelector(`select[name="marca-articulo-${INDICE}"]`);
            if (SELECT_MARCA) {
                actualizarMarcas(e.target, SELECT_MARCA);
            }
        }
    });

    // Listener para añadir nuevos artículos
    BOTON_ANADIR_ARTICULO.addEventListener('click', function(e) {
        e.preventDefault();

        const NUEVO_INDICE = parseInt(INPUT_CANTIDAD.value);

        const NUEVO_ARTICULO = document.createElement('div');
        NUEVO_ARTICULO.className = 'articulo-fieldset';
        NUEVO_ARTICULO.innerHTML = crearArticuloHTML(NUEVO_INDICE);

        CONTENEDOR_ARTICULO.appendChild(NUEVO_ARTICULO);

        // Inicializar las marcas del nuevo artículo
        const NUEVO_SELECT_TIPO = NUEVO_ARTICULO.querySelector(`select[name="tipo-articulo-${NUEVO_INDICE}"]`);
        const NUEVO_SELECT_MARCA = NUEVO_ARTICULO.querySelector(`select[name="marca-articulo-${NUEVO_INDICE}"]`);
        actualizarMarcas(NUEVO_SELECT_TIPO, NUEVO_SELECT_MARCA);

        INPUT_CANTIDAD.value = NUEVO_INDICE + 1;
    });

    // Listener global para eliminar artículos
    document.addEventListener('click', function(e) {
        if (e.target.name && e.target.name.startsWith('eliminar-articulo-')) {
            e.preventDefault();

            // Verificar que no sea el único artículo
            const ARTICULOS = document.querySelectorAll('.articulo-fieldset');
            if (ARTICULOS.length <= 1) {
                alert('Debe haber al menos un artículo en la publicación.');
                return;
            }

            // Confirmar eliminación
            if (confirm('¿Estás seguro de que deseas eliminar este artículo?')) {
                const ARTICULO = e.target.closest('.articulo-fieldset');
                ARTICULO.remove();
                reindexarArticulos();
            }
        }
    });
});
