<?php get_header(); ?>
<section id="content" role="main">
	<div class="container">
	<?php
		require 'top.php';
		if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		?>
		<h2><? the_title() ?></h2>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="header">
			
			</header>
			<section class="entry-content">
				<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
				<?php the_content(); ?>
				<div class="entry-links"><?php wp_link_pages(); ?></div>
			</section>
		</article>
		<?php endwhile; endif; 
		// Output all the FAQs in the FAQ section
		if ($post->post_name == "faq") {
			$faq_posts = new WP_Query( array(
			    'post_type' => 'faq',
			    'posts_per_page' => -1,
			));
			$faq_posts = $faq_posts -> get_posts();
			wp_reset_postdata();
			echo "<div class='indent'>";
			foreach ($faq_posts as $faq_post) {
				$name = $faq_post->post_name;
				$title = $faq_post->post_title;
				if (strpos(" ".$title,"HIDE TITLE")) {
					$title = "";
				}
				$content = apply_filters('the_content',$faq_post->post_content);
				$div_tags = " id=$name";
				echo $twig->render('faq_item.html', array('title' => $title, 'content' => $content));
			}
			echo "</div>";
		}
		?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>