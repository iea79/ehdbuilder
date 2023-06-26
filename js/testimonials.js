document.addEventListener('DOMContentLoaded', function () {
    const sliders = document.querySelectorAll('.swiper_testimonials2_js');
    console.log(sliders);
    sliders.forEach((slider) => {
        const next = slider.querySelector('.icon_arrow_right');
        const prev = slider.querySelector('.icon_arrow_left');
        new Swiper(slider, {
            slidesPerView: 1,
            speed: 500,
            loop: true,

            navigation: {
                nextEl: next,
                prevEl: prev,
            },
        });
        // console.log(swiper);
    });

    const videoWrappers = document.querySelectorAll('.video__wrap');
    videoWrappers.forEach((wrapper) => {
        const btn = wrapper.querySelector('.video__play');
        const video = wrapper.querySelector('video');

        btn.addEventListener('click', (e) => {
            btn.classList.toggle('played');
            if (btn.classList.contains('played')) {
                video.play();
            } else {
                video.pause();
            }
        });

        video.addEventListener('ended', () => {
            btn.classList.remove('played');
        });
    });
});
