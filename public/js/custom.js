var header = $('.navbar');
var toggler = $('.navbar-toggler');

window.onscroll = function (e) {
    if (window.scrollY >= 50 && toggler.attr('aria-expanded') === 'false') {
        header.removeClass('header');
        header.addClass('header_active');
    } else {
        header.removeClass('header_active');
        header.addClass('header');
    }
};

toggler.on('click', function () {
    header.removeClass('header_active');
    header.addClass('header');
});

var swiper = new Swiper('.mySwiper', {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 3,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    }
});

gsap.registerPlugin(ScrollTrigger),
    ScrollTrigger.matchMedia({
        all: function () {
            let about = gsap.timeline({
                scrollTrigger: {
                    trigger: '#aboutUs',
                    start: '-=150px center'
                }
            });
            about.from('.about img', {
                y: 130,
                opacity: 0,
                duration: 0.7
            });
            about.from('.about h1', {
                x: 100,
                opacity: 0,
                duration: 0.7
            });
            about.from('.about p', {
                x: 100,
                opacity: 0,
                duration: 0.7
            });

            let good_sidses = gsap.timeline({
                scrollTrigger: {
                    trigger: '.advantages',
                    start: '-=150px center'
                }
            });
            good_sidses.from('.good__sides__h1', {
                y: 100,
                opacity: 0,
                duration: 0.7
            });
            good_sidses.from('.good__sides', {
                y: 100,
                opacity: 0,
                duration: 0.7
            });

            let example = gsap.timeline({
                scrollTrigger: {
                    trigger: '#example',
                    start: '-=150px center'
                    // markers: true,
                }
            });
            example.from('.example__title', {
                y: -100,
                opacity: 0,
                duration: 0.7
            });

            let prices = gsap.timeline({
                scrollTrigger: {
                    trigger: '#prices',
                    start: '-=150px center'
                    // markers: true,
                }
            });
            prices.from('#prices h1', {
                y: -100,
                opacity: 0,
                duration: 0.7
            });

            prices.from('.price__effect1', {
                y: -100,
                opacity: 0,
                duration: 0.7
            }, 0.2);

            prices.from('.price__effect2', {
                y: -100,
                opacity: 0,
                duration: 0.7
            }, 0.3);

            prices.from('.price__effect3', {
                y: -100,
                opacity: 0,
                duration: 0.7
            }, 0.4);

            prices.from('.price__effect4', {
                y: -100,
                opacity: 0,
                duration: 0.7
            }, 0.5);

            let fff = gsap.timeline({
                scrollTrigger: {
                    trigger: '.footer__title',
                    start: '-=150px center'
                    //markers: true,
                }
            });
            fff.from('#contact', {
                y: -100,
                opacity: 0,
                duration: 0.7
            });
        }
    });