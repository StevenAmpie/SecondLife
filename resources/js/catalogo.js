
const main_container = document.getElementById('main');
const first_section_in_main = document.getElementById("filters_block");
const filter_btn = document.getElementById("filters-button_id");
const background_catalogo = document.getElementById('catalogo_id')
const filters_component = document.getElementById('filters_block');

const filters_mobile_container = document.createElement('section');

const filter_title_mobile = document.createElement('h1');
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

filters_mobile_container.className = 'filters_mobile';
filters_mobile_container.id = 'filters-mobile-container-id';


filter_btn.addEventListener('click', function (event){

    if(document.getElementById('filters-mobile-container-id')){
        filters_mobile_container.remove();

    }else{
        main_container.insertBefore(filters_mobile_container, first_section_in_main)

    }

});

background_catalogo.addEventListener('click', function (event){

    filters_mobile_container.remove();


});









