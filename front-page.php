<?php
get_header();
?>
<?php
$posts_index = 1;
$nimbus_blog_sidebar_position = nimbus_get_option('nimbus_blog_sidebar_position');
if ($nimbus_blog_sidebar_position == 'right') {
    $sidebar_select_aside_classes = 'sidebar_right';
    $sidebar_select_content_classes = '';
} else {
    $sidebar_select_aside_classes = 'col-sm-pull-8 sidebar_left';
    $sidebar_select_content_classes = 'col-sm-push-4';
}
?>
<div id="main-content" class="main_content content row">
<!-- col-sm-8 -->
    <div class="col-sm-4  sidebar blog_sidebar_col instagram <?php echo $sidebar_select_aside_classes; ?>">
        <?php
        get_sidebar();
        ?>
    </div>

    <div class="col-sm-7 col-md-7 blog_content_col <?php echo $sidebar_select_content_classes; ?>">

        <?php
        if (have_posts()) {
            // $posts_index = 0;
            query_posts('showposts=3');
            $ids = array();

            while (have_posts()) {
                $ids[] = get_the_ID();
                the_post();

                $posts_index++;
                ?>


                <div <?php if($posts_index === 8 ) echo "id='hero'" ?> <?php post_class('') ?>>

                    <?php if (nimbus_get_option('nimbus_blog_layout') == 'full') { ?>
                        <div class="row">

                            <div class="col-md-12">
                                <h2 class="page_title"><a href="<?php the_permalink(); ?>"><?php get_template_part( 'parts/title', 'post'); ?></a></h2>
                            </div>
                        </div>
                        <?php n_clear(); ?>
                        <a href="<?php the_permalink(); ?>"><?php
                        if (get_post_meta($post->ID, 'toggle_featured', true) == "show") {
                            get_template_part( 'parts/image', '620_400');
                        }
                        ?></a>
                        <?php get_template_part( 'parts/single', 'meta'); ?>
                        <?php the_content();?>
                        <?php n_clear('30'); ?>
                        <div class="double-lines"></div>
                    <?php } else { ?>
                        <div class="row blog_content_row">

                         <div class="col-sm-12">
                         <a href="<?php the_permalink(); ?>"><?php
                                get_template_part( 'parts/image', '620_400');
                                ?></a>
                         <div class="row">
                            <div class="col-md-12">


                                <h2 class="page_title"><a href="<?php the_permalink(); ?>" ><?php get_template_part( 'parts/title', 'post'); ?></a></h2>
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
        }

         get_template_part( 'parts/blog', 'pagination');
        /*
        $wp_query = null;
        $wp_query = $original_query;
        wp_reset_postdata();
        */
    ?>


    </div>

    <?php if( dynamic_sidebar('guest_editors_widget') ) : else : endif; ?>

    <div class="col-sm-4 sidebar blog_sidebar_col instagram" >
        <h3 class="widget_title">Instagram</h3>

        <?php if( dynamic_sidebar('insta_widget') ) : else : endif; ?>

    </div>

    <div class="col-sm-7 col-md-7 blog_content_col hero-column<?php echo $sidebar_select_content_classes; ?>">
        <?php
        if (have_posts()) {
            // $posts_index = 0;
            // query_posts('showposts=8');
            // query_posts(array('post__not_in' => $ids));
            query_posts(array( 'offset' => 3 ));
            // echo $posts_index;
            while (have_posts()) {
                the_post();

                ?>

                <div <?php if($posts_index === 7 || $posts_index % 7 === 0 ) ?> <?php post_class('') ?>>

                    <?php if (nimbus_get_option('nimbus_blog_layout') == 'full') { ?>
                        <div class="row">

                            <div class="col-md-12">
                                <h2 class="page_title"><a href="<?php the_permalink(); ?>"><?php get_template_part( 'parts/title', 'post'); ?></a></h2>
                            </div>
                        </div>
                        <?php n_clear(); ?>
                        <a href="<?php the_permalink(); ?>"><?php
                        if (get_post_meta($post->ID, 'toggle_featured', true) == "show") {
                            get_template_part( 'parts/image', '620_400');
                        }
                        ?></a>
                        <?php get_template_part( 'parts/single', 'meta'); ?>
                        <?php the_content();?>
                        <?php n_clear('30'); ?>
                        <div class="double-lines"></div>
                    <?php } else { ?>
                        <div class="row blog_content_row">

                         <div class="col-sm-12">
                         <a href="<?php the_permalink(); ?>"><?php
                                get_template_part( 'parts/image', '620_400');
                                ?></a>
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
                <?php $posts_index++ ?>
        <?php
            }
        }

    ?>

    </div>
    <!-- -->
    <div class="col-sm-4  sidebar blog_sidebar_col <?php echo $sidebar_select_aside_classes; ?>">
        <?php
        get_sidebar();
        ?>
    </div>
</div>
<?php
get_footer();
?>