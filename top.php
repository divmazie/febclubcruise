	<nav id="menu" role="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 
							  'depth' => 2,
							  'container' => false,
							  'menu_class' => 'nav nav-pills',
							  //Process nav menu using our custom nav walker
							  'walker' => new wp_bootstrap_navwalker() ) ); 
		?>
	</nav>
	<br/>
	<img src="<?php echo get_template_directory_uri(); ?>/img/banner-crop.jpg" class="img-responsive" alt="Hover text provided courtesy Randall Munroe">
	<br/>