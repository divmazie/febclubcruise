<br/>
<img src="<?php echo get_template_directory_uri(); ?>/img/banner-crop.jpg" class="img-responsive" alt="Hover text provided courtesy Randall Munroe">
<br/>
<nav id="menu" role="navigation">
	<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 
						'depth' => 2,
						'depth'             => 2,
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse',
						'menu_class' => 'nav nav-pills',
						'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
						//Process nav menu using our custom nav walker
						'walker' => new wp_bootstrap_navwalker() ) ); 
	?>
</nav>