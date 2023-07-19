<div class="loader">
    <div class="loader__el"></div>
</div>
<div class="homePage">

    <!-- begin homePageFirst -->
    <section id="homePageFirst" class="homePageFirst section">
        <div class="homePageFirst__content">
            <div class="homePageFirst__top">
                <div class="homePageFirst__left">
                    <div class="homePageFirst__contact">
                        <b>ehd</b> builders - enviromental <br>home development
                    </div>
                </div>
                <div class="homePageFirst__right">
                    <div class="homePageFirst__contact">
                        <div>
                            <b>Phone:</b> <a href="tel: <?php echo SCF::get_option_meta('our-contacts', 'contacts__tel'); ?>"><?php echo SCF::get_option_meta('our-contacts', 'contacts__tel'); ?></a>
                        </div>
                        <div>
                            <b>Email:</b> <a href="mailto: <?php echo SCF::get_option_meta('our-contacts', 'contacts__email'); ?>"><?php echo SCF::get_option_meta('our-contacts', 'contacts__email'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="homePageFirst__middle">
                <div class="homePageFirst__left">
                    <h1 class="section__title"><?php echo SCF::get('first__title'); ?></h1>
                </div>
                <div class="homePageFirst__right">
                    <div class="homePageFirst__actions">
                        <div class="homePageFirst__text">
                            <?php echo SCF::get('first__text'); ?>
                        </div>
                        <a href="<?php echo SCF::get('first__btn_link'); ?>" class="btn"><span><?php echo SCF::get('first__btn'); ?></span> </a>
                    </div>
                </div>
            </div>
            <div class="homePageFirst__bottom">
                <div class="homePageFirst__left">
                    <div class="homePageFirst__soc">
                        <?php
                        wp_nav_menu([
                            'menu' => 'socials-menu'
                        ])
                        ?>
                    </div>
                </div>
                <div class="homePageFirst__right">
                    <div class="homePageFirst__contact">
                        <b>Addres:</b> <?php echo SCF::get_option_meta('our-contacts', 'contacts__addres'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="homePageFirst__image">
            <?php echo wp_get_attachment_image(SCF::get('first__img'), 'full') ?>
        </div>
    </section>
    <!-- end homePageFirst -->

    <!-- begin homePageTeam -->
    <section id="homePageTeam" class="homePageTeam section">
        <div class="homePageTeam__content">
            <div class="homePageTeam__left">
                <h2 class="section__title"><?php echo SCF::get('team__title'); ?></h2>
                <div class="section__sub"><?php echo SCF::get('team__text'); ?></div>
                <a href="<?php echo SCF::get('team__btn_link'); ?>" class="btn"><span><?php echo SCF::get('team__btn'); ?></span></a>
            </div>
            <div class="homePageTeam__right ">
                <div class="homePageTeam__slider swiper">
                    <div class="swiper-wrapper">
                        <?php
                        // global $post;
                        $team_ids = SCF::get('team__members');

                        $allteams = get_posts([
                            'numberposts' => -1,
                            'post_type'   => 'teams',
                            'include'     => $team_ids,
                            'orderby'     => 'post__in',
                        ]);

                        if ($allteams) {
                            foreach ($allteams as $post) {
                                setup_postdata($post);
                                $member = SCF::gets();
                                // var_dump($member);
                        ?>
                                <div class="homePageTeam__slide swiper-slide">
                                    <div class="homePageTeam__img">
                                        <?php echo wp_get_attachment_image($member['team__photo'], 'full')
                                        ?>
                                    </div>
                                    <div class="homePageTeam__name"><?php the_title() ?></div>
                                    <div class="homePageTeam__descr">
                                        <?php echo $member['team__descr'] ?>
                                    </div>
                                </div>
                        <?php
                            }
                        }

                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <div class="homePageTeam__sliderActions">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- end homePageTeam -->

    <!-- begin homePageOutdor -->
    <section id="homePageOutdor" class="homePageOutdor section">
        <div class="homePageOutdor__img">
            <?php echo wp_get_attachment_image(SCF::get('outdor__img'), 'full') ?>
        </div>
        <div class="section__anchor"><?php echo SCF::get('outdor__anchore'); ?></div>
        <div class="homePageOutdor__content">
            <div class="homePageOutdor__left">
                <h2 class="section__title"><?php echo SCF::get('outdor__title'); ?></h2>
            </div>
            <div class="homePageOutdor__right">
                <div class="section__sub"><?php echo SCF::get('outdor__text'); ?></div>
            </div>
        </div>
    </section>
    <!-- end homePageOutdor -->

    <!-- begin homePageProjects -->
    <section id="homePageProjects" class="homePageProjects section">
        <div class="homePageProjects__content">
            <div class="homePageProjects__left">
                <h2 class="section__title"><?php echo SCF::get('project__title'); ?></h2>
                <div class="homePageProjects__arrow"></div>
            </div>
            <div class="homePageProjects__right">
                <div class="homePageProjects__gallery">
                    <?php
                    $project_list = SCF::get('project_list');

                    foreach ($project_list as $key => $item) {
                    ?>
                        <?php
                        if ($key === 2) {
                        ?>
                            <div class="homePageProjects__group">
                            <?php
                        }
                        if ($key === 4) {
                            ?>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="homePageProjects__item">
                            <a href="<?php echo $item['project__link'] ?>" target="_blank" class="homePageProjects__image">
                                <?php echo wp_get_attachment_image($item['project__img'], 'full') ?>
                            </a>
                            <div class="homePageProjects__bottom">
                                <div class="homePageProjects__name"><?php echo $item['project__name'] ?></div>
                                <div class="homePageProjects__count"><?php echo '0' . ($key + 1) ?></div>
                            </div>
                        </div>
                    <?php
                    };
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- end homePageProjects -->

    <!-- begin homePageWhy -->
    <section id="homePageWhy" class="homePageWhy section">
        <div class="homePageWhy__content">
            <div class="homePageWhy__bottom">
                <h2 class="section__title"><?php echo SCF::get('why__title'); ?></h2>
            </div>
            <div class="homePageWhy__top">
                <div class="homePageWhy__list">
                    <?php
                    $why_list = SCF::get('why_list');

                    foreach ($why_list as $key => $item) {
                    ?>
                        <div class="homePageWhy__item">
                            <span>
                                /
                            </span>
                            <div class="homePageWhy__count">0<?php echo $key + 1 ?></div>
                            <div class="homePageWhy__icon"><?php echo wp_get_attachment_image($item['why__img']) ?></div>
                            <div class="homePageWhy__name"><?php echo $item['why__name'] ?></div>
                        </div>
                    <?php
                    };
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- end homePageWhy -->


    <!-- begin homePageGallery -->
    <?php
    $allcategories = get_categories([
        'taxonomy'     => 'project-category',
        'include'      => SCF::get('gallery__cat'),
        'orderby'      => 'include'
    ]);
    if ($allcategories) {
    ?>
        <section id="homePageGallery" class="homePageGallery section">
            <div class="homePageGallery__content">
                <div class="homePageGallery__left">
                    <h2 class="section__title"><?php echo SCF::get('gallery__title'); ?></h2>
                    <div class="homePageGallery__list">
                        <?php
                        foreach ($allcategories as $key => $cat) {
                            $meta = SCF::get_term_meta($cat->term_id, 'project-category');
                            $thumbId = $meta['cat_img'];
                            $className = $key === 0 ? 'homePageGallery__item active' : 'homePageGallery__item';
                        ?>
                            <div class="<?php echo $className ?>" data-slider-id="<?php echo $cat->term_id ?>">
                                <div class="homePageGallery__thumb"><?php echo wp_get_attachment_image($thumbId, 'full') ?></div>
                                <div class="homePageGallery__name"><?php echo $cat->name ?></div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="homePageGallery__right">
                    <?php
                    $pIndex = 0;
                    foreach ($allcategories as $key => $cat) {
                        // global $post;

                        $allprojects = new WP_Query([
                            'posts_per_page' => 10,
                            'post_type'   => 'projects',
                            'project-category' => $cat->name
                        ]);
                        // var_dump($query);
                        $className = $pIndex === 0 ? 'homePageGallery__slider swiper active' : 'homePageGallery__slider swiper';

                    ?>
                        <div class="<?php echo $className ?>" data-slider="<?php echo $cat->term_id ?>">
                            <div class="swiper-wrapper">
                                <?php
                                if ($allprojects->have_posts()) {
                                    while ($allprojects->have_posts()) {
                                        $allprojects->the_post();
                                ?>
                                        <div class="homePageGallery__slide swiper-slide">
                                            <div class="homePageGallery__image"><?php the_post_thumbnail() ?></div>
                                            <div class="homePageGallery__bottom">
                                                <div class="homePageGallery__title"><?php the_title() ?></div>
                                                <div class="homePageGallery__descr"><?php the_excerpt() ?></div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="homePageGallery__sliderActions">
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>

                        </div>
                    <?php
                        $pIndex++;
                        wp_reset_postdata(); // Сбрасываем $post
                    }
                    ?>
                </div>
            </div>
        </section>
    <?php
    }
    ?>
    <!-- end homePageGallery -->

    <!-- begin homePageProcess -->
    <section id="homePageProcess" class="homePageProcess section">
        <div class="homePageProcess__content">
            <div class="homePageProcess__left">
                <h2 class="section__title"><?php echo SCF::get('process__title'); ?></h2>
                <div class="section__sub"><?php echo SCF::get('process__text'); ?></div>
                <a href="<?php echo SCF::get('process__btn_link'); ?>" class="btn desktop"><span><?php echo SCF::get('process__btn'); ?></span></a>
            </div>
            <div class="homePageProcess__right">
                <div class="homePageProcess__list">
                    <?php
                    $process_list = SCF::get('process_list');

                    foreach ($process_list as $key => $item) {
                    ?>
                        <div class="homePageProcess__item">
                            <span><?php echo $item['process__name'] ?></span><span>Step <?php echo ($key + 1) ?></span>
                        </div>
                    <?php
                    };
                    ?>
                </div>
                <a href="<?php echo SCF::get('process__btn_link'); ?>" class="btn mobile"><span><?php echo SCF::get('process__btn'); ?></span></a>
            </div>
        </div>
        <div class="homePageProcess__img">
            <?php echo wp_get_attachment_image(SCF::get('process__img'), 'full') ?>
        </div>
    </section>
    <!-- end homePageProcess -->

    <!-- begin homePageSpring -->
    <section id="homePageSpring" class="homePageSpring section">
        <div class="homePageSpring__left">
            <div class="homePageSpring__line">
                <?php
                for ($i = 0; $i < 10; $i++) {
                    echo "Summer Promotion / ";
                }
                ?>
            </div>
            <div class="homePageSpring__content">
                <h2 class="section__title"><?php echo SCF::get('spring__title'); ?></h2>
                <div class="homePageSpring__price"><?php echo SCF::get('spring__price'); ?></div>
                <div class="homePageSpring__text"><?php echo SCF::get('spring__text'); ?></div>
                <a href="<?php echo SCF::get('spring__btn_link'); ?>" class="btn"><span><?php echo SCF::get('spring__btn'); ?></span></a>
            </div>
            <div class="homePageSpring__line">
                <?php
                for ($i = 0; $i < 10; $i++) {
                    echo "Summer Promotion / ";
                }
                ?>
            </div>
        </div>
        <div class="homePageSpring__img"><?php echo wp_get_attachment_image(SCF::get('spring__img'), 'full') ?></div>
    </section>
    <!-- end homePageSpring -->

    <!-- begin homePageManufacture -->
    <section id="homePageManufacture" class="homePageManufacture section">
        <div class="homePageManufacture__content">
            <div class="homePageManufacture__list">
                <?php
                $manufacture_list = SCF::get('manufacture_list');

                foreach ($manufacture_list as $item) {
                ?>
                    <div class="homePageManufacture__item">
                        <div class="homePageManufacture__name"><?php echo $item['manufacture__list_title'] ?></div>
                        <div class="homePageManufacture__img">
                            <?php echo wp_get_attachment_image($item['manufacture__list_img'], 'full') ?>
                        </div>
                    </div>
                <?php
                };
                ?>
            </div>
            <div class="homePageManufacture__bottom">
                <h2 class="section__title"><?php echo SCF::get('manufacture__title'); ?></h2>
                <div class="section__sub"><?php echo SCF::get('manufacture__text'); ?></div>
            </div>
        </div>
    </section>
    <!-- end homePageManufacture -->

    <!-- begin homePageOptions -->
    <section id="homePageOptions" class="homePageOptions section">
        <div class="homePageOptions__content">
            <div class="homePageOptions__left">
                <h2 class="section__title"><?php echo SCF::get('options__title'); ?></h2>
                <div class="homePageOptions__img desktop"><?php echo wp_get_attachment_image(SCF::get('options__img'), 'full') ?></div>
            </div>
            <div class="homePageOptions__right">
                <div class="homePageOptions__row">
                    <?php
                    $options_list = SCF::get('options_list');

                    foreach ($options_list as $item) {
                    ?>
                        <div class="homePageOptions__item">
                            <div class="homePageOptions__head">
                                <div class="homePageOptions__icon"><?php echo wp_get_attachment_image($item['options__list_icon'], 'full') ?></div>
                                <div class="homePageOptions__title"><?php echo $item['options__list_title'] ?></div>
                            </div>
                            <div class="homePageOptions__body">
                                <div class="homePageOptions__text"><?php echo $item['options__list_text'] ?></div>
                                <div class="homePageOptions__list"><?php echo $item['options__list_items'] ?></div>
                                <a href="<?php echo $item['options__btn_link'] ?>" class="btn"><span><?php echo $item['options__btn'] ?></span></a>
                            </div>
                        </div>
                    <?php
                    };
                    ?>
                </div>
            </div>
            <div class="homePageOptions__img mobile"><?php echo wp_get_attachment_image(SCF::get('options__img'), 'full') ?></div>
        </div>
    </section>
    <!-- end homePageOptions -->

    <!-- begin homePageReview -->
    <section id="homePageReview" class="homePageReview section">
        <div class="homePageReview__content">
            <div class="homePageReview__bottom">
                <h2 class="section__title"><?php echo SCF::get('review__title'); ?></h2>
            </div>
            <?php
            // global $post;

            $reviewsList = SCF::get('review__list');

            $allreviews = get_posts([
                'numberposts' => -1,
                'post_type'      => 'reviews',
                'include'        => $reviewsList,
                'orderby'       => 'post__in'
            ]);

            if ($allreviews) {
            ?>
                <div class="homePageReview__slider">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php
                            foreach ($allreviews as $key => $post) {
                                setup_postdata($post);
                                $meta = SCF::gets(get_the_ID());
                                // var_dump($meta['review__stars']);
                            ?>
                                <div class="homePageReview__slide swiper-slide">
                                    <div class="homePageReview__head">
                                        <div class="homePageReview__left">
                                            <div class="homePageReview__photo"><?php echo wp_get_attachment_image($meta['review__photo'], 'full') ?></div>
                                            <div class="homePageReview__user">
                                                <div class="homePageReview__name"><?php the_title() ?></div>
                                                <div class="homePageReview__date"><?php echo $meta['review__date']; ?></div>
                                                <div class="homePageReview__rate mobile">
                                                    <?php
                                                    $stars = (int)$meta['review__stars'];
                                                    for ($i = 1; $i <= $stars; $i++) {
                                                        echo '<div class="homePageReview__star"></div>';
                                                    }
                                                    ?>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="homePageReview__rate desktop">
                                            <?php
                                            for ($i = 1; $i <= $stars; $i++) {
                                                echo '<div class="homePageReview__star"></div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="homePageReview__text"><?php echo $meta['review__text']; ?></div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            <?php
            }
            wp_reset_postdata();
            ?>
        </div>
    </section>
    <!-- end homePageReview -->

    <!-- begin homePageBlog -->
    <section id="homePageBlog" class="homePageBlog section">
        <h2 class="section__title"><?php echo SCF::get('blog__title'); ?></h2>
        <div class="homePageBlog__content">
            <div class="homePageBlog__list">
                <?php
                // global $post;
                $blogList = SCF::get('blog__list');

                $allblog = get_posts([
                    'numberposts' => -1,
                    'post_type'      => 'post',
                    'include'        => $blogList,
                    'orderby'       => 'post__in'
                ]);

                if ($allblog) {
                    foreach ($allblog as $post) {
                        setup_postdata($post);
                ?>
                        <div class="homePageBlog__item">
                            <a href="<?php echo SCF::get('blog__btn_link'); ?>" class="homePageBlog__img">
                                <?php the_post_thumbnail() ?>
                            </a>
                            <div class="homePageBlog__descr">
                                <div class="homePageBlog__name"><?php the_title() ?></div>
                                <div class="homePageBlog__text"><?php the_excerpt() ?></div>
                                <a href="<?php the_permalink() ?>" class="homePageBlog__more">learn more</a>
                            </div>
                        </div>
                <?php
                    }
                }

                wp_reset_postdata(); // Сбрасываем $post
                ?>
            </div>
            <div class="homePageBlog__btn">
                <a href="<?php echo SCF::get('blog__btn_link'); ?>" class="btn"><span><?php echo SCF::get('blog__btn'); ?></span></a>
            </div>
        </div>
    </section>
    <!-- end homePageBlog -->

    <!-- begin homePageFaq -->
    <section id="homePageFaq" class="homePageFaq section">
        <h2 class="section__title"><?php echo SCF::get('faq__title'); ?></h2>
        <div class="homePageFaq__content">
            <div class="homePageFaq__left">
                <div class="homePageFaq__list">
                    <?php
                    $faq_list = SCF::get('faq_list');

                    foreach ($faq_list as $item) {
                    ?>
                        <div class="homePageFaq__item">
                            <div class="homePageFaq__name">
                                <span><?php echo $item['faq__name'] ?></span>
                                <i></i>
                            </div>
                            <div class="homePageFaq__text"><?php echo $item['faq__text'] ?></div>
                        </div>
                    <?php
                    };
                    ?>
                </div>
            </div>
            <div class="homePageFaq__right">
                <div class="homePageFaq__img"><?php echo wp_get_attachment_image(SCF::get('faq__img'), 'full') ?></div>
            </div>
        </div>
    </section>
    <!-- end homePageFaq -->

    <!-- begin footer -->
    <section id="footer" class="footer section">
        <?php require get_template_directory() . '/inc/footer-content.php'; ?>
    </section>
    <!-- end footer -->

</div>