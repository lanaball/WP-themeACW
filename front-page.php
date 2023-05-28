<?php get_header(); ?>

<main class="fp">
    <div class="fp-hero">
        <div class="fp-hero__images">
            <img class="fp-hero__image1" src="<?php echo get_template_directory_uri(); ?>./images/jeanne@2x.webp" loading="lazy" alt="jeanne">
            <img class="fp-hero__image2" src="<?php echo get_template_directory_uri(); ?>./images/diana@2x.webp" loading="lazy" alt="diana">
            <img class="fp-hero__image1" src="<?php echo get_template_directory_uri(); ?>./images/beyonce@2x.webp" loading="lazy" alt="beyonce">
        </div>
        <div class="fp-hero__content">
            <h2>Making gender equality a reality</h2>
            <div class="fp-hero__mission">
                <a href="#"> <span class="material-symbols-rounded" style="padding: 1rem 1rem 0 0">
                        arrow_circle_right
                    </span>Learn about our mission</a>
            </div>
        </div>
    </div>

    <div class="container-column center">
        <h1> Aotearoa's Council of Wāhine</h1>
        <h5>NAU MAI, HAERE MAI</h5>
        <p>ACW is a national, feminist, membership, movement-support Council <br> working to achieve gender equality and justice in Aotearoa </p>
        <div class="btn-pair">
            <button class="btn-clr">Join Us</button>
            <button class="btn-full">Log In</button>
        </div>
    </div>

    <main class="container">
        <svg viewBox="0 0 68 33" class="chevron-down">
            <path d="M.58 3.414l27.432 27.433c2.715 2.715 7.167 2.787 9.964.164L67.356 3.46 64.62.54 35.24 28.093c-1.222 1.146-3.212 1.114-4.4-.075L3.408.586.579 3.414z">
            </path>
        </svg>
    </main>


    <main id="primary" class="site-main">
        <?php
        // Start of the loop.
        while (have_posts()) :
            the_content(); ?>
        <?php
        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->


    <?php get_footer(); ?>