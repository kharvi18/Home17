// show additional menu after section 2
$(document).ready(function () {
  $(window).on('activate.bs.scrollspy', function (event) {
    let section = $('#additionalNav').find('.active')[0].innerHTML
    let additional = $('.header-additional')

    if (section != 'Home') {
      additional.addClass('header-additional_visible')
    } else {
      additional.removeClass('header-additional_visible')
    }
  })
})

$(document).ready(function () {
  // slow scroll
  let offset = 0 //offset for click
  $('#additionalNav').on('click', 'a', function (event) {
    event.preventDefault()
    let id = $(this).attr('href'),
      top = $(id).offset().top - offset
    $('body,html').animate({scrollTop: top}, 1500)
  })
  $('#mainNav').on('click', 'a', function (event) {
    event.preventDefault()
    let id = $(this).attr('href'),
      top = $(id).offset().top - offset
    $('body,html').animate({scrollTop: top}, 1500)
  })
})

// slider
$(document).ready(function () {
  $('.portfolio__slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
          arrows: false
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  })
})

