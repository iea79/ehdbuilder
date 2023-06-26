<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package frondendie
 */

?>

<footer id="colophon" class="footer">
	<?php
	if (!is_front_page()) {
		require get_template_directory() . '/inc/footer-content.php';
	} else {
	?><?php
		}
			?>
</footer><!-- #colophon -->
</div><!-- #page -->
</div>

<?php wp_footer(); ?>

</body>

</html>