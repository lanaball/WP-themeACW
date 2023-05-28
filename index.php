<?php

/**
 * The main template file
 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package national-council
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php if (have_posts()) : ?>
		<header class="page-header">

			<?php
			the_archive_title('<h1 class="page-title">', '</h1>');
			the_archive_description('<div class="archive-description">', '</div>');
			?>
		</header><!-- .page-header -->
		<section class="container">
			<?php
			/* Start the Loop */
			while (have_posts()) :
				the_post(); ?>
				<div class="col-s-4">
					<div class="card ">
						<a class="link" href="<?php echo get_permalink(); ?>">
							<img class="hero-image" <?php the_post_thumbnail('medium'); ?> <h1 class="card-title"><?php the_title(); ?></h1>
							<p class="author"> Written by: <?php the_author(); ?> </p>
							<div class="excerpt-container">
								<p <?php the_excerpt(); ?> </div>
								<div class="tags">
									<ul>
										<?php the_category(); ?>
									</ul>
								</div>
							</div>
					</div>
			<?php

			endwhile;

			the_posts_navigation();

		else :

			get_template_part('template-parts/content', 'none');

		endif;
			?>

</main><!-- #main -->
</section>
<?php
get_sidebar();
get_footer();
