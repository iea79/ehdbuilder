<div class="portfolio__item">
	<a href="<?php the_permalink() ?>" class="portfolio__img img">
		<?php the_post_thumbnail('full') ?>
	</a>
	<div class="portfolio__content">
		<div class="portfolio__title"><span><?php the_title() ?></span></div>
		<div class="portfolio__text"><span></span></div>
	</div>
	<div class="portfolio__btn"><a class="btn" href="#"><span>read more</span></a></div><a class="portfolio__link" href="<?php the_permalink() ?>"><?php the_title() ?></a>
</div>