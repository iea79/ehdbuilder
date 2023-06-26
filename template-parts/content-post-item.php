<div class="blog__item">
	<a href="<?php echo the_permalink() ?>" class="blog__bg bg" style="background-image: url(<?php the_post_thumbnail_url() ?>)">
		<?php
		$post_cat = get_the_category();
		if ($post_cat) {
		?>
			<ul class="blog__hashtag">
				<?php
				foreach ($post_cat as $key => $cat) {
				?>
					<li><span>#<?php echo $cat->name ?></span></li>
				<?php
				}
				?>
			</ul>
		<?php
		}
		?>
	</a>
	<div class="blog__content">
		<div class="blog__left">
			<?php
			if ($post_cat) {
			?>
				<ul class="blog__hashtag">
					<?php
					foreach ($post_cat as $key => $cat) {
					?>
						<li><span>#<?php echo $cat->name ?></span></li>
					<?php
					}
					?>
				</ul>
			<?php
			}
			?>
			<div class="blog__title"><span><?php the_title() ?></span></div>
			<div class="blog__excerpt"><span><?php the_excerpt() ?></span></div>
		</div>
		<div class="blog__right">
			<div class="blog__btn"><a class="btn" href="#"><span>READ more</span></a></div>
			<div class="blog__time"><i class="icon_time"></i><span><?php reading_time(get_the_ID()) ?></span></div>
			<div class="blog__date"><span><?php echo get_the_date('M d, Y') ?></span></div>
		</div>
	</div>
	<div class="blog__link"><a href="<?php echo the_permalink() ?>">READ more</a></div>
</div>