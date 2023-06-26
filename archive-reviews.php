<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package frondendie
 */

get_header();
$meta = SCF::gets(REVIEWS_PAGE_ID);

?>

<main id="primary" class="main_content archive">

	<!-- begin head-->
	<section class="head head_testimonials section" id="head">
		<div class="head__img">
			<?php echo wp_get_attachment_image($meta['first__img'], 'full') ?>
		</div>
		<div class="container_center">
			<div class="head__content">
				<div class="breadcrumbs">
					<div class="aioseo-breadcrumbs"><span class="aioseo-breadcrumb"><a href="/">Home </a></span><span class="aioseo-breadcrumb-separator">/</span><span class="aioseo-breadcrumb"><?php echo get_the_title(REVIEWS_PAGE_ID) ?></span></div>
				</div>
				<h1 class="section__title"><span><?php echo $meta['first__title']; ?></span></h1>
			</div>
		</div>
	</section>
	<!-- end head-->
	<!-- begin testimonials-->

	<section class="testimonials testimonials_page section" id="testimonials">
		<div class="container_center">
			<div class="testimonials__grid">

				<?php if (have_posts()) :
					while (have_posts()) :
						the_post();

						get_template_part('template-parts/content', get_post_type());

					endwhile;

				?>
			</div>
		</div>
	</section>
	<!-- end testimonials-->
<?php

				endif;
?>

<?php
the_posts_pagination([
	'show_all'     => true,
	'prev_next'    => false,
]);
?>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
