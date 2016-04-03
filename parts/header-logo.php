
<?php
$nimbus_image_logo = trim(nimbus_get_option('nimbus_image_logo'));
$nimbus_text_logo = trim(nimbus_get_option('nimbus_text_logo'));
echo "<div class='logo-wrap'>";
if (empty($nimbus_image_logo)) {
    if (!empty($nimbus_text_logo)) {
    ?>
        <h1 class="text_logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo $nimbus_text_logo; ?></a></h1>
    <?php
    }
} else {
?>

<div class="hero-banner">
  <?php if( function_exists('cyclone_slider') ) cyclone_slider('artpage'); ?>
</div>

<?php
}
echo "</div>";
?>