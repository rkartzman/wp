<div class="logo-container">
  <a class="image-wrapper" href="<?php echo esc_url(home_url('/')); ?>"><img class="image_logo img-responsive" src="<?php echo get_stylesheet_directory_uri().'/images/frndofafrnd-logo-black.png' ?>" alt="<?php echo get_bloginfo('name', 'display'); ?>" /></a>
</div>
<div class="row">
    <nav id="menu_row" class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only"><?php _e('Toggle navigation', 'nimbus'); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand visible-xs" href="<?php echo home_url(); ?>">
                    <?php bloginfo('name'); ?>
                </a>
            </div>
            <?php
                wp_nav_menu( array(
                    'menu'              => 'primary',
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker()
                ));
            ?>
    </nav>
</div>

