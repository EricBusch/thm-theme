<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Cardo:ital,wght@0,400;0,700;1,400&family=Liu+Jian+Mao+Cao&display=swap"
		rel="stylesheet">
</head>

<body <?php body_class( 'bg-primary-200 text-primary-800 font-serif antialiased' ); ?>>

<?php do_action( 'tailpress_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'tailpress_header' ); ?>

	<header class="border-b border-primary-300">
		<a href="<?php echo get_bloginfo( 'url' ); ?>"
		   class="flex flex-row items-center justify-center mx-auto px-8 max-w-md lg:max-w-lg py-8 lg:py-12">
			<img src="<?php echo get_template_directory_uri(); ?>/images/site-logo.svg"
			     alt="Logo"
			     class=""
			/>
		</a>
	</header>


	<div id=" content" class="site-content flex-grow ">
		<?php do_action( 'tailpress_content_start' ); ?>

		<main>
