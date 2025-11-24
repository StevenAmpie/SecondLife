
function activeArrowBtn(media_query){



    if (media_query.matches) {
        let article_container = document.querySelectorAll('.images-articles-layout');

        article_container.forEach(function (container){

            let images_container = container.getElementsByTagName("img");
            let imagen1 = [images_container[0].src, images_container[0].alt];
            let imagen2 = [images_container[1].src, images_container[1].alt];
            container.innerHTML = `

                    <button class="arrow-btn" style="visibility: hidden;">
                        <img src="/images/arrow-btn-left.png" alt="arrow-btn-left" width="100%" height="50%">
                    </button>
                    <div class="images-container">
                        <img src="${images_container[0].src}" alt="${images_container[0].alt}" width="150" height="150">
                        <img src="${images_container[1].src}" alt="${images_container[1].alt}"
                                style="display: none;" width="150" height="150">
                    </div>
                    <button class="arrow-btn">
                                <img src="/images/arrow-btn-right.png" alt="arrow-btn-right" width="100%" height="50%">
                    </button>
            `
            changeVisibility(container, imagen1, imagen2)
        })
    } else {

        let article_container = document.querySelectorAll('.images-articles-layout');


        article_container.forEach(function (container){

            let card = container.querySelector('.images-container');
            let images_card = card.getElementsByTagName('img');
            let imagen1 = [images_card[0].src, images_card[0].alt];
            let imagen2 = [images_card[1].src, images_card[1].alt];
            container.innerHTML = `

                     <div class="article_image">
                        <img src="${imagen1[0]}" alt="${imagen1[1]}" width="180" height="180">
                     </div>

                     <div class="article_image">
                        <img src="${imagen2[0]}" alt="${imagen2[1]}" width="180" height="180">
                    </div>

            `;
        });
    }
}
function changeVisibility(container){

    const arrows = container.getElementsByTagName('button');
    const card = container.querySelector('.images-container');
    const img = card.getElementsByTagName('img')

    arrows[0].addEventListener('click', function(){

        arrows[0].style.visibility = 'hidden';
        arrows[1].style.visibility = 'visible';


        img[0].style.display = 'block';
        img[1].style.display = 'none';

    })
    arrows[1].addEventListener('click', function (){


        arrows[0].style.visibility = 'visible';
        arrows[1].style.visibility = 'hidden'

        img[0].style.display = 'none';
        img[1].style.display = 'block';




    })

}

const media_query = window.matchMedia("(max-width: 480px)");

media_query.addEventListener("change", activeArrowBtn);

activeArrowBtn(media_query)
