<?php
$meta = SCF::gets(BLOG_PAGE_ID);
?>
<!-- begin head-->
<section class="head section" id="head">
	<div class="head__img">
		<?php echo wp_get_attachment_image($meta['first__img'], 'full') ?>
	</div>
	<div class="container_center">
		<div class="head__content">
			<div class="breadcrumbs">
				<div class="aioseo-breadcrumbs"><span class="aioseo-breadcrumb"><a href="/">Home </a></span><span class="aioseo-breadcrumb-separator">/</span><span class="aioseo-breadcrumb"><?php echo get_the_title(BLOG_PAGE_ID) ?></span></div>
			</div>
			<h1 class="section__title"><span><?php echo $meta['first__title']; ?></span></h1>
		</div>
	</div>
</section>
<!-- end head-->
<section class="blog section" id="blog">
	<div class="container_center">
		<div class="blog__cat">
			<?php
			$posts_categories = get_categories();
			// var_dump($posts_categories);
			if ($posts_categories) {
			?>
				<ul class="cat-list">
					<?php
					foreach ($posts_categories as $key => $post_cat) {
						$category_link = '/blog/?category_name=' . $post_cat->slug;
						$class_name = 'cat-item';

						if (get_query_var('category_name') === $post_cat->slug) {
							$category_link = '/blog/';
							$class_name = 'cat-item current-cat';
						}
					?>
						<li class="<?php echo $class_name ?>">
							<a href="<?php echo $category_link ?>"><?php echo $post_cat->name ?></a>
						</li>
					<?php
					}
					?>
				</ul>
			<?php
			}
			?>
		</div>
		<div class="blog__grid">
			<?php
			while (have_posts()) :
				the_post();
				get_template_part('template-parts/content', get_post_type() . '-item');
			endwhile;
			?>
		</div>

	</div>
	<?php the_posts_pagination([
		'show_all'     => true,
		'prev_next'    => false,
	]) ?>
</section>