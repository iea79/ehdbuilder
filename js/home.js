let firstScreenImageWidth;
// const percentWrap = document.querySelector('.loader__percent');

// function showLoader() {
//     loaderInterval = setInterval(() => {
//         if (loaderPercent <= 100) {
//             percentWrap.innerHTML = loaderPercent + '%';
//             loaderPercent++;
//         } else {
//             loaderPercent = 0;
//         }
//     }, 50);
// }

document.addEventListener('DOMContentLoaded', () => {
    // console.log('isMobile', isXsWidth());
    // showLoader();
    if (!isXsWidth()) {
        startFirstAnimations();
        initHorizontalScroll();
    }
    initTeamSlider();
    initGallerySlider();
    initReviewsSlider();
    faqListToggle();
});

async function startFirstAnimations() {
    document.body.style.overflow = 'hidden';
    const nav = document.querySelector('.navbar__wrap');
    const left = gsap.utils.toArray('.homePageFirst__left');
    const right = gsap.utils.toArray('.homePageFirst__right');
    const image = document.querySelector('.homePageFirst__image');
    const loader = document.querySelector('.loader');
    firstScreenImageWidth = image.offsetWidth;
    let tl = gsap.timeline({ duration: 0, delay: 0 });

    percentWrap.innerHTML = '100%';
    clearInterval(loaderInterval);
    tl.to(loader, {
        opacity: 0,
    });
    tl.to(loader, {
        yPercent: -100,
    });
    tl.fromTo(nav, { duration: 0.7, x: -nav.offsetWidth }, { x: 0 });
    tl.from(left, { width: 0, duration: 1.5, opacity: 0 });
    tl.from(right, { width: 0, opacity: 0 });
    await tl.from(image, { x: 300, width: 0, opacity: 0, duration: 1 });
    document.body.style.overflow = '';
    tl.to(nav, { clearProps: true });
    tl.to(left, { clearProps: true });
    tl.to(right, { clearProps: true });
    tl.to(image, { clearProps: true });
}

function initHorizontalScroll() {
    gsap.registerPlugin(ScrollTrigger, Observer);

    ScrollTrigger.defaults({ markers: { startColor: 'black', endColor: 'black' } });

    let sections = gsap.utils.toArray('.section');
    let dragRatio = 1;
    let scrollTo;
    let middleWidth = 0;

    document.querySelectorAll('.section').forEach((el) => {
        middleWidth += el.offsetWidth;
    });

    middleWidth = middleWidth - window.innerWidth;

    let scrollTween = gsap.to(sections, {
        x: -middleWidth,
        ease: 'none',
        scrollTrigger: {
            trigger: '.homePage',
            pin: true,
            scrub: 0.1,
            markers: false,
            onRefresh: (self) => {
                dragRatio = (self.end - self.start) / middleWidth;
            },
            onUpdate: (self) => {
                // console.log(self);
            },
            end: '+=' + window.innerWidth * sections.length + '',
        },
    });

    Observer.create({
        target: '.homePage',
        type: 'wheel,touch,pointer',
        onPress: (self) => {
            self.startScroll = scrollTween.scrollTrigger.scroll();
            scrollTo = gsap.quickTo(scrollTween.scrollTrigger, 'scroll', {
                duration: 0.8,
                ease: 'power3',
            });
        },
        onDrag: (self) => {
            scrollTo(self.startScroll + (self.startX - self.x) * dragRatio);
        },
    });

    // First screen
    let firstScreen = document.querySelector('.homePageFirst');
    let firstScreenImage = document.querySelector('.homePageFirst__image');
    let firstScreenImg = document.querySelector('.homePageFirst__image img');

    gsap.fromTo(
        firstScreenImage,
        { width: firstScreenImageWidth },
        {
            width: window.innerWidth,
            ease: 'none',
            scrollTrigger: {
                trigger: firstScreen,
                start: 'top top',
                end: 'bottom top',
                scrub: 1,
                containerAnimation: scrollTween,
                markers: false,
                onToggle: (self) => {},
            },
            id: 'TeamSlider',
        }
    );

    gsap.fromTo(
        firstScreenImg,
        { width: firstScreenImageWidth / 2 },
        {
            width: window.innerWidth,
            height: window.innerHeight + 50,
            ease: 'none',
            scrollTrigger: {
                trigger: firstScreen,
                start: '34% center',
                end: 'bottom center',
                scrub: 1,
                containerAnimation: scrollTween,
                markers: false,
                onToggle: (self) => {},
            },
            id: 'firstScreenImage',
        }
    );

    // Team
    let team = document.querySelector('.homePageTeam');
    let teamSlides = gsap.utils.toArray('.homePageTeam__img');
    gsap.from(teamSlides, {
        width: 0,
        opacity: 0,
        // stagger: 0.4,
        scrollTrigger: {
            trigger: team,
            start: 'top 40%',
            end: 'bottom 100%',
            scrub: 1,
            containerAnimation: scrollTween,
            markers: false,
            onToggle: (self) => {},
        },
        id: 'TeamSlider',
    });

    let teamNames = gsap.utils.toArray('.homePageTeam__name');
    let teamDescr = gsap.utils.toArray('.homePageTeam__descr');

    ScrollTrigger.create({
        trigger: team,
        start: 'top 40%',
        end: 'bottom -40%',
        containerAnimation: scrollTween,
        markers: false,
        onToggle: (self) => {
            const { isActive } = self;
            let tl = gsap.timeline({ duration: 0.8, delay: 0 });
            if (isActive) {
                tl.fromTo(teamNames, { opacity: 0, y: 150 }, { opacity: 1, y: 0 });
                tl.fromTo(teamDescr, { opacity: 0, y: 150, delay: 0.5 }, { opacity: 1, y: 0 });
            } else {
                gsap.to(teamNames, { clearProps: true });
                gsap.to(teamDescr, { clearProps: true });
            }
        },
        id: 'Team',
    });

    // Outdoor
    let outdoor = document.querySelector('.homePageOutdor');
    let outdoorImage = document.querySelector('.homePageOutdor__img');
    let outdoorLeft = document.querySelector('.homePageOutdor__left');
    let outdoorRight = document.querySelector('.homePageOutdor__right');
    let outdoorAnch = document.querySelector('.homePageOutdor .section__anchor');

    gsap.from(outdoorImage, {
        width: 0,
        opacity: 0,
        // stagger: 0.4,
        scrollTrigger: {
            trigger: outdoor,
            start: 'top 65%',
            end: 'bottom 100%',
            scrub: 1,
            containerAnimation: scrollTween,
            markers: false,
        },
        id: 'Outdoor',
    });

    let showOutdorText = false;

    ScrollTrigger.create({
        trigger: outdoor,
        start: 'top 60%',
        end: 'bottom -40%',
        containerAnimation: scrollTween,
        markers: false,
        onToggle: (self) => {
            const { isActive } = self;
            let tl = gsap.timeline({ duration: 0.8, delay: 0 });
            if (isActive) {
                tl.fromTo(outdoorAnch, { opacity: 0, y: 150 }, { opacity: 1, y: 0 });
                tl.fromTo(outdoorLeft, { opacity: 0, y: 150, delay: 0.5 }, { opacity: 1, y: 0 });
            } else {
                gsap.to(outdoorAnch, { clearProps: true });
                gsap.to(outdoorLeft, { clearProps: true });
                gsap.to(outdoorRight, { clearProps: true });
                showOutdorText = false;
            }
        },
        onUpdate: (self) => {
            if (self.progress > 0.27 && !showOutdorText) {
                gsap.fromTo(outdoorRight, { opacity: 0, y: 150, duration: 1 }, { opacity: 1, y: 0 });
                showOutdorText = true;
            }
        },
        id: 'Outdoor',
    });

    // Outdoor
    let project = document.querySelector('.homePageProjects');
    let projectImage = document.querySelectorAll('.homePageProjects__image');
    let projectBottom = gsap.utils.toArray('.homePageProjects__bottom');

    projectImage.forEach((img, i) => {
        gsap.from(img, {
            width: 0,
            opacity: 0,
            // stagger: 0.4,
            scrollTrigger: {
                trigger: img,
                start: 'center 80%',
                end: 'center center',
                scrub: 1,
                containerAnimation: scrollTween,
                markers: false,
                onToggle: (self) => {
                    const { isActive, direction } = self;
                    // console.log(self);
                    if (isActive && direction === 1) {
                        const item = img.closest('.homePageProjects__item');
                        const bottom = item.querySelector('.homePageProjects__bottom');
                        // console.log(bottom);
                        gsap.fromTo(bottom, { opacity: 0, y: 150 }, { opacity: 1, y: 0 });
                    } else {
                        // gsap.to(bottom, { clearProps: true });
                    }
                },
            },
            id: 'Project img ' + i,
        });
    });

    ScrollTrigger.create({
        trigger: project,
        start: 'top 100%',
        end: 'bottom 150%',
        containerAnimation: scrollTween,
        markers: false,
        onToggle: (self) => {
            const { isActive, direction } = self;
            if (!isActive && direction !== 1) {
                gsap.to(projectBottom, { clearProps: true });
            }
        },
        id: 'Why',
    });

    const why = document.querySelector('.homePageWhy');
    const whyTitle = document.querySelector('.homePageWhy__bottom h2');
    let iconShow = false;

    ScrollTrigger.create({
        trigger: why,
        start: 'top 50%',
        end: 'bottom 100%',
        containerAnimation: scrollTween,
        markers: false,
        onToggle: (self) => {
            const { isActive, direction } = self;
            if (!isActive && direction !== 1) {
                gsap.to('.homePageWhy__item', { clearProps: true });
                gsap.to(whyTitle, { clearProps: true });
                iconShow = false;
                if (iconShow) {
                }
            } else {
                if (!iconShow) {
                    gsap.fromTo('.homePageWhy__item', { opacity: 0, y: 30 }, { stagger: 0.5, opacity: 1, y: 0 });
                    gsap.fromTo(whyTitle, { opacity: 0, duration: 1, y: whyTitle.offsetHeight, delay: 2.5 }, { opacity: 1, y: 0 });
                    iconShow = true;
                }
            }
        },
        id: 'Why',
    });

    const Gallery = document.querySelector('.homePageGallery');
    const GalleryTitle = document.querySelector('.homePageGallery__left h2');
    const GallerySlider = document.querySelector('.homePageGallery__slider');
    let galleryShow = false;

    ScrollTrigger.create({
        trigger: Gallery,
        start: 'top 70%',
        end: 'bottom 100%',
        containerAnimation: scrollTween,
        markers: false,
        onToggle: (self) => {
            const { isActive, direction } = self;
            if (!isActive && direction !== 1) {
                gsap.to('.homePageGallery__item', { clearProps: true });
                gsap.to(GalleryTitle, { clearProps: true });
                gsap.to(GallerySlider, { clearProps: true });
                galleryShow = false;
                if (galleryShow) {
                }
            } else {
                if (!galleryShow) {
                    gsap.fromTo(GalleryTitle, { opacity: 0, duration: 1, y: -GalleryTitle.offsetHeight }, { opacity: 1, y: 0 });
                    gsap.fromTo('.homePageGallery__item', { opacity: 0, y: 30 }, { stagger: 0.6, opacity: 1, y: 0 });
                    gsap.fromTo(GallerySlider, { opacity: 0, duration: 2, delay: 2, y: GallerySlider.offsetHeight / 2, delay: 2.5 }, { opacity: 1, y: 0 });
                    galleryShow = true;
                }
            }
        },
        id: 'Gallery',
    });

    const Process = document.querySelector('.homePageProcess');
    const ProcessTitle = document.querySelector('.homePageProcess__left h2');
    const ProcessText = document.querySelector('.homePageProcess__left .section__sub');
    const ProcessBtn = document.querySelector('.homePageProcess__left .btn');
    const ProcessImg = document.querySelector('.homePageProcess__img');
    let ProcessShow = false;

    ScrollTrigger.create({
        trigger: Process,
        start: 'top 70%',
        end: 'bottom 100%',
        containerAnimation: scrollTween,
        markers: false,
        onToggle: (self) => {
            const { isActive, direction } = self;
            if (!isActive && direction !== 1) {
                gsap.to('.homePageProcess__item', { clearProps: true });
                gsap.to(ProcessTitle, { clearProps: true });
                gsap.to(ProcessText, { clearProps: true });
                gsap.to(ProcessBtn, { clearProps: true });
                ProcessShow = false;
                if (ProcessShow) {
                }
            } else {
                if (!ProcessShow) {
                    const tl = gsap.timeline({ opacity: 0, duration: 0.5 });
                    tl.fromTo(ProcessTitle, { y: ProcessTitle.offsetHeight }, { opacity: 1, y: 0 });
                    tl.fromTo(ProcessText, { y: ProcessText.offsetHeight }, { opacity: 1, y: 0 });
                    tl.to(ProcessBtn, { opacity: 1 });
                    gsap.fromTo('.homePageProcess__item', { y: 30 }, { duration: 0.4, stagger: 0.3, opacity: 1, y: 0 });
                    ProcessShow = true;
                }
            }
        },
        id: 'Process',
    });

    gsap.from(ProcessImg, {
        width: 0,
        ease: 'linear',
        duration: 0.1,
        scrollTrigger: {
            scrub: 1,
            trigger: ProcessImg,
            start: 'top bottom',
            end: 'bottom +=' + ProcessImg.offsetWidth,
            containerAnimation: scrollTween,
            markers: false,
        },
        id: 'Process img',
    });

    let spring = document.querySelector('.homePageSpring');
    let springImg = document.querySelector('.homePageSpring__img');
    let springLine = gsap.utils.toArray('.homePageSpring__line');
    gsap.to(springLine, {
        xPercent: 25,
        scrollTrigger: {
            trigger: spring,
            containerAnimation: scrollTween,
            scrub: 1,
            markers: false,
        },
    });

    gsap.from(springImg, {
        width: 0,
        scrollTrigger: {
            trigger: springImg,
            start: 'top bottom',
            end: 'bottom +=' + ProcessImg.offsetWidth,
            containerAnimation: scrollTween,
            scrub: 1,
            markers: false,
        },
    });

    const manufacture = document.querySelector('.homePageManufacture');
    const manufactureTitle = document.querySelector('.homePageManufacture h2');
    const manufactureSub = document.querySelector('.homePageManufacture .section__sub');
    const manufactureItem = gsap.utils.toArray('.homePageManufacture__item');
    const manTl = gsap.timeline({ duration: 0.8, delay: 0 });
    const manTrigger = {
        trigger: manufacture,
        containerAnimation: scrollTween,
        start: '10% center',
        end: 'bottom 85%',
        scrub: 1,
        markers: false,
    };
    manTl.from(manufactureItem, {
        stagger: 1,
        opacity: 0,
        duration: 0.8,
        y: 50,
        scrollTrigger: manTrigger,
    });
    manTl.from(manufactureTitle, { opacity: 0, y: 40, duration: 0.8, scrollTrigger: manTrigger });
    manTl.from(manufactureSub, { opacity: 0, y: 60, delay: 1, duration: 0.8, scrollTrigger: manTrigger });

    const optionsImg = document.querySelector('.homePageOptions__img');
    const optionsRight = document.querySelector('.homePageOptions__right');
    const optionsItem = gsap.utils.toArray('.homePageOptions__item');

    gsap.from(optionsImg, {
        width: 0,
        scrollTrigger: {
            trigger: optionsImg,
            containerAnimation: scrollTween,
            scrub: 1,
            markers: false,
        },
    });

    gsap.from(optionsItem, {
        opacity: 0,
        stagger: 0.7,
        scrollTrigger: {
            trigger: optionsRight,
            start: 'top 60%',
            end: 'bottom bottom',
            containerAnimation: scrollTween,
            scrub: 1,
            markers: false,
        },
    });

    const review = document.querySelector('.homePageReview');
    const reviewSlider = document.querySelector('.homePageReview__slider');
    const reviewTitle = document.querySelector('.homePageReview__bottom');

    gsap.from(reviewTitle, {
        opacity: 0,
        y: 50,
        scrollTrigger: {
            trigger: review,
            containerAnimation: scrollTween,
            scrub: 1,
            markers: false,
        },
    });

    gsap.from(reviewSlider, {
        opacity: 0,
        y: -50,
        scrollTrigger: {
            trigger: review,
            start: 'top 60%',
            end: 'bottom bottom',
            containerAnimation: scrollTween,
            scrub: 1,
            markers: false,
        },
    });

    const blog = document.querySelector('.homePageBlog');
    const blogSlide = gsap.utils.toArray('.homePageBlog__item');
    const blogTitle = document.querySelector('.homePageBlog h2');
    const blogBtn = document.querySelector('.homePageBlog .btn');

    gsap.from(blogTitle, {
        opacity: 0,
        y: -50,
        scrollTrigger: {
            trigger: blog,
            start: 'top 60%',
            end: 'bottom bottom',
            containerAnimation: scrollTween,
            scrub: 1,
            markers: false,
        },
    });

    gsap.from(blogBtn, {
        opacity: 0,
        scrollTrigger: {
            trigger: blogBtn,
            start: 'top 70%',
            end: 'bottom bottom',
            containerAnimation: scrollTween,
            scrub: 1,
            markers: false,
        },
    });

    gsap.from(blogSlide, {
        stagger: 1,
        opacity: 0,
        y: 50,
        scrollTrigger: {
            trigger: blogSlide,
            start: 'top 70%',
            end: 'bottom 70%',
            containerAnimation: scrollTween,
            scrub: 1,
            markers: false,
        },
    });

    const faq = document.querySelector('.homePageFaq');
    const faqSlide = gsap.utils.toArray('.homePageFaq__item');
    const faqTitle = document.querySelector('.homePageFaq h2');
    const faqImg = document.querySelector('.homePageFaq__img');

    gsap.from(faqTitle, {
        opacity: 0,
        y: -50,
        scrollTrigger: {
            trigger: faq,
            start: 'top 60%',
            end: 'bottom bottom',
            containerAnimation: scrollTween,
            scrub: 1,
            markers: false,
        },
    });

    gsap.from(faqImg, {
        width: 0,
        scrollTrigger: {
            trigger: faqImg,
            start: 'top 70%',
            end: 'bottom 70%',
            containerAnimation: scrollTween,
            scrub: 1,
            markers: false,
        },
    });

    gsap.from(faqSlide, {
        stagger: 1,
        opacity: 0,
        y: 50,
        scrollTrigger: {
            trigger: faqSlide,
            start: 'top 70%',
            end: 'bottom 70%',
            containerAnimation: scrollTween,
            scrub: 1,
            markers: false,
        },
    });

    // only show the relevant section's markers at any given time
    // gsap.set('.gsap-marker-start, .gsap-marker-end, .gsap-marker-scroller-start, .gsap-marker-scroller-end', { autoAlpha: 1 });
    // ['homePageOutdor'].forEach((triggerClass, i) => {
    //     ScrollTrigger.create({
    //         trigger: '.' + triggerClass,
    //         containerAnimation: scrollTween,
    //         start: 'left 30%',
    //         end: i === 3 ? 'right right' : 'right 30%',
    //         markers: false,
    //         onToggle: (self) =>
    //             gsap.to('.marker-' + (i + 1), {
    //                 duration: 0.25,
    //                 autoAlpha: self.isActive ? 1 : 0,
    //             }),
    //     });
    // });
}

function initTeamSlider() {
    const swiper = new Swiper('.homePageTeam__slider', {
        // Optional parameters
        slidesPerView: 1,
        spaceBetween: 5,
        speed: 700,
        simulateTouch: false,
        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 70,
            },
        },
        pagination: {
            el: '.swiper-pagination',
        },
        navigation: {
            nextEl: '.homePageTeam__sliderActions .swiper-button-next',
            prevEl: '.homePageTeam__sliderActions .swiper-button-prev',
        },
    });
}

function initGallerySlider() {
    const toggles = document.querySelectorAll('.homePageGallery__item');
    const sliders = document.querySelectorAll('.homePageGallery__slider');

    sliders.forEach((slider) => {
        const id = slider.dataset.slider;
        const swiper = new Swiper(slider, {
            // Optional parameters
            slidesPerView: 1,
            speed: 700,
            simulateTouch: false,
            spaceBetween: 5,
            navigation: {
                nextEl: slider.querySelector('.swiper-button-next'),
                prevEl: slider.querySelector('.swiper-button-prev'),
            },
        });
    });

    toggles.forEach((toggle) => {
        const id = toggle.dataset.sliderId;
        toggle.addEventListener('click', ({ target }) => {
            toggles.forEach((toggl) => toggl.classList.remove('active'));
            toggle.classList.add('active');
            sliders.forEach((slider) => {
                if (slider.dataset.slider === id) {
                    slider.classList.add('active');
                } else {
                    slider.classList.remove('active');
                }
            });
        });
    });
}

function initReviewsSlider() {
    const slider = document.querySelector('.homePageReview__slider .swiper');

    const swiper = new Swiper(slider, {
        // Optional parameters
        slidesPerView: 1,
        speed: 700,
        simulateTouch: false,
        spaceBetween: 5,
        navigation: {
            nextEl: document.querySelector('.homePageReview .swiper-button-next'),
            prevEl: document.querySelector('.homePageReview .swiper-button-prev'),
        },
    });
}

function faqListToggle() {
    document.querySelectorAll('.homePageFaq__name').forEach((elem) => {
        elem.addEventListener('click', (e) => {
            const toggle = e.target;
            const item = toggle.closest('.homePageFaq__item');
            item.classList.toggle('open');
        });
    });
}
