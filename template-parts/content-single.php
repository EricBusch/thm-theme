<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header bg-primary-700 w-full relative flex flex-col items-center justify-center mb-12">
		<?php echo wp_get_attachment_image( get_post_thumbnail_id(), 'large', false, [
			'class' => 'object-cover w-full h-[50vh] mix-blend-multiply',
			'alt'   => 'Cover image for ' . esc_attr( get_the_title() ),
		] ); ?>
		<div class="absolute flex flex-col">
			<?php the_title( sprintf( '<h1 class="entry-title text-4xl leading-tight mb-1 text-primary-50 text-balance max-w-xl text-center px-8"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			<time datetime="<?php echo get_the_date( 'c' ); ?>"
			      itemprop="datePublished"
			      class="text-sm text-primary-100 text-center">
				<?php echo get_the_date(); ?>
			</time>
		</div>
	</header>

	<div class="entry-content thm-prose px-8">
		<?php the_content(); ?>
	</div>

</article>
