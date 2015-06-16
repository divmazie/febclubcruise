<?php get_header(); ?>
<section id="content" role="main">
	<div class="container">
	<?php
		require 'top.php';
		?>
		<h1 style="margin: auto; text-align: center;">404: Page Overboard!</h1>
		<article style="text-align: center;">
			<section class="entry-content">
				We couldn't find that page. Maybe find what you're looking for <a href="<?=get_site_url()?>">up on deck</a>?
			</section>
		</article>
</section>
<?php get_footer(); ?>