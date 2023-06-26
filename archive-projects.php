<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package frondendie
 */

get_header();
$meta = SCF::gets(PORTFOLIO_PAGE_ID);
$cats = get_terms('project-category', [
	'hide_empty' => true,
]);
$list_title = $meta['first__title'];
$list_text = $meta['first__text'];
// var_dump($cats);

?>

<main id="primary" class="main_content archive">

	<!-- begin head-->
	<section class="head section" id="head">
		<div class="head__img">
			<?php echo wp_get_attachment_image($meta['first__img'], 'full') ?>
		</div>
		<div class="container_center">
			<div class="head__content">
				<div class="breadcrumbs">
					<div class="aioseo-breadcrumbs"><span class="aioseo-breadcrumb"><a href="/">Home </a></span><span class="aioseo-breadcrumb-separator">/</span><span class="aioseo-breadcrumb"><?php echo get_the_title(PORTFOLIO_PAGE_ID) ?></span></div>
				</div>
				<h1 class="section__title"><span><?php echo get_the_title(PORTFOLIO_PAGE_ID); ?></span></h1>
			</div>
		</div>
	</section>
	<!-- end head-->
	<!-- begin portfolio-->
	<section class="portfolio section" id="portfolio">
		<div class="container_center">
			<div class="portfolio__cat">
				<?php
				if ($cats) {
				?>
					<ul class="cat-list">
						<?php
						foreach ($cats as $key => $item) {
							$cat_meta = get_term_meta($item->term_id);
							$category_link = '/portfolio/?project-category=' . $item->slug;
							$class_name = 'cat-item';

							if (get_query_var('project-category') === $item->slug) {
								$category_link = '/portfolio/';
								$class_name = 'cat-item current-cat';
								$list_title = $item->name;
								$list_text = $item->description;
							}

						?>
							<li class="<?php echo $class_name ?>"><a href="<?php echo $category_link ?>">
									<div class="cat-img">
										<?php echo wp_get_attachment_image($cat_meta['cat_img'][0]) ?>
									</div><span><?php echo $item->name ?></span>
								</a></li>
						<?php
						}
						?>
					</ul>
				<?php
				}
				?>
			</div>

			<div class="portfolio__caption">
				<h2 class="section__title"><span><?php echo $list_title ?></span></h2>
				<div class="portfolio__desc"><span><?php echo $list_text ?></span></div>
			</div>

			<div class="portfolio__grid">

				<?php if (have_posts()) :
					while (have_posts()) :
						the_post();

						get_template_part('template-parts/archive', get_post_type());

					endwhile;

				?>
			</div>
		</div>
	</section>
	<!-- end portfolio-->
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
