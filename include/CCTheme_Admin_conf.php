<?php
$_ENV['CCTHEMEADMIN_OPTION_PAGE_KEY'] = 'cctheme_options';
$_ENV['CCTHEMEADMIN_OPTION_PAGE_METABOXID'] = 'cctheme_option_metabox';
$_ENV['CCTHEMEADMIN_OPTION_PAGE_TITLE'] = 'Feb Club Cruise Theme Options';
$_ENV['CCTHEMEADMIN_OPTION_PAGE_FIELDS'] = array( array(
        'name' => 'FAQ Categories',
        'desc' => 'pipe delimited categories for faqs, in order!',
        'id' => 'piped_cats',
        'type' => 'textarea_code',
        'default' => 'Sample 1|Sample 2|Sample 3',
    ), 
	array(
		'name' => 'Footer text',
		'desc' => 'Copyright and license info at the bottom of each page',
		'id' => 'footer_text',
		'type' => 'text_medium',
		'default' => 'Agency of record for Feb Club Cruise 2016 is Worldwide Travel and Cruise Associates, Inc. a licensed seller of travel in the state of Florida. License number 10505316.'
	) );
?>