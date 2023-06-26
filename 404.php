<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package frondendie
 */

get_header();
?>

<main id="primary" class="main">

	<!-- begin notfound-->
	<section class="notfound section" id="notfound">
		<div class="notfound__img img desktop"><img src="<?php echo get_template_directory_uri() . '/img/footer_img.webp' ?>" alt="alt" /></div>
		<div class="container_center">
			<div class="notfound__content">
				<h1 class="section__title"><span>404 </span><span>:(</span></h1>
				<div class="notfound__info">Unfortunately, this page is lost somewhere in the galaxy of the Internet.</div>
				<div class="notfound__btn"><a class="btn" href="/"><span>Main page</span></a></div>
			</div>
		</div>
	</section>
	<!-- end notfound-->

</main><!-- #main -->

<?php
get_footer();
