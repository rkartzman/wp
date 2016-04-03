<?php
$nimbus_blog_sidebar_position = nimbus_get_option('nimbus_blog_sidebar_position');
if ($nimbus_blog_sidebar_position == 'right') {
    $sidebar_select_aside_classes = 'sidebar_right';
    $sidebar_select_content_classes = '';
} else {
    $sidebar_select_aside_classes = 'col-sm-pull-8 sidebar_left';
    $sidebar_select_content_classes = 'col-sm-push-4';
}
?>
<div class="row header_content">
  <?php /* echo category_description(); */ ?>
</div>
<div class="main_content content row">
    <div class="col-sm-8 blog_content_col <?php echo $sidebar_select_content_classes; ?>">
        <?php
        global $more;
        $more = 0;
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                ?>
                <div <?php post_class(''); ?>>
                    <?php if (nimbus_get_option('nimbus_blog_layout') == 'full') { ?>
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="page_title"><a href="<?php the_permalink(); ?>"><?php get_template_part( 'parts/title', 'post'); ?></a></h2>
                            </div>
                        </div>
                        <?php n_clear(); ?>
                        <a href="<?php the_permalink(); ?>"><?php
                        if (get_post_meta($post->ID, 'toggle_featured', true) == "show") {
                            get_template_part( 'parts/image', '750_900');
                        }
                        ?></a>
                        <?php get_template_part( 'parts/single', 'meta'); ?>
                        <?php the_content();?>
                        <?php n_clear('30'); ?>
                        <div class="double-lines"></div>
                    <?php } else { ?>
                        <div class="row blog_content_row">
                            <div class="col-sm-4">
                                <a href="<?php the_permalink(); ?>"><?php
                                get_template_part( 'parts/image', '230_230');
                                ?></a>
                            </div>
                            <div class="col-sm-8">
                         <div class="row">
                            <div class="col-md-12">
                                <h2 class="page_title"><a href="<?php the_permalink(); ?>"><?php get_template_part( 'parts/title', 'post'); ?></a></h2>
                            </div>
                        </div>
                                <?php n_clear(); ?>
                                <?php
                                the_excerpt();
                                ?>
                            </div>
                        </div>
                        <?php n_clear('30'); ?>
                        <div class="double-lines"></div>
                    <?php } ?>
                </div>
                <?php
            }
        } else {
                get_template_part( 'parts/error', 'no_results');
        }
        get_template_part( 'parts/blog', 'pagination');
        ?>
    </div>
    <div class="col-sm-4 sidebar blog_sidebar_col <?php echo $sidebar_select_aside_classes; ?>">
        <?php
        get_sidebar();
        ?>
    </div>
</div>