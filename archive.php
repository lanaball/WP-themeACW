<?php
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

		<?php
		/* Start the Loop */
		while (have_posts()) :
			the_post(); ?>
			<div class="archive">
				<div class="card col-s-4">
					<a class="link" href="<?php echo get_permalink(); ?>">
						<img class="hero-image" <?php the_post_thumbnail('medium'); ?> 
						
						
						<h1 class="card-title"><?php the_title(); ?></h1>
						<p class="author"> Written by: <?php the_author(); ?> </p>
						<?php the_excerpt(); ?>
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

<?php
get_sidebar();
get_footer();
