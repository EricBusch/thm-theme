<?php

/**
 * Theme setup.
 */
function tailpress_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
}

add_action( 'after_setup_theme', 'tailpress_setup' );

/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'tailpress', tailpress_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'tailpress', tailpress_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string $path Path to asset.
 *
 * @return string
 */
function tailpress_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(), get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string $classes String of classes.
 * @param mixed $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
 * @param mixed $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3 );

add_action( 'wp_enqueue_scripts', function () {
	$version = '1.0.6';
	wp_enqueue_script( 'fslb-js', get_template_directory_uri() . '/js/fslightbox/fslightbox.js', [], $version, true );
	wp_enqueue_script( 'fslb-js-custom', get_template_directory_uri() . '/js/fslightbox/custom.js', [ 'fslb-js' ], $version, true );
} );

/**
 * Return an array of WP_Post objects for which are adjacent to the "current" $post.
 *
 * @param WP_Post|int $post
 * @param int $limit
 * @param array $overrides
 *
 * @return WP_Post[]
 */
function thm_get_adjacent_posts( WP_Post|int $post = 0, int $limit = 1, array $overrides = [] ): array {

	$post = get_post( $post );

	if ( ! $post ) {
		return [];
	}

	$post->is_current = true;

	$prev_posts = array_reverse( thm_get_prev_posts( $post, $limit, $overrides ) );
	$next_posts = thm_get_next_posts( $post, $limit, $overrides );

	$posts = [];

	foreach ( $prev_posts as $prev_post ) {
		$prev_post->is_current = false;
		$posts[]               = $prev_post;
	}

	$posts[] = $post;

	foreach ( $next_posts as $next_post ) {
		$next_post->is_current = false;
		$posts[]               = $next_post;
	}

	return $posts;
}

/**
 * Get the previous X number of posts in relation to the "current" $post.
 *
 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global $post.
 * @param int $limit Maximum number of posts to return.
 * @param array $overrides Query overrides
 *
 * @return WP_Post[]
 */
function thm_get_prev_posts( WP_Post|int $post = 0, int $limit = 1, array $overrides = [] ): array {

	$post = get_post( $post );

	if ( ! $post ) {
		return [];
	}

	return get_posts( [
		'post_type'        => 'post',
		'suppress_filters' => true,
		'orderby'          => $overrides['orderby'] ?? 'date',
		'order'            => $overrides['order'] ?? 'DESC',
		'numberposts'      => $overrides['numberposts'] ?? absint( $limit ),
		'post_status'      => $overrides['post_status'] ?? ( is_user_logged_in() ? 'any' : 'publish' ),
		'date_query'       => [ 'before' => $post->post_date ],
	] );
}

/**
 * Get the next X number of posts in relation to the "current" $post.
 *
 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global $post.
 * @param int $limit Maximum number of posts to return.
 * @param array $overrides Query overrides
 *
 * @return WP_Post[]
 */
function thm_get_next_posts( WP_Post|int $post = 0, int $limit = 1, array $overrides = [] ): array {

	$post = get_post( $post );

	if ( ! $post ) {
		return [];
	}

	return get_posts( [
		'post_type'        => 'post',
		'suppress_filters' => true,
		'orderby'          => $overrides['orderby'] ?? 'date',
		'order'            => $overrides['order'] ?? 'ASC',
		'numberposts'      => $overrides['numberposts'] ?? absint( $limit ),
		'post_status'      => $overrides['post_status'] ?? ( is_user_logged_in() ? 'any' : 'publish' ),
		'date_query'       => [ 'after' => $post->post_date ],
	] );
}