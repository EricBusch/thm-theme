<?php get_header(); ?>

	<div>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'single' ); ?>
				<!--				<div class="flex flex-row items-center justify-between mx-auto max-w-2xl w-full px-8 text-lg mt-16">-->
				<!--					<div class="">--><?php //previous_post_link( '← %link' ); ?><!--</div>-->
				<!--					<div class="">--><?php //next_post_link( '%link →' ); ?><!--</div>-->
				<!--				</div>-->


				<div class="narrow-container mt-16">

					<!-- https://cruip-tutorials.vercel.app/vertical-timelines/ -->
					<div class="my-6">
						<?php $adjacent_posts = array_reverse( thm_get_adjacent_posts( get_the_ID(), 2 ) ); ?>

						<?php foreach ( $adjacent_posts as $adjacent_post )  : ?>

							<div class="relative pl-8 sm:pl-40 py-6 group">
								<div
									class="flex flex-col sm:flex-row items-start mb-1 group-last:before:hidden before:absolute before:left-2 sm:before:left-0 before:h-full before:px-px before:bg-primary-300 sm:before:ml-[8.5rem] before:self-start before:-translate-x-1/2 before:translate-y-3 after:absolute after:left-2 sm:after:left-0 after:w-2 after:h-2 <?php echo ( $adjacent_post->is_current ) ? 'after:bg-primary-700' : 'after:bg-primary-400'; ?> after:border-4 after:box-content after:border-primary-200 after:rounded-full sm:after:ml-[8.5rem] after:-translate-x-1/2 after:translate-y-1.5">
									<time
										class="sm:absolute left-0 translate-y-0.5 inline-flex items-center justify-center text-sm font-semibold w-28 h-6 mb-3 sm:mb-0 text-primary-600 bg-primary-300/50 rounded-full whitespace-nowrap">
										<?php echo date_i18n( 'M j Y', strtotime( $adjacent_post->post_date ) ); ?>
									</time>
									<?php if ( $adjacent_post->is_current ) : ?>
										<div
											class="text-xl font-bold text-primary-900">
											<?php echo $adjacent_post->post_title; ?>
										</div>
									<?php else : ?>
										<a href="<?php echo esc_url( get_permalink( $adjacent_post->ID ) ); ?>"
										   class="text-xl text-primary-700 hover:text-primary-800 transition-colors duration-300">
											<?php echo $adjacent_post->post_title; ?>
										</a>
									<?php endif; ?>

								</div>
								<!-- Content -->
								<div class="text-slate-500">
									<?php echo $adjacent_post->post_excerpt; ?>
								</div>
							</div>

						<?php endforeach; ?>
					</div>


				</div>

			<?php endwhile; ?>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>