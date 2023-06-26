<!-- begin singleblog-->
<section class="singleblog section" id="singleblog">
	<div class="singleblog__head">
		<div class="container_center">
			<div class="breadcrumbs">
				<div class="aioseo-breadcrumbs"><span class="aioseo-breadcrumb"><a href="/">Home </a></span><span class="aioseo-breadcrumb-separator">/</span><span class="aioseo-breadcrumb"><a href="/blog/">blog </a></span><span class="aioseo-breadcrumb-separator">/</span><span class="aioseo-breadcrumb"><?php the_title() ?></span></div>
			</div>
			<div class="singleblog__wrap">
				<div class="singleblog__description">
					<h1 class="singleblog__title"> <span><?php the_title() ?></span></h1>
					<div class="singleblog__info">
						<div class="blog__date"><span><?php the_date('M d, Y') ?></span></div>
						<div class="blog__time"><i class="icon_time"></i><span><?php reading_time(get_the_ID()) ?></span></div>
					</div>
				</div>
				<?php
				$post_cats = get_the_category();
				if ($post_cats) {
				?>
					<ul class="blog__hashtag">
						<?php
						foreach ($post_cats as $key => $cat) {
						?>
							<li><span>#<?php echo $cat->name ?></span></li>
						<?php
						}
						?>
					</ul>
				<?php
				}
				?>
			</div>
			<div class="singleblog__img"><?php the_post_thumbnail('full') ?></div>
		</div>
	</div>
	<div class="container_center">
		<div class="singleblog__main">
			<div class="singleblog__aside">
				<div class="aside">
					<div class="aside__item">
						<div class="aside__title"><span>Table of contents:</span></div>
						<ul class="aside__list">
							<li><span>Smooth Plaster Finish</span></li>
							<li><span>Shimmering Pebble Finish</span></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="section__content">
				<?php the_content() ?>
			</div>
		</div>
	</div>
	<?php
	$next_post_link = get_next_post_link('%link', 'next article title');
	if ($next_post_link) {
	?>
		<div class="singleblog__next"><?php echo $next_post_link ?></div>
	<?php
	}
	?>
</section>
<!-- end singleblog-->