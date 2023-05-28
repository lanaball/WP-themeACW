<?php get_header(); ?>

<main id="primary" class="site-main">
	<?php while (have_posts()) : the_post(); ?>

	<!-- MAIN POST -->
		<article class="post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="row">
			<img class="image-single col-s-6" <?php echo the_post_thumbnail(); ?>	
				<?php the_title('<h1 class="entry-title col-s-6">', '</h1>'); ?>
		
			</header><!-- .entry-header -->

			<div class="entry-content">
				 <?php the_content(); ?>
			</div><!-- .entry-content -->

			
	<!-- EDIT POST IF LOGGED IN-->
			<?php if (get_edit_post_link()) : ?>
				<footer class="entry-footer"> <?php
				edit_post_link(
				sprintf(
				wp_kses(
			__('Edit', 'national-council'),
			array(
		'span' => array(
		'class' => array(),
		),
	)
),
	wp_kses_post(get_the_title())
		),
	);
?>
				</footer>
			<?php endif; ?>
		</article><!-- #post-<?php the_ID();


								// the_post_navigation(
								// 	array(
								// 		'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'national-council') . '</span> <span class="nav-title">%title</span>',

								// 		'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'national-council') . '</span> <span class="nav-title">%title</span>',
								// 	)
								// );

								// If comments are open or we have at least one comment, load up the comment template.
								if (comments_open() || get_comments_number()) :
									comments_template();
								endif;
							endwhile; // End of the loop.
								?>

<?php get_sidebar();
get_footer();
