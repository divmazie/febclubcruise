<?php

if($post -> post_name == "faq") {

    $allHeadersOrdered = $_ENV['FCC_FAQ_HEADERS_ORDERD'];
    $faqsByHeader = array_combine($allHeadersOrdered, array_fill(0, count($allHeadersOrdered), array()));
	$header_ids = array();

    $faq_posts = new WP_Query( array(
        'post_type' => 'faq',
        'posts_per_page' => -1,
    ));
    $faq_posts = $faq_posts -> get_posts();
    wp_reset_postdata();

    $faqs = array();
    foreach($faq_posts as $faq_post) {
        $header = get_field('faq_section_header', $faq_post -> ID);
        $header = $header ? $header : 'No Header';
		$header_id = preg_replace("/\W+/", "", $header);
		$header_ids[$header] = $header_id;

        $name = $faq_post -> post_name;
        $title = $faq_post -> post_title;
        if(strpos(" " . $title, "HIDE TITLE")) {
            $title = "";
        }
        $content = apply_filters('the_content', $faq_post -> post_content);
        $faqsByHeader[$header][] = array(
            'title' => $title,
            'content' => $content,
            'slug' => $name
        );
    }

    echo $twig -> render('faq.html', array(
        'faqsByHeader' => $faqsByHeader,
        'title' => get_the_title(),
        'headerIDs' => $header_ids,
    ));

}
?>