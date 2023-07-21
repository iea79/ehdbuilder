/*!
 *
 * Evgeniy Ivanov - 2018
 * busforward@gmail.com
 * Skype: ivanov_ea
 *
 */

var app = {
    pageScroll: '',
    lgWidth: 1200,
    mdWidth: 992,
    smWidth: 768,
    resized: false,
    iOS: function () {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    touchDevice: function () {
        return navigator.userAgent.match(/iPhone|iPad|iPod|Android|BlackBerry|Opera Mini|IEMobile/i);
    },
};

function isLgWidth() {
    return $(window).width() >= app.lgWidth;
} // >= 1200
function isMdWidth() {
    return $(window).width() >= app.mdWidth && $(window).width() < app.lgWidth;
} //  >= 992 && < 1200
function isSmWidth() {
    return $(window).width() >= app.smWidth && $(window).width() < app.mdWidth;
} // >= 768 && < 992
function isXsWidth() {
    return $(window).width() < app.smWidth;
} // < 768
function isIOS() {
    return app.iOS();
} // for iPhone iPad iPod
function isTouch() {
    return app.touchDevice();
} // for touch device

$(document).ready(function () {
    // Хак для клика по ссылке на iOS
    if (isIOS()) {
        $(function () {
            $(document).on('touchend', 'a', $.noop);
        });
    }

    // Запрет "отскока" страницы при клике по пустой ссылке с href="#"
    $('[href="#"]').click(function (event) {
        event.preventDefault();
    });

    // Inputmask.js
    // $('[name=tel]').inputmask("+9(999)999 99 99",{ showMaskOnHover: false });
    // formSubmit();

    checkOnResize();
    toggleMenu();
    animateHeadImage();

    // stikyMenu();

    document.querySelector('.goBack').addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});

$(window).resize(function (event) {
    var windowWidth = $(window).width();
    // Запрещаем выполнение скриптов при смене только высоты вьюпорта (фикс для скролла в IOS и Android >=v.5)
    if (app.resized == windowWidth) {
        return;
    }
    app.resized = windowWidth;

    // checkOnResize();
});

function checkOnResize() {}

function toggleMenu() {
    const toggle = document.querySelectorAll('.navbar__toggle');
    const navbar = document.querySelector('.navbar');
    const mainNav = navbar.querySelector('.navbar__nav');
    const navbarItem = mainNav.querySelectorAll('.navbar__nav .menu-item');
    const navbarImagesWrap = navbar.querySelector('.navbar__img');
    const navbarSoc = navbar.querySelectorAll('.navbar__soc .menu-item');
    const navbarFooter = navbar.querySelector('.navbar__adress');
    const tl = gsap.timeline({ duration: 0.7 });

    navbarItem.forEach((item) => {
        const img = item.querySelector('img');
        const id = item.id;
        if (img) {
            img.dataset.id = id;
            navbarImagesWrap.appendChild(img);

            if (item.classList.contains('current-menu-item')) {
                img.classList.add('show');
            }
        }

        item.addEventListener('mouseenter', (e) => {
            const imgs = document.querySelectorAll('.navbar img');
            imgs.forEach((el) => {
                el.classList.remove('show');
            });
            if (img) {
                img.classList.add('show');
                gsap.from(img, { yPercent: -100 });
            }
        });
    });

    toggle.forEach((el) => {
        el.addEventListener('click', (e) => {
            toggle.forEach((tog) => {
                tog.classList.toggle('active');
            });
            navbar.classList.toggle('open');

            if (navbar.classList.contains('open') && !isXsWidth()) {
                tl.from(navbarItem, { stagger: 0.1, opacity: 0, y: 20 });
                tl.from(navbarImagesWrap, { width: 0 });
                tl.from(navbarFooter, { y: 30, opacity: 0 });
                tl.from(navbarSoc, { stagger: 0.1, opacity: 0, y: 20 });
            } else {
            }
        });
    });
}

function animateHeadImage() {
    const head = document.querySelector('.head');
    const headImgWrap = document.querySelector('.head__img');
    const headImg = document.querySelector('.head__img img');
    if (!isXsWidth() && headImg) {
        gsap.registerPlugin(ScrollTrigger);
        gsap.to(headImg, {
            ease: 'linear',
            duration: 0.01,
            delay: 0,
            yPercent: 10,
            width: headImgWrap.offsetWidth + 100,
            height: head.offsetHeight + 100,
            scrollTrigger: {
                trigger: head,
                start: 'top top',
                end: '80% top',
                scrub: 1,
                // markers: true,
            },
        });
    }
}
