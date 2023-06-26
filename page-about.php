<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package frondendie
 */

get_header();
$meta = SCF::gets();
?>


<main id="primary" class="main_content">
	<!-- begin story-->
	<section class="story section" id="story">
		<div class="container_center">
			<div class="story__wrap">
				<div class="story__content">
					<div class="breadcrumbs breadcrumbs_reverse">
						<div class="aioseo-breadcrumbs"><span class="aioseo-breadcrumb"><a href="#">Home </a></span><span class="aioseo-breadcrumb-separator">/</span><span class="aioseo-breadcrumb"><?php the_title() ?></span></div>
					</div>
					<h1 class="section__title"><span><?php echo $meta['first__title'] ?></span></h1>
					<div class="story__text"><span><?php echo $meta['first__text'] ?></span></div>
				</div>
				<div class="story__video">
					<?php
					if ($meta['first__video']) {
					?>
						<div class="video">
							<div class="video__wrap">
								<video id="video" src="<?php echo wp_get_attachment_url($meta['first__video']) ?>" muted loop poster="<?php echo wp_get_attachment_url($meta['first__poster']) ?>"></video>
								<div class="video__play"><i class="icon_polygon"></i></div>
								<script>
									const firstVideo = document.getElementById('video');
									const firstBtn = document.querySelector('.video__play');
									firstBtn.addEventListener('click', () => {
										if (firstVideo.paused) {
											firstVideo.play();
											firstBtn.classList.add('played');
										} else {
											firstVideo.pause();
											firstBtn.classList.remove('played');
										}
									})
								</script>
							</div>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
		<div class="story__img img desktop"><?php echo wp_get_attachment_image($meta['first__img'], 'full') ?></div>
	</section>
	<!-- end story-->
	<!-- begin ourteam-->
	<section class="ourteam section" id="ourteam">
		<div class="container_center">
			<div class="ourteam__wrap">
				<div class="ourteam__content">
					<div class="ourteam__label"><span>/ <?php echo $meta['team__sub'] ?></span></div>
					<h2 class="section__title"><span><?php echo $meta['team__title'] ?></span></h2>
					<div class="ourteam__text"><?php echo $meta['team__text'] ?></div>
					<div class="ourteam__nav desktop">
						<div class="swiper__arrows"><i class="icon_arrow_left"></i>
							<div class="swiper__dotted swiper__dotted_reverse dotted_ourteam_js"></div><i class="icon_arrow_right"></i>
						</div>
					</div>
				</div>
				<div class="ourteam__slider">
					<div class="swiper swiper_ourteam_js">
						<div class="swiper-wrapper">
							<?php
							global $post;

							$teams = get_posts([
								'numberposts' => 10,
								'include'      => $meta['team__ids'],
								'orderby'      => 'post__in',
								'post_type'      => 'teams',
							]);

							if ($teams) {
								foreach ($teams as $post) {
									setup_postdata($post);
									$link = SCF::get('team__bio');
							?>
									<div class="swiper-slide">
										<div class="ourteam__slide">
											<div class="ourteam__img img">
												<?php echo wp_get_attachment_image(SCF::get('team__photo'), 'full') ?>
											</div>
											<div class="ourteam__info"><span><?php the_title() ?></span>
												<?php
												if ($link) {
												?>
													<a href="<?php echo $link; ?>">Link in bio</a>
												<?php
												}
												?>
											</div>
										</div>
									</div>
							<?php
								}
							}

							wp_reset_postdata(); // Сбрасываем $post
							?>
						</div>
					</div>
				</div>
				<div class="ourteam__nav mobile">
					<div class="swiper__dotted swiper__dotted_reverse dotted_ourteam_mobile_js"></div>
				</div>
			</div>
		</div>
	</section>
	<!-- end ourteam-->
	<!-- begin approach-->
	<section class="approach section" id="approach">
		<div class="container_center">
			<div class="approach__label"><span>/ <?php echo $meta['approach__sub'] ?></span></div>
			<div class="approach__wrap">
				<div class="approach__content">
					<h2 class="section__title"><span><?php echo $meta['approach__title'] ?></span></h2>
					<div class="approach__img img"><?php echo wp_get_attachment_image($meta['approach__img'], 'full') ?></div>
				</div>
				<div class="approach__list counter-wrap">
					<?php
					$approach_list = $meta['approach_list'];

					foreach ($approach_list as $item) {
					?>
						<div class="approach__item counter-item">
							<div class="approach__caption">
								<div class="approach__number"><span class="counter-el"></span></div>
								<div class="approach__title"><span><?php echo $item['approach__list_name'] ?></span></div>
							</div>
							<div class="approach__text"><span><?php echo $item['approach__list_text'] ?></span></div>
						</div>
					<?php
					};
					?>
				</div>
			</div>
		</div>
	</section>
	<!-- end approach-->
	<!-- begin testimonials-->
	<section class="testimonials section" id="testimonials">
		<div class="container_center">
			<div class="testimonials__label"><span>/ <?php echo $meta['review__sub']; ?></span></div>
			<h2 class="section__title"><span><?php echo $meta['review__title']; ?></span></h2>
			<div class="testimonials__slider">
				<div class="swiper swiper_testimonials_js">
					<div class="swiper-wrapper">
						<?php
						global $post;

						$review = get_posts([
							'numberposts' => 10,
							'include'      => $meta['review__ids'],
							'orderby'       => 'post__in',
							'post_type'      => 'reviews',
						]);

						if ($review) {
							foreach ($review as $post) {
								setup_postdata($post);
						?>
								<div class="swiper-slide">
									<div class="testimonials__content">
										<div class="testimonials__top">
											<div class="testimonials__desc">
												<div class="testimonials__img img">
													<?php echo wp_get_attachment_image(SCF::get('review__photo'), 'full') ?>
												</div>
												<div class="testimonials__info"><span><?php echo the_title() ?></span><span><?php echo SCF::get('review__date'); ?></span></div>
											</div>
											<ul class="testimonials__stars testimonials__stars_5">
												<?php
												$stars = (int)SCF::get('review__stars');
												if ($stars) {
													for ($i = 0; $i < $stars; $i++) {
												?>
														<li><i class="icon_star"></i></li>
												<?php
													}
												}
												?>
											</ul>
										</div>
										<div class="testimonials__bottom"><span><?php echo SCF::get('review__text'); ?></span></div>
									</div>
								</div>
						<?php
							}
						}

						wp_reset_postdata(); // Сбрасываем $post
						?>
					</div>
				</div>
				<div class="testimonials__nav desktop"><i class="icon_arrow_long_left"></i><i class="icon_arrow_long_right"></i></div>
				<div class="swiper__dotted swiper__dotted_reverse dotted_testimonials_js mobile"></div>
			</div>
		</div>
	</section>
	<!-- end testimonials-->
	<!-- begin exterior-->
	<section class="exterior section" id="exterior">
		<div class="exterior__img img"><?php echo wp_get_attachment_image($meta['exterior__img'], 'full') ?></div>
		<div class="container_center">
			<div class="exterior__content">
				<h2 class="section__title"><span><?php echo $meta['exterior__title'] ?></span></h2>
				<div class="exterior__info"><span><?php echo $meta['exterior__text'] ?></span></div>
				<div class="exterior__btn"><a class="btn" href="<?php echo $meta['exterior__btn_link'] ?>"><span><?php echo $meta['exterior__btn'] ?></span></a></div>
			</div>
		</div>
	</section>
	<!-- end exterior-->
</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
