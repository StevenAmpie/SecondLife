
function activeArrowBtn(media_query){

    const article_container = document.querySelectorAll('.images-articles-layout');
    if (media_query.matches) {

        article_container.forEach(function (container){

            container.innerHTML = `

                    <button class="arrow-btn" style="visibility: hidden;">
                        <img src="/images/arrow-btn-left.png" alt="arrow-btn-left" width="100%" height="50%">
                    </button>
                    <img src="/images/portada-publicacion3.jpg" alt="pantalones" width="150" height="150">
                    <button class="arrow-btn">
                                <img src="/images/arrow-btn-right.png" alt="arrow-btn-right" width="100%" height="50%">
                    </button>
            `
            changeVisibility(container)
        })
    } else {
        article_container.forEach(function (container){

            container.innerHTML = `

                     <div class="article_image">
                          <img src="/images/portada-publicacion3.jpg" alt="pantalones1" width="180" height="180">
                     </div>

                     <div class="article_image">
                        <img src="/images/portada-publicacion2.jpg" alt="pantalones2" width="180" height="180">
                    </div>

            `;
        });
    }
}
function changeVisibility(container){

    const arrows = container.getElementsByTagName('button');
    const img = container.getElementsByTagName('img');
    arrows[0].addEventListener('click', function(){

        arrows[0].style.visibility = 'hidden';
        arrows[1].style.visibility = 'visible';
        img[1].src = "/images/portada-publicacion3.jpg";

    })
    arrows[1].addEventListener('click', function (){

        arrows[0].style.visibility = 'visible';
        arrows[1].style.visibility = 'hidden';
        img[1].src = "/images/portada-publicacion2.jpg";

    })


}

const media_query = window.matchMedia("(max-width: 480px)");

media_query.addEventListener("change", activeArrowBtn);

activeArrowBtn(media_query)
