<!-- begin head-->
<section class="head head_sm section" id="head">
	<div class="head__img"><?php echo wp_get_attachment_image(SCF::get('project__photo'), 'full') ?></div>
	<div class="container_center">
		<div class="head__content">
			<div class="breadcrumbs">
				<div class="aioseo-breadcrumbs"><span class="aioseo-breadcrumb"><a href="/">Home </a></span><span class="aioseo-breadcrumb-separator">/</span><span class="aioseo-breadcrumb"><?php the_title() ?></span></div>
			</div>
			<h1 class="section__title"><span><?php the_title() ?></span></h1>
			<div class="head__preview"><?php echo wp_get_attachment_image(SCF::get('project__photo_small'), 'full') ?></div>
		</div>
	</div>
</section>
<!-- end head-->
<!-- begin project-->
<section class="project section counter-wrap" id="project">
	<?php
	if (SCF::get('scope__title')) {
	?>
		<div class="project__row counter-item">
			<div class="container_center">
				<div class="scope">
					<div class="scope__content">
						<h2 class="section__title"><span><?php echo SCF::get('scope__title'); ?></span><small class="counter-el"></small></h2>
						<?php
						$scope_list = SCF::get('scope_list');

						if ($scope_list) {
						?>
							<div class="scope__list">
								<?php
								foreach ($scope_list as $item) {
								?>
									<div class="scope__item">
										<div class="scope__check"><i class="icon_check"></i></div>
										<div class="scope__text"><span><?php echo $item['scope__list_item'] ?></span></div>
									</div>
								<?php
								};
								?>
							</div>
						<?php
						}

						?>
					</div>
					<div class="scope__img img"><?php echo wp_get_attachment_image(SCF::get('scope__photo'), 'full') ?></div>
				</div>
			</div>
		</div>
	<?php
	}
	if (SCF::get('materials__title')) {
	?>
		<div class="project__row counter-item">
			<div class="container_center">
				<div class="employ">
					<h2 class="section__title"><span><?php echo SCF::get('materials__title'); ?></span><small class="counter-el"></small></h2>
					<?php
					$materials_list = SCF::get('materials_list');

					if ($materials_list) {
					?>
						<div class="employ__list">
							<?php
							foreach ($materials_list as $item) {
							?>
								<div class="employ__item">
									<div class="employ__img img">
										<?php echo wp_get_attachment_image($item['materials__photo']) ?>
									</div>
									<div class="employ__label"><span><?php echo $item['materials__list_item'] ?></span></div>
								</div>
							<?php
							};
							?>
						</div>
					<?php
					}

					?>
				</div>
			</div>
		</div>
	<?php
	}
	if (SCF::get('process__title')) {
	?>
		<div class="project__row counter-item">
			<div class="container_center">
				<div class="work">
					<div class="work__content">
						<h2 class="section__title"><span><?php echo SCF::get('process__title'); ?></span><small class="counter-el"></small></h2>
						<div class="work__text"><span><?php echo SCF::get('process__text'); ?></span></div>
						<div class="work__preview img">
							<?php echo wp_get_attachment_image(SCF::get('process__photo_small'), 'full') ?>
						</div>
					</div>
				</div>
			</div>
			<div class="work__img img desktop">
				<?php echo wp_get_attachment_image(SCF::get('process__photo'), 'full') ?>
			</div>
		</div>
	<?php
	}
	if (SCF::get('gallery__title')) {
	?>
		<div class="project__row counter-item">
			<div class="container_center">
				<div class="gallery">
					<div class="gallery__caption">
						<h2 class="section__title"><span><?php echo SCF::get('gallery__title'); ?></span><small class="counter-el"></small></h2>
						<div class="gallery__btn"><a class="btn" href="<?php echo SCF::get('gallery__btn_link'); ?>"><span><?php echo SCF::get('gallery__btn'); ?></span></a></div>
					</div>
					<div class="swiper swiper_projects_js">
						<div class="swiper-wrapper">
							<?php
							$gallery_list = SCF::get('gallery_list');

							foreach ($gallery_list as $key => $item) {
							?>
								<div class="swiper-slide">
									<div class="projects__slide">
										<div class="projects__img img">
											<?php echo wp_get_attachment_image($item['gallery__list_img'], 'full') ?>
											<?php
											if ($item['gallery__list_label']) {
											?>
												<div class="projects__category">
													<span><?php echo $item['gallery__list_label'] ?></span>
												</div>
											<?php
											}
											?>
										</div>
										<div class="projects__location"><span><?php echo $item['gallery__list_name'] ?></span></div>
									</div>
								</div>
							<?php
							};
							?>
						</div>
					</div>
					<div class="swiper__arrows swiper__arrows_write desktop"><i class="icon_arrow_left"></i><i class="icon_arrow_right"></i></div>
					<div class="swiper__dotted swiper__dotted_reverse projects_dotted_js mobile"></div>
				</div>
			</div>
		</div>
	<?php
	}
	if (SCF::get('like__title')) {
	?>
		<div class="project__row counter-item">
			<div class="container_center">
				<div class="likethis">
					<h2 class="section__title"><span><?php echo SCF::get('like__title'); ?></span><small class="counter-el"></small></h2>
					<?php
					?>
					<div class="likethis__list">
						<?php
						$likeList = SCF::get('like__list');

						$allProjects = get_posts([
							'numberposts' => 4,
							'post_type'      => 'projects',
							'include'        => $likeList,
							'orderby'       => 'post__in'
						]);

						if ($allProjects) {
							foreach ($allProjects as $post) {
								setup_postdata($post);
						?>
								<a class="likethis__item" href="<?php the_permalink() ?>">
									<div class="likethis__img img">
										<?php the_post_thumbnail('full') ?>
									</div>
									<div class="likethis__title"><span><?php the_title() ?></span></div>
								</a>
						<?php
							}
						}

						wp_reset_postdata(); // Сбрасываем $post
						?>
						<div class="likethis__btn"><a class="btn" href="<?php echo SCF::get('like__btn_link'); ?>"><span><?php echo SCF::get('like__btn'); ?></span></a></div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	?>
</section>
<!-- end project-->