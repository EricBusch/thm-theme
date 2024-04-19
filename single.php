<?php get_header(); ?>

	<div>

		<?php if ( have_posts() ) : ?>

			<?php
			while ( have_posts() ) :
				the_post();
				?>

				<?php get_template_part( 'template-parts/content', 'single' ); ?>

				<div class="flex flex-row items-center justify-between mx-auto max-w-2xl w-full px-8 text-lg mt-16">
					<div class=""><?php previous_post_link('← %link'); ?></div>
					<div class=""><?php next_post_link('%link →'); ?></div>
				</div>

			<?php endwhile; ?>

		<?php endif; ?>

	</div>

<?php
get_footer();
