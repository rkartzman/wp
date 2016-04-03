<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php wp_title('', true); ?></title>
        <link rel="Shortcut Icon" href="<?php
        if (nimbus_get_option('favicon') != "") {
            echo nimbus_get_option('favicon');
        } else {
            echo get_template_directory_uri(); ?>/images/favicon.ico <?php } ?>" type="image/x-icon" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri().'/css/main.css' ?>">
        <?php
        wp_head();
        ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="container-fluid">
            <header>
              <div class="col-sm-12 col-md-6">
                <?php
                get_template_part( 'parts/header', 'leftlogo');
                ?>
              </div><div class="col-sm-12 col-md-6">
                <?php
                get_template_part( 'parts/header', 'social');
                // get_template_part( 'parts/header', 'logo');
                // get_template_part( 'parts/header', 'content');

                ?>
              </div>
            </header>
