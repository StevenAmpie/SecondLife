
const main_container = document.getElementById('main');
const first_section_in_main = document.getElementById("filters_block");
const background_catalogo = document.getElementById('catalogo_id')
const filters_component = document.getElementById('filters_block');

const filters_mobile_container = document.createElement('form');

const filter_title_mobile = document.createElement('h2');
filter_title_mobile.innerText = 'Filtros';
filter_title_mobile.id = 'filter-title-mobile-id';

const checkBoxes_filters_mobile = document.createElement('section');
checkBoxes_filters_mobile.innerHTML = filters_component.innerHTML;
const h3_filters_component = checkBoxes_filters_mobile.getElementsByTagName('h3')[0];
const btn_filters_component = checkBoxes_filters_mobile.getElementsByTagName('button')[0];
checkBoxes_filters_mobile.removeChild(h3_filters_component);
checkBoxes_filters_mobile.removeChild(btn_filters_component);
checkBoxes_filters_mobile.id = 'checkBoxes-filters-mobile-id';

const filter_btn_mobile = document.createElement('button');
filter_btn_mobile.innerText = 'Filtrar';
filter_btn_mobile.id = 'filter-btn-mobile-id'

filters_mobile_container.appendChild(filter_title_mobile);
filters_mobile_container.appendChild(checkBoxes_filters_mobile);
filters_mobile_container.appendChild(filter_btn_mobile);

const root = document.getElementById('filters_block');

filters_mobile_container.action = root.action;
filters_mobile_container.method = 'GET';
filters_mobile_container.className = 'filters_mobile';
filters_mobile_container.id = 'filters-mobile-container-id';

const media_query = window.matchMedia("(max-width: 480px)");
const filters_btn = document.createElement('button');

function handleFilters(e) {

    const search_container = document.querySelector('.search-container');

    if (e.matches) {

        if (!document.getElementById('filters-button-id')) {


            filters_btn.innerHTML = `
                <img id="filter-img" src="http://localhost:8000/images/filters-icon.png" alt="Botón de filtros">
            `;
            filters_btn.type = 'button';
            filters_btn.className = 'filters-button';
            filters_btn.id = 'filters-button-id';

            if (search_container) {
                search_container.insertBefore(filters_btn, search_container.firstChild);
            }
        }

    } else {
        const btn = document.getElementById('filters-button-id');
        if (btn) btn.remove();
    }
}

handleFilters(media_query);


media_query.addEventListener("change", handleFilters);

filters_btn.addEventListener('click', function (){

if(document.getElementById('filters-mobile-container-id')){
    filters_mobile_container.remove();

}else{
    main_container.insertBefore(filters_mobile_container, first_section_in_main)

}

});
    background_catalogo.addEventListener('click', function (){

    filters_mobile_container.remove();
});
