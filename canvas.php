<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head
        content must come *after* these tags -->
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
        <?php
        printf('<title>%s</title>', wp_title(' | ', false, 'right'));
        ?>

        <?php wp_head(); ?>
    </head>
    <body>
        <section class="canvas" id="page-canvas">
            <div class="container">
                <?php
                @the_content();
                ?>
            </div>
        </section>
        <footer role="contentinfo" id="footer" class="container foot-border">
            <div class="col-lg-12">
                ©<?=date("Y") ?>
                Feb Club Cruise   | <?=cctheme_get_option('footer_text') ?>
            </div>
        </footer>
        <div class="clear"></div>
        <?php wp_footer(); ?>
    </body>
</html>
