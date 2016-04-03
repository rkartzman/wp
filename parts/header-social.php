<p id="social_buttons" class="text-right">
    <?php
    $social_type = array("fa-facebook" => "nimbus_facebook_url", "fa-linkedin" => "nimbus_linkedin_url", "fa-twitter" => "nimbus_twitter_url", "fa-youtube" => "nimbus_youtube_url", "fa-google-plus" => "nimbus_google_plus_url", "fa-vimeo-square" => "nimbus_vimeo_url", "fa-flickr" => "nimbus_flickr_url", "fa-wordpress" => "nimbus_wpcom_url", "fa-pinterest-square" => "nimbus_pinterest_url", "fa-instagram" => "nimbus_instagram_url", "fa-tumblr" => "nimbus_tumblr_url", "fa-envelope" => "nimbus_mail_url");
    foreach ($social_type as $key => $id) {
        $$id = trim(nimbus_get_option($id));
        $mailto = ($key == 'fa-envelope') ? 'mailto:' : '';
        if (empty($$id)) {
            if (nimbus_get_option('nimbus_example_content') == "on") {
                $id = "#";
            } else {
                $id = "";
            }
        } else {
            $id = $$id;
        }
        if (!empty($id)) {
        ?>
            <a href="<?php echo $mailto; ?><?php echo $id; ?>"><i class="fa <?php echo $key; ?> fa-socialcircle"></i></a>
        <?php
        }
    }
    if (nimbus_get_option('nimbus_hide_rss_icon') == 0) {
    ?>
        <a href="<?php echo get_bloginfo('rss2_url'); ?>"><i class="fa fa-rss fa-socialcircle" ></i></a>
    <?php
    }
    ?>
</p>