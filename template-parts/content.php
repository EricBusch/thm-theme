<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_search() || is_archive() ) : ?>

		<header class="entry-header mb-4">
			<?php the_title( sprintf( '<h2 class="entry-title text-2xl md:text-3xl font-extrabold leading-tight mb-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished"
			      class="text-sm text-gray-700"><?php echo get_the_date(); ?></time>
		</header>

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>

	<?php else : ?>

		<div class="">

			<div class="narrow-container mb-5">
				<a href="<?php echo esc_url( get_permalink() ); ?>" title="Visit post">
					<time datetime="<?php echo get_the_date( 'c' ); ?>"
					      itemprop="datePublished"
					      class="text-base font-bold text-gray-700">
						<?php echo get_the_date(); ?>
					</time>
				</a>
			</div>

			<div class="entry-content narrow-container thm-prose">
				<?php
				the_content(
					sprintf(
						__( 'Continue reading %s', 'tailpress' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					)
				);

				wp_link_pages(
					array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'tailpress' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'tailpress' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					)
				);
				?>
			</div>

		</div>
	<?php endif; ?>

</article>

<?php /* Display a "山" separator between each post. */ ?>
<?php if ( ( $wp_query->current_post + 1 !== $wp_query->post_count ) ) : ?>
	<div class="flex flex-row items-center justify-center my-12 max-w-xl mx-auto space-x-4 px-8 cursor-default">
		<div class="h-0.5 bg-gradient-to-l from-primary-300 to-primary-200 w-full rounded-full"></div>
		<p class="font-zh text-4xl text-primary-500">山</p>
		<div class="h-0.5 bg-gradient-to-r from-primary-300 to-primary-200 w-full rounded-full"></div>
	</div>
<?php endif; ?>
