<?php get_header(); ?>
<section id="content" role="main">
	<div class="container">
	<?php
		require 'top.php';
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h2><? the_title() ?></h2>
			<?php get_template_part( 'entry' ); ?>
		<?php endwhile; endif; ?>
	<footer class="footer">
	<?php get_template_part( 'nav', 'below-single' ); ?>
	</footer>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>