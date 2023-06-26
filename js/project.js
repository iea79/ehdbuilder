const projects = new Swiper('.swiper_projects_js', {
    slidesPerView: 2,
    spaceBetween: 10,
    speed: 500,
    loop: true,

    navigation: {
        nextEl: '.icon_arrow_right',
        prevEl: '.icon_arrow_left',
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
