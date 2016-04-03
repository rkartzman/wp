<?php

/*
Template Name: Full Page Template
*/

get_header('leftlogo');
?>

<div class="main_content content row fullpage">
    <div class="col-sm-12 ">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                $nimbus_feature_id = $post->ID;
        ?>
                <div <?php post_class(''); ?>>

                  <?php n_clear(); ?>
                  <h1><?php the_title(); ?></h1>
                  <?php the_content();?>
                  <?php n_clear(); ?>
                </div>
        <?php
            }
        }

?>

    </div>

</div>
<?php
get_footer();
?>