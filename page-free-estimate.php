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
?>


<main id="primary" class="main_content">
	<section class="feedback section" id="feedback">
		<div class="container_center">
			<h1 class="section__title"><span><?php the_title() ?></span></h1>
			<div class="feedback__form">
				<div class="form">
					<div class="form__content">
						<div class="form__list">
							<?php echo do_shortcode('[wpforms id="247"]'); ?>
						</div>
						<div class="form__right">
							<div class="form__img img desktop">
								<?php the_post_thumbnail('full') ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end feedback-->

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
