<div class="hero">
    <?php /* get_template_part('parts/image', '1500_610'); */?>
    <?php if (class_exists('MultiPostThumbnails')) :
        $image_id = get_post_thumbnail_id ($post->ID );
        // echo $image_id;
        MultiPostThumbnails::the_post_thumbnail(get_post_type(),'secondary-image');
    endif; ?>
    <div class="title"><h2 class="page_title"><?php get_template_part( 'parts/title', 'page'); ?></h2></div>
    <div class="subtitle"><h5 class="page_subtitle"><?php echo the_subtitle(); ?></div></h5>
</div>

<?php
$nimbus_blog_sidebar_position = nimbus_get_option('nimbus_blog_sidebar_position');
$sidebar_select = get_post_meta($post->ID, 'sidebar_select', true);

if (empty($sidebar_select) || $sidebar_select == 'default') {
    $sidebar_select = $nimbus_blog_sidebar_position; #if the sidebar has not been specifically set to `none` on the post, then it defaults to the blog sidebar setting
}

/*
if ($sidebar_select == 'right') {
    $sidebar_select_aside_classes = 'sidebar-right';
    $sidebar_select_content_classes = 'content-main';
} else {
    $sidebar_select_aside_classes = 'col-sm-pull-8 sidebar-left';
    $sidebar_select_content_classes = 'col-sm-push-4 content-main';
}
*/


if ($sidebar_select == 'none') {
?>
    <div <?php post_class('main_content content row'); ?>>
        <div class="col-xs-12">
            <?php
            // <h2 class="page_title"><?php get_template_part( 'parts/title', 'page'); ?></h2>
              ?>
            <?php
            if (get_post_meta($post->ID, 'toggle_featured', true) == "show") {
                get_template_part( 'parts/image', '1168_526');
            }
            ?>
            <?php get_template_part( 'parts/single', 'meta'); ?>
            <?php
            the_content();
            n_clear();
            get_template_part( 'parts/single_social_buttons');
            get_template_part( 'parts/wp_link_pages');
            get_template_part( 'parts/tax_tags');
            comments_template();
            get_template_part( 'parts/single_post_nav');
            ?>
        </div>
    </div>
<?php
} else {
?>
    <div <?php post_class('main_content content row'); ?>>
        <div class="col-xs-12">
            <?php /*
            <h1 class="page_title"><?php get_template_part( 'parts/title', 'page'); ?></h1>
            */  ?>
            <?php
            if (get_post_meta($post->ID, 'toggle_featured', true) == "show") {
                // get_template_part( 'parts/image', '1168_526');
                n_clear();
            }
            ?>
            <div class="row single_meta">
                <div class="col-sm-8">
                    <p>
                    <?php
                    if (has_category()) {
                        the_category(', ');
                        echo ' | ';
                    }
                    ?>
                    <?php the_time(get_option('date_format')); ?> | <?php _e('By', 'nimbus'); ?> <?php the_author_posts_link(); ?></p>
                </div>
                <div class="col-sm-4">
                    <p class="text-right"><a href="<?php the_permalink(); ?>#comments" ><?php comments_number( __('No comments', 'nimbus'), __('One comment', 'nimbus'), __('% comments', 'nimbus') ); ?></a></p>
                </div>
            </div>

        </div>
        <?php n_clear(); ?>
        <div class="col-sm-8 content-main">
            <?php
            the_content();
            n_clear();
            get_template_part( 'parts/single_social_buttons');
            get_template_part( 'parts/wp_link_pages');
            get_template_part( 'parts/tags');
            comments_template();
            get_template_part( 'parts/single_post_nav');
            ?>
        </div>
        <div class="col-sm-4 sidebar sidebar-right">
          <?php
          get_sidebar();
          ?>
        </div>

    </div>

<?php
}
?>