<!-- begin head-->
<section class="head section" id="head">
	<div class="head__img">
		<?php echo wp_get_attachment_image(SCF::get('service__photo'), 'full') ?>
	</div>
	<div class="container_center">
		<div class="head__content">
			<div class="breadcrumbs">
				<div class="aioseo-breadcrumbs"><span class="aioseo-breadcrumb"><a href="/">Home </a></span><span class="aioseo-breadcrumb-separator">/</span><span class="aioseo-breadcrumb"><?php the_title() ?></span></div>
			</div>
			<h1 class="section__title"><span><?php the_title() ?></span></h1>
		</div>
	</div>
</section>
<!-- end head-->
<?php
if (SCF::get('dream__title')) {
?>
	<!-- begin introduction-->
	<section class="introduction section" id="introduction">
		<div class="container_center">
			<div class="introduction__wrap">
				<div class="introduction__content">
					<div class="introduction__label"><span>/ <?php echo SCF::get('dream__subtitle'); ?></span></div>
					<h2 class="section__title"><span><?php echo SCF::get('dream__title'); ?></span></h2>
					<div class="section__text"><span><?php echo SCF::get('dream__text'); ?></span></div>
					<div class="introduction__btn"><a class="btn" href="<?php echo SCF::get('dream__btn_link'); ?>"><span><?php echo SCF::get('dream__btn'); ?></span></a></div>
				</div>
				<div class="introduction__gallery">
					<div class="introduction__img img">
						<?php echo wp_get_attachment_image(SCF::get('dream__photo'), 'full') ?>
					</div>
					<div class="introduction__img img">
						<?php echo wp_get_attachment_image(SCF::get('dream__photo_two'), 'full') ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end introduction-->
<?php
}

if (SCF::get('materials__title')) {
?>
	<!-- begin materials-->
	<section class="materials section" id="materials">
		<div class="container_center">
			<h2 class="section__title"><span><?php echo SCF::get('materials__title'); ?></span></h2>
			<div class="materials__wrap">
				<div class="tabs__wrapper">
					<?php
					$materials_list = SCF::get('materials_list');

					?>
					<div class="tabs">
						<?php
						foreach ($materials_list as $item) {
						?>
							<div class="tab"><span><?php echo $item['materials__list_title'] ?></span></div>
						<?php
						};
						?>
					</div>
					<div class="tabs__content">
						<?php
						foreach ($materials_list as $item) {
							$materials_perks = $item['materials__perks_list']
						?>
							<div class="tab__item">
								<div class="materials__inner">
									<div class="materials__content">
										<div class="materials__title"><span><?php echo $item['materials__list_title'] ?></span></div>
										<div class="section__text"><span><?php echo $item['materials__list_text'] ?></span></div>
										<?php
										if ($materials_perks) {
										?>
											<div class="materials__subtitle"><span>Perks</span></div>
											<?php echo $item['materials__perks_list'] ?>
											<!-- <ul class="materials__list list">
											<li class="section__text"><i class="icon_plus"></i><span>Smooth plaster finish is durable and easy to maintain, making it a popular choice for homeowners who want a pool that looks great and requires minimal upkeep.</span></li>
											<li class="section__text"><i class="icon_plus"></i><span>Additionally, the smooth surface of the plaster finish can help prevent algae growth, which can be a common problem in swimming pools.</span></li>
											<li class="section__text"><i class="icon_plus"></i><span>Overall, smooth plaster finish is an excellent choice for homeowners looking to create a beautiful and functional pool space.</span></li>
										</ul> -->
										<?php
										}
										?>
									</div>
									<div class="materials__img img">
										<?php echo wp_get_attachment_image($item['materials__list_photo'], 'full') ?>
									</div>
								</div>
							</div>
						<?php
						};
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- begin runningLine-->
	<div class="runningLine">
		<div class="runningLine__content">
			<div class="runningLine__list">
				<?php
				for ($i = 0; $i < 20; $i++) {
				?>
					<div class="runningLine__item"><span>Featured Project</span><span class="runningLine__sep">/ </span></div>
				<?php
				}
				?>
			</div>
		</div>
	</div>
	<!-- end runningLine-->
	<!-- end materials-->
<?php
}

if (SCF::get('steps__title') || SCF::get('steps__3_title') || SCF::get('steps__process_title') || SCF::get('steps__gallery_title')) {
?>
	<!-- begin projects-->
	<section class="projects section" id="projects">
		<div class="container_center counter-wrap">
			<?php
			if (SCF::get('steps__title')) {
			?>
				<div class="projects__row counter-item">
					<div class="projects__preview">
						<div class="projects__left">
							<h2 class="section__title"><span><?php echo SCF::get('steps__title'); ?></span></h2>
							<div class="projects__img img desktop">
								<?php echo wp_get_attachment_image(SCF::get('steps__photo'), 'full') ?>
							</div>
						</div>
						<div class="projects__right">
							<div class="projects__img img">
								<?php echo wp_get_attachment_image(SCF::get('steps__1_photo'), 'full') ?>
							</div>
							<div class="projects__title"><span><?php echo SCF::get('steps__1_title'); ?></span><small class="counter-el"></small></div>
							<div class="projects__text"><span><?php echo SCF::get('steps__1_text'); ?></span></div>
						</div>
					</div>
				</div>
			<?php
			}
			?>
			<?php
			if (SCF::get('steps__3_title')) {
			?>
				<div class="projects__row counter-item">
					<div class="projects__grid">
						<div class="projects__title"><span><?php echo SCF::get('steps__3_title'); ?></span><small class="counter-el"></small></div>
						<div class="projects__list">
							<?php
							$steps_materials = SCF::get('steps_materials');

							foreach ($steps_materials as $item) {
							?>
								<div class="projects__item">
									<div class="projects__img img"><?php echo wp_get_attachment_image($item['steps__materials_photo'], 'full') ?></div>
									<div class="projects__label"><span><?php echo $item['steps__materials_name'] ?></span></div>
								</div>
							<?php
							};
							?>
						</div>
					</div>
				</div>
			<?php
			}
			?>
			<?php
			if (SCF::get('steps__process_title')) {
			?>
				<div class="projects__row counter-item">
					<div class="projects__about">
						<div class="projects__left">
							<div class="projects__title"><span><?php echo SCF::get('steps__process_title'); ?></span><small class="counter-el"></small></div>
							<div class="projects__text"><span><?php echo SCF::get('steps__process_text'); ?></span></div>
							<div class="projects__img img">
								<?php echo wp_get_attachment_image(SCF::get('steps__process_photo_small'), 'full') ?>
							</div>
						</div>
						<div class="projects__right desktop">
							<div class="projects__img img"><?php echo wp_get_attachment_image(SCF::get('steps__process_photo'), 'full') ?></div>
						</div>
					</div>
				</div>
			<?php
			}
			?>
			<?php
			if (SCF::get('steps__gallery_title')) {
			?>
				<div class="projects__row counter-item">
					<div class="projects__slider">
						<div class="projects__title"><span><?php echo SCF::get('steps__gallery_title'); ?></span><small class="counter-el"></small></div>
						<div class="swiper swiper_projects_js">
							<div class="swiper-wrapper">
								<?php
								$steps_gallery = SCF::get('steps_gallery');

								foreach ($steps_gallery as $item) {
								?>
									<div class="swiper-slide">
										<div class="projects__slide">
											<div class="projects__img img">
												<?php echo wp_get_attachment_image($item['steps__gallery_photo'], 'full') ?>
												<div class="projects__category"><span><?php echo $item['steps__gallery_cat'] ?></span></div>
											</div>
											<div class="projects__location"><span><?php echo $item['steps__gallery_name'] ?></span></div>
											<div class="projects__text"><span><?php echo $item['steps__gallery_text'] ?></span></div>
										</div>
									</div>
								<?php
								};
								?>
							</div>
						</div>
						<div class="swiper__arrows desktop"><i class="icon_arrow_left"></i><i class="icon_arrow_right"></i></div>
						<div class="swiper__dotted projects_dotted_js mobile"></div>
					</div>
					<div class="projects__btn"><a class="btn" href="<?php echo SCF::get('steps__btn_link'); ?>"><span><?php echo SCF::get('steps__btn'); ?></span></a></div>
				</div>
			<?php
			}
			?>
		</div>
	</section>
	<!-- end projects-->
<?php
}
if (SCF::get('process__title')) {
?>
	<!-- begin process-->
	<section class="process section" id="process">
		<div class="container_center">
			<h2 class="section__title"><span><?php echo SCF::get('process__title'); ?></span></h2>
			<div class="section__text"><span><?php echo SCF::get('process__text'); ?></span></div>
			<div class="process__grid">
				<?php
				$process_list = SCF::get('process_list');

				foreach ($process_list as $item) {
				?>
					<div class="process__item">
						<div class="process__img img">
							<?php echo wp_get_attachment_image($item['process__list_icon']) ?>
						</div>
						<div class="process__title"><span><?php echo $item['process__list_title'] ?></span></div>
						<div class="section__text"><span><?php echo $item['process__list_text'] ?></span></div>
					</div>
				<?php
				};
				?>
			</div>
		</div>
	</section>
	<!-- end process-->
<?php
}
if (SCF::get('additional__title')) {
?>
	<!-- begin services-->
	<section class="services section" id="services">
		<div class="container_center">
			<div class="services__caption">
				<h2 class="section__title"><span><?php echo SCF::get('additional__title'); ?></span></h2>
				<div class="swiper__arrows swiper__arrows_reverse desktop"><i class="icon_arrow_left"></i><i class="icon_arrow_right"></i></div>
			</div>
			<div class="services__slider">
				<div class="swiper swiper_services_js">
					<div class="swiper-wrapper">
						<?php
						$additional_list = SCF::get('additional_list');

						foreach ($additional_list as $item) {
						?>
							<div class="swiper-slide">
								<div class="services__slide">
									<div class="services__content">
										<div class="services__title"><span><?php echo $item['additional__list_title'] ?></span></div>
										<div class="section__text"><span><?php echo $item['additional__list_text'] ?></span></div>
									</div>
									<div class="services__img img">
										<?php echo wp_get_attachment_image($item['additional__list_img'], 'full') ?>
									</div>
								</div>
							</div>
						<?php
						};
						?>
					</div>
				</div>
				<div class="swiper__dotted swiper__dotted_reverse services_dotted_js mobile"></div>
			</div>
			<div class="services__btn"><a class="btn" href="<?php echo SCF::get('additional__btn_link'); ?>"><span><?php echo SCF::get('additional__btn'); ?></span></a></div>
		</div>
	</section>
	<!-- end services-->
<?php
}
if (SCF::get('spa__title')) {
?>
	<!-- begin reconstruction-->
	<section class="reconstruction section" id="reconstruction">
		<div class="container_center">
			<div class="reconstruction__caption">
				<h2 class="section__title"><span><?php echo SCF::get('spa__title'); ?></span></h2>
				<div class="section__text"><span><?php echo SCF::get('spa__text'); ?></span></div>
				<div class="reconstruction__label"><span>/ <?php echo SCF::get('spa__subtitle'); ?></span></div>
			</div>
			<div class="reconstruction__list">
				<?php
				$spa_list = SCF::get('spa_list');

				foreach ($spa_list as $item) {
				?>
					<div class="reconstruction__item">
						<div class="reconstruction__img img">
							<?php echo wp_get_attachment_image($item['spa__list_img'], 'full') ?>
						</div>
						<div class="reconstruction__title"><span><?php echo $item['spa__list_title'] ?></span></div>
					</div>
				<?php
				};
				?>
			</div>
		</div>
	</section>
	<!-- end reconstruction-->
<?php
}
if (SCF::get('faq__title')) {
?>
	<!-- begin faq-->
	<section class="faq section" id="faq">
		<div class="faq__img img desktop">
			<?php echo wp_get_attachment_image(SCF::get('faq__img'), 'full') ?>
		</div>
		<div class="container_center">
			<h2 class="section__title"><span><?php echo SCF::get('faq__title'); ?></span></h2>
			<div class="faq__content">
				<?php
				$faq_list = SCF::get('faq_list');

				foreach ($faq_list as $item) {
				?>
					<div class="collapse" data-collapse-wrapper="">
						<div class="collapse__title" data-collapse=""> <span><?php echo $item['faq__list_title'] ?></span></div>
						<!-- Добавить класс open для открытого состояния-->
						<div class="collapse__body" data-collapse-body=""><span><?php echo $item['faq__list_text'] ?></span></div>
					</div>
				<?php
				};
				?>
			</div>
		</div>
	</section>
	<!-- end faq--><?php
				}
