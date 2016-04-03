<?php
/**
 * Plugin Name: Guest Editor Widget
 * Description: A widget that displays the Guest Editor.
 * Version: 0.1
 * Author: Remy Kartzman
 * Author URI: http://rkartzman.github.io
 *License: none
 */



class GuestWidget extends WP_Widget {

  function __construct() {
    // Instantiate the parent object
    parent::__construct( false, 'Guest Widget' );
    add_action( 'admin_enqueue_scripts', array( $this, 'mfc_assets' ) );
  }

  function widget( $args, $instance ) {
    // Widget output
    ?>
    <div class="guest-editor-sidebar-widget widget">
      <div class="guest-editor">
        <h3>Guest Editor</h3>
      </div>
      <div class="content-wrapper">
        <p>
          <img src='<?php echo $instance['image'] ?>'>
        </p>
        <div class="guest-title">
          <a class="title" href="<?php echo $instance['link_url'] ?>"><h5><?php echo $instance['title'] ?></h5></a>
        </div>
        <?php if( $instance['description'] ): ?>
          <p class="editor-description"><?php echo $instance['description'] ?></p>
        <?php endif; ?>
      </div>


    </div>


    <?php
  }

  function update( $new_instance, $old_instance ) {
    // Save widget options
    return $new_instance;
    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }

    // Rest of the widget content

    echo $args['after_widget'];
    ?>
    <div class='mfc-description'>
    <?php echo wpautop( esc_html( $instance['description'] ) ) ?>
    </div>

    <div class='mfc-link'>
      <a href='<?php echo esc_url( $instance['link_url'] ) ?>'><?php echo esc_html( $instance['link_title'] ) ?></a>
    </div>
    <?php

  }

  function form( $instance ) {
    // Output admin widget options form
    $title = '';
    if( !empty( $instance['title'] ) ) {
        $title = $instance['title'];
    }

    $description = '';
    if( !empty( $instance['description'] ) ) {
        $description = $instance['description'];
    }

    $link_url = '';
    if( !empty( $instance['link_url'] ) ) {
        $link_url = $instance['link_url'];
    }

    $link_title = '';
    if( !empty( $instance['link_title'] ) ) {
        $link_title = $instance['link_title'];
    }
    $image = '';
    if(isset($instance['image']))
    {
        $image = $instance['image'];
    }

    ?>
    <p>
        <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>

    <p>
        <label for="<?php echo $this->get_field_name( 'description' ); ?>"><?php _e( 'Description:' ); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" ><?php echo esc_attr( $description ); ?></textarea>
    </p>

    <p>
        <label for="<?php echo $this->get_field_name( 'link_url' ); ?>"><?php _e( 'Link URL:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'link_url' ); ?>" name="<?php echo $this->get_field_name( 'link_url' ); ?>" type="text" value="<?php echo esc_attr( $link_url ); ?>" />
    </p>

    <p>
        <label for="<?php echo $this->get_field_name( 'link_title' ); ?>"><?php _e( 'Link Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'link_title' ); ?>" name="<?php echo $this->get_field_name( 'link_title' ); ?>" type="text" value="<?php echo esc_attr( $link_title ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
      <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
      <input class="upload_image_button" type="button" value="Upload Image" />
    </p>
    <?php
  }
  function mfc_assets() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_script('mfc-media-upload', plugin_dir_url(__FILE__) . 'mfc-media-upload.js', array( 'jquery' )) ;
    wp_enqueue_style('thickbox');
  }

}

function myplugin_register_widgets() {
  register_widget( 'GuestWidget' );
}

add_action( 'widgets_init', 'myplugin_register_widgets' );

// add_action('widgets_init', create_function('', 'return register_widget("guest_editor_widget");'));

?>