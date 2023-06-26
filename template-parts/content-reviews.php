<?php
$stars = (int)SCF::get('review__stars');
$video = SCF::get('review__video_file');
$slider = SCF::get('review_slider');
?>
<div class="testimonials__item">
	<div class="testimonials__content">
		<div class="testimonials__top">
			<div class="testimonials__desc">
				<div class="testimonials__img img">
					<?php echo wp_get_attachment_image(SCF::get('review__photo'), 'full') ?>
				</div>
				<div class="testimonials__info">
					<span><?php the_title() ?></span>
					<span><?php echo SCF::get('review__date'); ?></span>
				</div>
			</div>
			<ul class="testimonials__stars">
				<?php
				for ($i = 0; $i < $stars; $i++) {
				?>
					<li><i class="icon_star"></i></li>
				<?php
				}
				?>
			</ul>
		</div>
		<div class="testimonials__bottom">
			<?php echo SCF::get('review__text'); ?></p>
		</div>
	</div>
	<?php
	if ($slider || $video) {
		// var_dump($video);
		// var_dump($slider);
		if ($video && count($slider) < 2) {
	?>
			<div class="testimonials__detail">
				<div class="video">
					<div class="video__wrap">
						<video src="<?php echo wp_get_attachment_url($video) ?>" poster="<?php echo wp_get_attachment_image_url(SCF::get('review__video_prev'), 'full') ?>"></video>
						<div class="video__play"><i class="icon_polygon"></i></div>
					</div>
				</div>
			</div>
		<?php
		}
		if (count($slider) > 1 && !$video) {
		?>
			<div class="testimonials__detail">
				<div class="swiper swiper_testimonials2_js">
					<div class="swiper-wrapper">
						<?php
						// $review_slider = SCF::get('review_slider');

						foreach ($slider as $item) {
						?>
							<div class="swiper-slide">
								<?php echo wp_get_attachment_image($item['review__slide'], 'full') ?>
							</div>
						<?php
						};
						?>
					</div>
					<div class="swiper__arrows swiper__arrows_write"><i class="icon_arrow_left"></i><i class="icon_arrow_right"></i></div>
				</div>
			</div>
	<?php
		}
	}
	?>
</div>