<?php


if(function_exists("register_field_group")) {

    $faqHeaderArr = array_map(function($val) {
        return htmlentities($val, ENT_QUOTES);
    }, $_ENV['FCC_FAQ_HEADERS_ORDERD']);
    register_field_group(array(
        'id' => 'acf_faq',
        'title' => 'FAQ',
        'fields' => array(
            array(
                'key' => 'field_544c2ecd0555e',
                'label' => 'Show on Front Page',
                'name' => 'show_on_front_page',
                'type' => 'checkbox',
                'choices' => array('show on front page' => 'show on front page', ),
                'default_value' => '',
                'layout' => 'vertical',
            ),
            array(
                'key' => 'field_54caf8c8c0de8',
                'label' => 'FAQ Section Header',
                'name' => 'faq_section_header',
                'type' => 'radio',
                'choices' => array_combine($faqHeaderArr, $faqHeaderArr),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'vertical',
            ),
        ),
        'location' => array( array( array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'faq',
                    'order_no' => 0,
                    'group_no' => 0,
                ), ), ),
        'options' => array(
            'position' => 'acf_after_title',
            'layout' => 'no_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));

}
?>