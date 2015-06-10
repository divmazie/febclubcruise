<?php get_header(); ?>
<section id="content" role="main">
	<!--
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php comments_template(); ?>
<?php endwhile; endif; ?>
	-->
<div class="container">
<?php
	require 'top.php';
	$front_posts = new WP_Query( array(
	    'post_type' => 'front_page_item',
	    'posts_per_page' => -1,
	));
	$front_posts = $front_posts -> get_posts();
	wp_reset_postdata();
	
	foreach($front_posts as $post) {
		//var_dump($post);
		//echo "<br />".$post->post_content."<br />";
		$name = $post->post_name;
		$title = $post->post_title;
		if (strpos(" ".$title,"HIDE TITLE")) {
			$title = "";
		}
		$content = apply_filters('the_content',$post->post_content);
		$div_tags = " id=$name";
		echo $twig->render('article.html', array('title' => $title, 'content' => $content, 'div_tags' => $div_tags));
		//echo $twig->render('article.html', array('var1' => 'title', 'var2' => 'content'));
		
		// Output all the FAQs in the FAQ section
		if ($name == "front_faq") {
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
	}
	include "prereg_form.php";
?>
</div>
<?php get_template_part( 'nav', 'below' ); ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>