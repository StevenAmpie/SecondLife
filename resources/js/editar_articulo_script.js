document.addEventListener('DOMContentLoaded', function() {
    const SELECT_TIPO = document.querySelector('select[name="tipo"]');
    const SELECT_MARCA = document.querySelector('select[name="marca"]');

    // Marcas por tipo de artículo
    const MARCAR_POR_TIPO = {
        'Suéter': ['Levi\'s', 'Nike', 'Puma', 'Calvin Klein', 'Adidas'],
        'Pantalón': ['Levi\'s', 'Dockers', 'Tommy Hilfiger', 'Lee', 'Wrangler'],
        'Calzado': ['Nike', 'Adidas', 'Converse', 'Reebok', 'Vans']
    };

    // Función para actualizar las opciones de marca según el tipo
    function actualizarMarcas() {
        const TIPO = SELECT_TIPO.value;
        const MARCAS = MARCAR_POR_TIPO[TIPO] || [];
        const MARCA_ACTUAL = SELECT_MARCA.value;

        SELECT_MARCA.innerHTML = '';

        MARCAS.forEach(marca => {
            const OPTION = document.createElement('option');
            OPTION.value = marca;
            OPTION.textContent = marca;

            // Mantener la selección si la marca existe en el nuevo tipo
            if (marca === MARCA_ACTUAL) {
                OPTION.selected = true;
            }

            SELECT_MARCA.appendChild(OPTION);
        });

        // Si la marca actual no está en las nuevas opciones, seleccionar la primera
        if (!MARCAS.includes(MARCA_ACTUAL) && MARCAS.length > 0) {
            SELECT_MARCA.value = MARCAS[0];
        }
    }

    // Listener para cambios en el select de tipo
    SELECT_TIPO.addEventListener('change', actualizarMarcas);
});
