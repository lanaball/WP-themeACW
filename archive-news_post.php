<?php get_header() ?>

<div>
    <h1>this is a custom post archive</h1>
    <?php
    if (have_posts()) {
        while (have_posts()) : the_post();
    ?>
</div>
<main>

    <h1><?php the_title(); ?></h1>
    <p><?php the_author(); ?></p>
<?php
        endwhile;
    }; ?>

<?php get_footer() ?>