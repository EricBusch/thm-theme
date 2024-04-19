</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<footer id="colophon" class="site-footer pt-16 pb-8 md:pb-10" role="contentinfo">
	<?php do_action( 'tailpress_footer' ); ?>

	<div class="flex flex-col items-center">
		<p class="font-zh text-4xl text-primary-700">山</p>
		<a href="/"
		   class="uppercase tracking-[.2em] text-primary-900 text-lg mt-1.5"><?php echo get_bloginfo( 'name' ); ?></a>
		<p class="text-primary-700 text-balance max-w-xl text-center mt-1.5"><?php echo get_bloginfo( 'description' ); ?></p>
	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
