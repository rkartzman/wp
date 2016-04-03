        </div> <!-- //.container -->
        <?php if (is_active_sidebar( 'Footer Left' ) || is_active_sidebar( 'Footer Center' ) || is_active_sidebar( 'Footer Right' )) { ?>
        <div class="container footer">
            <div class="row footer_widgets">
                <div class="double-lines footer-top"></div>
                <div id="footer_widget_left" class="col-sm-4">
                    <?php
                    if (is_active_sidebar( 'Footer Left' )) {
                        dynamic_sidebar( 'Footer Left' );
                    } else {
                        get_template_part( 'parts/example_widgets', 'footer');
                    }
                    ?>
                </div>
                <div id="footer_widget_center_left" class="col-sm-4">
                    <?php
                    if (is_active_sidebar( 'Footer Center' )) {
                        dynamic_sidebar( 'Footer Center' );
                    } else {
                        get_template_part( 'parts/example_widgets', 'footer');
                    }
                    ?>
                </div>
                <div id="footer_widget_right" class="col-sm-4">
                    <?php
                    if (is_active_sidebar( 'Footer Right' )) {
                        dynamic_sidebar( 'Footer Right' );
                    } else {
                        get_template_part( 'parts/example_widgets', 'footer');
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="container noborder base">
            <div class="row">
                <div class="col-md-12">
                    <p id="copyright"><?php echo nimbus_get_option('copyright') ?></p>
                </div>

            </div>
        </div>
<?php wp_footer(); ?>
<script language="JavaScript">
  jQuery(function($) {

     $('.image_logo').attr('data-pin-no-hover','true');

})
</script>
</body>
</html>