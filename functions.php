<?php



// ------------------- adds style sheet and scripts -------------------
function add_my_assets()
{
	// links style and javascript
	wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');
	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), '1.0', true);

	// material UI icons
	wp_enqueue_style('material-icons', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,200,0,200');


	if (
		is_singular() && comments_open() && get_option('thread_comments')
	) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'add_my_assets');

// wp_enqueue_ is the hook then add it to add_my_assets is the function, spelling important, no s on the single script



// -------------------    adds theme supports   -------------------
function add_my_theme_supports()
{
	/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory. */
	load_theme_textdomain('national-council', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	add_theme_support('title-tags');


	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');


	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	// woocommerce features
	add_theme_support('woocommerce');
	// add_theme_support('wc-product-gallery-zoom');
	// add_theme_support('wc-product-gallery-lightbox');
	// add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'add_my_theme_supports');



// ------------------- theme customizer for user -------------------
// notes: you must add parameter, industry standard is to call it $wp_customize, then add variables and arrays. This is the customizer manager setting class

function theme_customize_register($wp_customize)
{
	// Add a new SECTION for background color, this adds the section in the dashboard
	$wp_customize->add_section('background_color_section', array(
		'title' => __('Background Color', 'your-theme'),
		'description' => 'change the background color of the website',
		'priority' => 30,
	));

	// Add the background color SETTING, this adds the hex to the code and will store it. add_setting is the container that holds the values and you can target this in code with 'background_color_setting'
	$wp_customize->add_setting('background_color_setting', array(
		'default' => '#ffffff', // Set the default background color (white)
		'sanitize_callback' => 'sanitize_hex_color',
	));

	// Add the background color CONTROL, color picker built into wordpress
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'background_color_control', array(
		'label' => __('Background Color'),
		'section' => 'background_color_section',
		'settings' => 'background_color_setting',
	)));


	$wp_customize->add_setting('my_setting', array(
		'default' => 'hello',
	));
	$wp_customize->add_control('my_setting_control', array(
		'label' => 'Add date',
		'section' => 'background_color_section',
		'settings' => 'my_setting',
		'type' => 'date',
	));
}
add_action('customize_register', 'theme_customize_register');




// ------------------- navigation custom function -------------------
function add_my_menus()
{
	register_nav_menus(
		array(
			'primary-menu' => __('Primary Menu'),
			'secondary-menu' => __('Secondary Menu'),
		)
	);
}
add_action('init', 'add_my_menus');



/**
 * ------------------- Custom Fonts -------------------
 * font-family: 'Poppins', sans-serif;
 */
function enqueue_custom_fonts()
{
	if (!is_admin()) {
		wp_register_style('poppins', 'https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap');

		wp_enqueue_style('poppins');
	}
}
add_action('wp_enqueue_scripts', 'enqueue_custom_fonts');




/* ------------- Register widget ----------------- */
function my_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'national-council'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'national-council'),
			'before_widget' => '<section id="widget" class="widget">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'my_widgets_init');




/* ------------- Custom template tags ----------------- */
/**
 * Prints HTML with meta information for the current post-date/time.
 */
if (!function_exists('council_posted_on')) :
	function council_posted_on()
	{
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if (get_the_time('U') !== get_the_modified_time('U')) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr(get_the_date(DATE_W3C)),
			esc_html(get_the_date()),
			esc_attr(get_the_modified_date(DATE_W3C)),
			esc_html(get_the_modified_date())
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x('Posted on %s', 'post date', 'national-council'),
			'<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;



/**
 * Prints HTML with meta information for the current author.
 */
if (!function_exists('council_posted_by')) :
	function council_posted_by()
	{
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x('by %s', 'post author', 'national-council'),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;


/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
if (!function_exists('council_entry_footer')) :
	function council_entry_footer()
	{
		// Hide category and tag text for pages.
		if ('post' === get_post_type()) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list(esc_html__(', ', 'council'));
			if ($categories_list) {
				/* translators: 1: list of categories. */
				printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'council') . '</span>', $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'council'));
			if ($tags_list) {
				/* translators: 1: list of tags. */
				printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'council') . '</span>', $tags_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__('Leave a Comment <span class="screen-reader-text"> on %s </span>', 'council'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Edit <span class="screen-reader-text">%s</span>', 'council'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;


/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
if (!function_exists('council_post_thumbnail')) :
	function council_post_thumbnail()
	{
		if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
			return;
		}

		if (is_singular()) :
?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				?>
			</a>

	<?php
		endif; // End is_singular().
	}
endif;




/**
 * Add own stylesheet to woocommerce
 */
function wp_enqueue_woocommerce_style()
{
	wp_register_style('mytheme-woocommerce', get_template_directory_uri() . '/css/woocommerce/woocommerce.css');

	if (class_exists('woocommerce')) {
		wp_enqueue_style('mytheme-woocommerce');
	}
}
add_action('wp_enqueue_scripts', 'wp_enqueue_woocommerce_style');


/**
 * Show cart contents / total Ajax
 */
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments)
{
	global $woocommerce;

	ob_start();

	?>
	
<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}
