<?php get_header(); ?>
	<div class="mx-auto mt-12 mb-8 pb-16">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
<?php
get_footer();
