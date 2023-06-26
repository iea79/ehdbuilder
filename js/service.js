$(document).ready(function () {
    doTabs();
    collapsed();
    const projects = new Swiper('.swiper_projects_js', {
        slidesPerView: 1,
        spaceBetween: 10,
        speed: 500,
        loop: true,

        navigation: {
            nextEl: '.projects .icon_arrow_right',
            prevEl: '.projects .icon_arrow_left',
        },
        pagination: {
            el: '.projects_dotted_js',
            clickable: true,
        },

        breakpoints: {
            768: {
                spaceBetween: 16,
                slidesPerView: 2,
            },
        },
    });
    const services = new Swiper('.swiper_services_js', {
        slidesPerView: 1,
        spaceBetween: 10,
        speed: 500,
        loop: true,
        // autoplay: {
        //     delay: 5000,
        // },

        navigation: {
            nextEl: '.icon_arrow_right',
            prevEl: '.icon_arrow_left',
        },
        pagination: {
            el: '.services_dotted_js',
            clickable: true,
        },

        breakpoints: {
            768: {
                spaceBetween: 20,
                slidesPerView: 3,
            },
        },
    });
    $('.runningLine__content').marquee({
        duration: 60000,
        startVisible: true,
        duplicated: true,
    });
});
function doTabs() {
    $('.tabs__wrapper').each(function () {
        let ths = $(this);
        ths.find('.tab__item').not(':first').hide();
        ths.find('.tab')
            .click(function () {
                ths.find('.tab').removeClass('active').eq($(this).index()).addClass('active');
                ths.find('.tab__item').hide().eq($(this).index()).fadeIn();
            })
            .eq(0)
            .addClass('active');
    });
}
function collapsed() {
    let toggle = $('[data-collapse]');

    toggle.on('click', function () {
        let id = $(this).data('collapse'),
            body = $('[data-collapse-body="' + id + '"]'),
            wrap = body.closest('[data-collapse-wrapper]');

        if (!id) {
            // $('[data-collapse-wrapper]').removeClass('open');
            body = $(this).parent().find('[data-collapse-body]');
            $(this).toggleClass('open');
            if ($(this).hasClass('open')) {
                body.slideDown();
            } else {
                body.slideUp();
            }
        } else if (id === 'all') {
            body.slideDown();
            toggle.addClass('open');
        } else {
            body.slideToggle();
            $(this).toggleClass('open');
        }
    });
}
