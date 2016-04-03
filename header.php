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
        } ?>" type="image/x-icon" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <!-- Global CSS -->

        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri().'/css/main.css' ?>">

        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">




        <script src="https://use.typekit.net/zow1vly.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
        <?php
        wp_head();
        ?>
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri().'/css/main.css' ?>">
        <?php include "php/scripts.php"; ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="container">
            <header>
                <div class="top-nav">
                    <?php
                    get_template_part( 'parts/header', 'social');
                    get_template_part( 'parts/header', 'content');
                    ?>
                </div>
                <div class="carousel">
                <?php get_template_part( 'parts/header', 'logo'); ?>
                </div>


            </header>
            <div class="line"></div>
            <?php
            get_template_part( 'parts/banner');
            ?>