<div class="footer__top">
	<div class="container_center"><a class="footer__logo" href="/"><span>ehd builders</span></a>
		<div class="footer__row">
			<div class="footer__label"><span>MAIN OFFICE</span></div>
			<ul class="footer__list list">
				<li><span><?php echo SCF::get_option_meta('our-contacts', 'contacts__addres'); ?></span></li>
				<li><span>Phone: </span><a href="tel: <?php echo SCF::get_option_meta('our-contacts', 'contacts__tel'); ?>"><?php echo SCF::get_option_meta('our-contacts', 'contacts__tel'); ?></a></li>
				<li><a href="mailto: <?php echo SCF::get_option_meta('our-contacts', 'contacts__email'); ?>">Email: <?php echo SCF::get_option_meta('our-contacts', 'contacts__email'); ?></a></li>
			</ul>
		</div>
		<div class="footer__row">
			<div class="footer__label"><span>OTHER LOCATIONS</span></div>
			<?php
			$contacts_office_field = SCF::get_option_meta('our-contacts', 'contacts_office_field');

			foreach ($contacts_office_field as $item) {
				$address = $item['contacts__office_addres'];
				$email = $item['contacts__office_email'];
				if ($address || $email) {
			?>
					<ul class="footer__list list">
						<?php
						if ($address) {
						?>
							<li><span><?php echo $address ?></span></li>
						<?php
						}
						if ($email) {
						?>
							<li><a href="mailto: <?php echo $email ?>">Email: <?php echo $email ?></a></li>
						<?php
						}
						?>
					</ul>
			<?php
				}
			};
			?>
		</div>
		<div class="footer__row">
			<div class="messenger">
				<!-- <div class="messenger__list"> -->
				<?php
				wp_nav_menu([
					'menu' => 'socials-menu'
				])
				?>

				<!-- <div class="messenger__item"><a class="messenger__link" href="#" target="_blank"><i class="icon_facebook"></i></a></div>
					<div class="messenger__item"><a class="messenger__link" href="#" target="_blank"><i class="icon_Instagram"></i></a></div>
					<div class="messenger__item"><a class="messenger__link" href="#" target="_blank"><i class="icon_yelp"></i></a></div>
					<div class="messenger__item"><a class="messenger__link" href="#" target="_blank"><i class="icon_house"></i></a></div> -->
				<!-- </div> -->
			</div>
		</div>
		<div class="footer__row"><a class="footer__link" href="#">Go back</a></div>
	</div>
</div>
<div class="footer__bottom">
	<div class="container_center"><span>Copyright © <script type="text/javascript">
				document.write(new Date().getFullYear());
			</script> EHD Builder. All Rights Reserved.</span></div>
</div>