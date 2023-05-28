<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<title>Aotearoa's Council of Wāhine</title>
	<?php wp_head(); ?>
</head>


<?php $background_color = get_theme_mod('background_color_setting'); ?>

<body style="background-color: <?php echo esc_attr($background_color); ?>" >
	<?php  wp_body_open(); ?>

	<div id="page" class="site">

		<header id="masthead" class="site-header">
			<a href="#">
				<div class="logo">
					<img class="logo-img" src="<?php echo get_template_directory_uri(); ?>./images/logo.png" alt="logo">
					<h1 class="logo-title">ACW</h1>
				</div>
			</a>


			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'national-council'); ?></button>
				<div class="main-navigation__container">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary-menu',
						)
					);
					?></div>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->