$('.owl-carousel').owlCarousel({
    loop: false,
    margin: 48,
    nav: true,
    navText: [
        "<div style='padding:10px;'><i data-feather='chevron-left'></i></div>",
        "<div style='padding:10px;'><i data-feather='chevron-right'></i></div>"
    ],
    stagePadding: 40,
    responsive: {
        0: {
            items: 1,
        },
        992: {
            items: 3,
        }
    }
})
feather.replace();


/** Quantity input field */

document.addEventListener('DOMContentLoaded', function () {
  const input = document.querySelector('.shop-quantity .form-control');
  const minusSign = document.querySelector('.shop-quantity .sign.minus');
  const plusSign = document.querySelector('.shop-quantity .sign.plus');

  if(minusSign) {
    minusSign.addEventListener('click', function () {
     if(!input.value){
       input.value = 0;
     }
     input.value = Math.max(parseInt(input.value) - 1, 0);
    });
  }

  if(plusSign) {
      plusSign.addEventListener('click', function () {
          if (!input.value) {
              input.value = 0;
          }
          input.value = parseInt(input.value) + 1;
      });
  }
});


/** Gallery in catalog page */
$('.slider-galeria').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  infinite: false,
  asNavFor: '.slider-galeria-thumbs',
});
$('.slider-galeria-thumbs').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  arrows: false,
  asNavFor: '.slider-galeria',
  vertical: true,
  verticalSwiping: true,
  focusOnSelect: true,
  infinite: false,
  swipeToSlide: true,
});

function checkOverflow(divElement) {

    element = divElement.children[1].firstElementChild;
    if (element.offsetWidth < element.scrollWidth) {
        element.classList.add('overflowing');
    } else {
        element.classList.remove('overflowing');
    }
}
