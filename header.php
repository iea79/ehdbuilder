<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package frondendie
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.cdnfonts.com">
	<link rel="stylesheet" type="text/css" href="https://fonts.cdnfonts.com/css/alokary" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div class="wrapper" id="wrapper">
		<header id="masthead" class="header">
			<div class="header__row">
				<div class="navbar__wrap">
					<div class="navbar__toggle"></div>
				</div>
				<div class="navbar">
					<div class="navbar__toggle mobile"></div>
					<div class="navbar__nav">
						<?php
						wp_nav_menu([
							'menu'            => 'menu-1',
						])
						?>
					</div>
					<div class="navbar__right">
						<div class="navbar__img">
						</div>
						<div class="navbar__foot">
							<div class="navbar__adress">
								<ul class="list">
									<li><b>Address: </b><span><?php echo SCF::get_option_meta('our-contacts', 'contacts__addres'); ?></span></li>
								</ul>
								<ul class="list">
									<li><b>Phone: </b><a href="tel: <?php echo SCF::get_option_meta('our-contacts', 'contacts__tel'); ?>"><?php echo SCF::get_option_meta('our-contacts', 'contacts__tel'); ?></a></li>
									<li><b>Email: </b><a href="mailto: <?php echo SCF::get_option_meta('our-contacts', 'contacts__email'); ?>"><?php echo SCF::get_option_meta('our-contacts', 'contacts__email'); ?></a></li>
								</ul>
							</div>
							<div class="navbar__soc">
								<?php
								wp_nav_menu([
									'menu'	=> 'socials-menu'
								])
								?>
							</div>
						</div>
					</div>
				</div>
				<?php
				// if (!is_front_page()) {
				?>
				<div class="header__logo">
					<div class="header__col"><a class="header__item" href="/"><b>ehd</b><span>builders - enviromental home development</span></a></div>
				</div>
				<div class="header__content desktop">
					<div class="header__col"><a class="header__item" href="tel:(866) 585-2717"><b>Phone:</b><span>(866) 585-2717</span></a><a class="header__item" href="mailto:info@ehdbuilders.com"><b>Email:</b><span>info@ehdbuilders.com</span></a></div>
					<div class="header__col">
						<div class="header__item"><b>Addres:</b><span>18375 Ventura Blvd. #122Tarzana, CA, 91356</span></div>
					</div>
				</div>
				<?php
				// }
				?>
			</div>
		</header><!-- #masthead -->