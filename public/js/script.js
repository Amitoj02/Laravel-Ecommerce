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

// For showing animation of overflowing titles in the listing
function checkOverflow(divElement) {

    element = divElement.children[1].firstElementChild;
    if (element.offsetWidth < element.scrollWidth) {
        element.classList.add('overflowing');
    } else {
        element.classList.remove('overflowing');
    }
}

// Triggers register account modal
function showRegister() {
    document.getElementById('text-create-account').click();
}

// Triggers login account modal
function showLogin() {
    document.getElementById('nav-profile-icon').click();
}

// Rating bar form in the catalog page
function rb(star) {
    ratingBar = $('#rating_bar').children();
    ratingBar.removeClass('fa-star fa-star-o');
    $('#form_review_star').val(star);
    for (i = 0; i < 5; i++) {
        if(star > i) {
            $(ratingBar[i]).addClass('fa-star');
        } else {
            $(ratingBar[i]).addClass('fa-star-o');
        }
    }
}
