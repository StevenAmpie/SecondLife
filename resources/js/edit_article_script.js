document.addEventListener('DOMContentLoaded', function() {
    const kind_select = document.querySelector('select[name="kind"]');
    const brand_select = document.querySelector('select[name="brand"]');

    // Marca inicial del artículo
    const initial_brand = brand_select.dataset.currentBrand;

    // Marcas por tipo de artículo
    const brand_per_type = {
        'Suéter': ['Levi\'s', 'Nike', 'Puma', 'Calvin Klein', 'Adidas'],
        'Pantalón': ['Levi\'s', 'Dockers', 'Tommy Hilfiger', 'Lee', 'Wrangler'],
        'Calzado': ['Nike', 'Adidas', 'Converse', 'Reebok', 'Vans']
    };

    // Función para actualizar las opciones de marca según el tipo
    function updateBrands() {
        const kind = kind_select.value;
        const brands = brand_per_type[kind] || [];
        const current_brand = brand_select.value || initial_brand;

        brand_select.innerHTML = '';

        brands.forEach(brand => {
            const option = document.createElement('option');
            option.value = brand;
            option.textContent = brand;

            // Mantener la selección si la marca existe en el nuevo tipo
            if (brand === current_brand) {
                option.selected = true;
            }

            brand_select.appendChild(option);
        });

        // Si la marca actual no está en las nuevas opciones, seleccionar la primera
        if (!brands.includes(current_brand) && brands.length > 0) {
            brand_select.value = brands[0];
        }
    }

    // Carga inicial del select de marcas
    updateBrands();

    // Listener para cambios en el select de tipo
    kind_select.addEventListener('change', updateBrands);
});
