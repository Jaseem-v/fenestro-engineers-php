$(window).on('scroll', function () {
    if ($(window).scrollTop() > 200) {
        $('#nav').addClass('sticky')
    } else {
        $('#nav').removeClass('sticky')
    }
});


document.querySelectorAll(".nav__li a").forEach((nav) => {
    nav.classList.remove('active');

    if (nav.href === window.location.href) {
        nav.classList.add('active');
    }
})


console.log(window.location);
/// slider



$('.testimonials__slider').slick({
    dots: false,
    infinite: true,
    speed: 1200,
    slidesToShow: 2,
    centerMode: true,
    // variableWidth: true,
    slidesToScroll: 2,
    // autoplay: true,
    // autoplaySpeed: 1000,
    draggable: true,
    pauseOnFocus: false,

    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                // infinite: true,
                // dots: true
            }
        },
        {
            breakpoint: 900,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});

$('.services-two__carousel').slick({
    dots: false,
    infinite: true,
    speed: 1200,
    slidesToShow: 3,
    // centerMode: true,
    // variableWidth: true,
    slidesToScroll: 3,
    autoplay: true,
    autoplaySpeed: 1000,
    draggable: true,
    pauseOnFocus: false,
    loop: true,
    // initialSlide: 1,
    rtl: false,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                // infinite: true,
                // dots: true
            }
        },
        {
            breakpoint: 900,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});





$('.projects__btn').magnificPopup({
    type: 'image',
    gallery: {
        enabled: true
    }
})


var maxWidth = window.matchMedia("(max-width: 992px)");
var maxSmallWidth = window.matchMedia("(max-width: 600px)");

const galleryContainer = document.querySelector("#gallery-content")
if (galleryContainer) {
    jQuery("#gallery-content")
        .justifiedGallery({
            captions: false,
            // lastRow: "hide",
            rowHeight: maxSmallWidth ? 400 : maxWidth.matches ? 200 : 400,
            margins: 5
        })
}

//// slider

var swiper = new Swiper(".testimonial__slider .mySwiper", {
    effect: "coverflow",
    centeredSlides: true,
    // autoplay: {
    // 	delay: 3000,
    // 	disableOnInteraction: false
    // },
    loop: false,
    slidesPerView: "2",
    coverflowEffect: {
        rotate: 0,
        stretch: 100,
        depth: 100,
        modifier: 1,
        slideShadows: true
    },
    navigation: {
        prevEl: ".testimonial__slider-btn-prev",
        nextEl: ".testimonial__slider-btn-next"
    },
    pagination: {
        // el: ".swiper-pagination",
        clickable: false
    }
});


/// slider


$('.header__slider-container').slick({
    dots: false,
    infinite: true,
    speed: 1200,
    slidesToShow: 4,
    centerMode: true,
    // variableWidth: true,
    slidesToScroll: 3,
    autoplay: true,
    autoplaySpeed: 1000,
    draggable: true,
    pauseOnFocus: false
});
$('.clients__slider').slick({
    dots: false,
    // infinite: true,
    // speed: 1200,
    slidesToShow: 6,
    // centerMode: true,
    // variableWidth: true,
    slidesToScroll: 3,
    // autoplay: true,
    autoplaySpeed: 1000,
    draggable: true,
    pauseOnFocus: false
});





/////////////////////////////////////////////////////
// Mobile menu
const openBtn = document.querySelector(".open-btn")
const nav_list = document.querySelector(".nav__list")
const nav = document.querySelector(".nav")
const body = document.querySelector("body")
// const overlay = document.querySelector(".overlay")
// const navContact = document.querySelector(".nav-contact")

function mobileMenu() {
    openBtn.classList.toggle("active");
    nav_list.classList.toggle("active")
    body.classList.toggle("no-scrolling")
    nav.classList.toggle("active")
    // navContact.classList.toggle("hidden")
}

openBtn.addEventListener("click", mobileMenu)
// overlay.addEventListener("click", mobileMenu)




$(document).ready(function () {
    // Assign some jquery elements we'll need
    var $swiper = $(".swiper-container");
    var $bottomSlide = null; // Slide whose content gets 'extracted' and placed
    // into a fixed position for animation purposes
    var $bottomSlideContent = null; // Slide content that gets passed between the
    // panning slide stack and the position 'behind'
    // the stack, needed for correct animation style

    var mySwiper = new Swiper(".about__swiper-container", {
        spaceBetween: 1,
        slidesPerView: 1,
        // centeredSlides: true,
        roundLengths: true,
        loop: true,
        loopAdditionalSlides: 30,
        speed: 1200,
        navigation: {
            nextEl: ".about__swiper-next",
            prevEl: ".about__swiper-prev"
        },
        breakpoints: {

            640: {
                slidesPerView: 2,
                spaceBetween: 2,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 3,
            },
            1200: {
                slidesPerView: 5,
                spaceBetween: 5,
            }

        },
        autoplay: {
            delay: 1500,
            disableOnInteraction: false,
        },
    });
});





/// store the wrapper HTMLElement into a constant
const imageWrapper = document.querySelector('.img-display-swiper');
if (imageWrapper) {
    const animatedImage = imageWrapper.querySelectorAll('.AnimatedImage');
    /// then get the width and height properties
    const { offsetWidth, offsetHeight } = imageWrapper;
    /// create a timeout handler for requestAnimationFrame
    let rafTimeout = null, callTimeout = null;
    const CalculateOrigin = (event) => {
        /// get local cursor offset
        const { offsetX, offsetY } = event;
        /// we know than transform-origin centered is equal to 50% 50%
        /// so we need to handle this position with the delta between
        /// mouse position and wrapper bounds

        /// calculate deltas
        const deltaX = (100 / offsetWidth) * offsetX;
        const deltaY = (100 / offsetHeight) * offsetY;
        /// apply the style property to the image
        animatedImage.forEach(el => {
            el.style.transformOrigin = `${Math.min(100, deltaX)}% ${Math.min(100, deltaY)}%`
        })

        // 
    }

    /// add an event listener
    imageWrapper.addEventListener('mousemove', (event) => {
        if (rafTimeout) {
            window.cancelAnimationFrame(rafTimeout);
        }
        /// use requestAnimationFrame for event debouncing and animation frame improvements
        rafTimeout = window.requestAnimationFrame(() => CalculateOrigin(event));
    });



}

//////////////////////////////////////////////////
//////

var swiper3 = new Swiper(".img-thumb-swiper", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
});
var swiper4 = new Swiper(".img-display-swiper", {
    loop: true,
    spaceBetween: 10,
    freeMode: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper3,
    },
    draggable: true,
});



// function thmSwiperInit() {
// swiper slider
// const swiperElm = document.querySelectorAll(".thm-swiper__slider");
// swiperElm.forEach(function (swiperelm) {
//     const swiperOptions = JSON.parse(swiperelm.dataset.swiperOptions);
//     let thmSwiperSlider = new Swiper(swiperelm, swiperOptions);
// });
// }

// swiper slider
const swiperElm = document.querySelector(".thm-swiper__slider");
// swiperElm.forEach(function (swiperelm) {

const swiperOptions = JSON.parse(swiperElm.dataset.swiperOptions);
console.log(swiperOptions);
let thmSwiperSlider = new Swiper(swiperElm, swiperOptions);
// });


// if ($(".services-two__carousel").length) {
//     $(".services-two__carousel").owlCarousel({
//         // loop: true,
//         margin: 30,
//         nav: false,
//         smartSpeed: 500,
//         autoHeight: false,
//         // autoplay: true,
//         // dots: true,
//         item: 3,
//         autoplayTimeout: 10000,
//         navText: [
//             '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
//             '<i class="fa fa-angle-double-right" aria-hidden="true"></i>'
//         ],
//         responsive: {
//             0: {
//                 items: 1
//             },
//             600: {
//                 items: 1
//             },
//             800: {
//                 items: 2
//             },
//             1000: {
//                 items: 3
//             },
//             1350: {
//                 items: 3
//             },
//             2000:{
//                 items:4
//             }
//         }
//     });
// }


const testiPopupBtn = document.querySelector(".testimonial__popup .contact__form h6")
const testiPopup = document.querySelector(".testimonial__popup")
const feedBtn = document.querySelector(".testimonial__feedback-btn")

if (testiPopup) {
    feedBtn.addEventListener("click", () => {
        testiPopup.classList.toggle("active")
        body.classList.toggle("no-scrolling")
    })

    testiPopupBtn.addEventListener("click", () => {
        testiPopup.classList.remove("active")
        body.classList.toggle("no-scrolling")
    })
}