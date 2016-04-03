<?php

/* **************************************************************************************************** */
// Register Sidebars
/* **************************************************************************************************** */
// remove_action('widgets_init', 'nimbus_register_sidebars');
// add_action('widgets_init', 'foaf_register_sidebars');

function child_remove_parent_function() {
    remove_action('widgets_init', 'nimbus_register_sidebars');
    remove_action("admin_init", "nimbus_sidebar_meta_box");
    remove_action('save_post', 'nimbus_save_sidebar_meta_box');
}
add_action( 'after_setup_theme', 'child_remove_parent_function' );

add_action('after_setup_theme', 'foaf_setup');
if (!function_exists('foaf_setup')):

    function foaf_setup() {

        add_image_size('foaf_750_450', 750, 450, true);
        add_image_size('foaf_390_175', 390, 175, true);
        add_image_size('foaf_650_390', 650, 390, true);
    }
endif;




add_action('widgets_init', 'foaf_register_sidebars');
function foaf_register_sidebars() {

    register_sidebar(array(
        'name' => __('About Me', 'nimbus'),
        'id' => 'sidebar_about_me',
        'description' => __('Some description about yourself. Try the `nimbus image box` widget.', 'nimbus'),
        'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title sidebar-widget-title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Default Page Sidebar', 'nimbus'),
        'id' => 'sidebar_pages',
        'description' => __('Widgets in this area will be displayed in the sidebar on the pages.', 'nimbus'),
        'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title sidebar-widget-title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Default Blog Sidebar', 'nimbus'),
        'id' => 'sidebar_blog',
        'description' => __('Widgets in this area will be displayed in the sidebar on the blog and posts.', 'nimbus'),
        'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title sidebar-widget-title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Home Page Sidebar', 'frndofafrnd'),
        'id' => 'sidebar_homepage',
        'description' => __('Widgets in this area will be displayed in the sidebar on the home page.', 'nimbus'),
        'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_widget homepage_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title sidebar-widget-title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Footer Left', 'nimbus'),
        'id' => 'footer-left',
        'description' => __('Widgets in this area will be shown in the left footer column.', 'nimbus'),
        'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_editable">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Footer Center', 'nimbus'),
        'id' => 'footer-center',
        'description' => __('Widgets in this area will be shown in the center footer column.', 'nimbus'),
        'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_editable">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Footer Right', 'nimbus'),
        'id' => 'footer-right',
        'description' => __('Widgets in this area will be shown in the right footer column.', 'nimbus'),
        'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_editable">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'Guest Editors Widget',
        'id' => 'guest_editors_widget',
        'before_widget' => '<div class="guest-editors" style="position: relative !important; display: block;">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'Guest Editor Box',
        'id' => 'guest_editor_widget',
        'before_widget' => '<div class="guest-editor">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => 'Insta Widget',
        'id' => 'insta__widget',
        'before_widget' => '<div class="instagram-middle" style="position: relative !important; display: block;">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
    ));


}


function subtitles_mod_supported_views() {

   return false;

} // end function subtitles_mod_supported_views
add_filter( 'subtitle_view_supported', 'subtitles_mod_supported_views' );


/*
Recent Posts with Thumbnails Widget
https://github.com/zoerooney/Recent-Posts-Thumbnail-Widget
Author: Zoe Rooney
http://zoerooney.com
License GPL2
*/



class foaf_featured_posts_thumbnail extends WP_Widget {

    function __construct() {
        parent::__construct(
          'foaf-featured-posts', // Base ID
          'Frnd of a Frnd - Featured Posts with Thumbnails', // Name
          array( 'description' => __('Display featured posts with thumbnails'), ) // Args
        );
}


    public function widget($args, $instance) {
            extract($args);

      $title = apply_filters( 'widget_title', $instance['title'] );
      $number = $instance['number'];
      $id = $instance['id'];
      $thumbsize = 'nimbus_300_200';


            echo $before_widget . $before_title;
            if ( ! empty ( $title ) ) {
              echo $title;
            }
            echo $after_title; // widget title
        $sticky = get_option( 'sticky_posts' );
        $args = array (
          'posts_per_page'  => $number,
          'cat'             => $id,
          'post__not_in'    => $sticky,
          'order' => 'DESC',
          'orderby' => 'modified'
        );
        $neatly_posts = new WP_Query($args);

        if( $neatly_posts->have_posts() ) {
          $i=1;$printthumbs="";
          while( $neatly_posts->have_posts() ) : $neatly_posts->the_post(); ?>
              <?php if ( has_post_thumbnail() ) {
                        if ($i == 2) {$i=1;}
                        if ($i==1) {$printthumbs.="<div class='row thumb_widget_row'>";}
                        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'nimbus_390_175' );
                        $title = get_the_title();
                        if ( function_exists( 'get_the_subtitle' ) ) {
                          $title .= ' - ' . get_the_subtitle();
                        }
                        $printthumbs.="<div class='col-xs-12'><a href='".get_the_permalink()."'><img src='".$image_url[0]."' class='img-responsive'/><figcaption>" .$title  . "</figcaption></a></div>";
                        if ($i==1) {$printthumbs.="</div>"."\n";}
                        $i++;
              } else {continue;} ?>
          <?php endwhile;
        }
        wp_reset_postdata();
            echo $printthumbs;
            echo $after_widget;
            echo "<p><a href='".get_category_link( $id )."'>more...</a></p>";
        }


    public function form( $instance ) {

        if (isset( $instance[ 'title' ] ) ) {
            $title = strip_tags($instance['title']);
        } else {
            $title = '';
        }

        if (isset( $instance[ 'number' ] ) ) {
            $number = $instance['number'];
        } else {
            $number = '5';
        }

        if (isset( $instance[ 'id' ] ) ) {
            $id = $instance['id'];
        } else {
            $id = '1';
        }



    ?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
    <p><em><?php _e('Use the following options to customize the display.', 'nimbus'); ?></em></p>

    <p style="border-bottom:4px double #eee;padding: 0 0 10px;">
      <label for="<?php echo $this->get_field_id( 'id' ); ?>"><?php _e('ID of Category to Show', 'nimbus'); ?></label>
      <input id="<?php echo $this->get_field_id( 'id'); ?>" name="<?php echo $this->get_field_name( 'id' ); ?>" value="<?php echo esc_attr($id); ?>" type="id" style="width:100%;" /><br><br>
      <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of Posts Displayed (must be even)', 'nimbus'); ?></label>
      <input id="<?php echo $this->get_field_id( 'number'); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo esc_attr($number); ?>" type="number" style="width:100%;" /><br><br>
      <label for="<?php echo $this->get_field_id( 'show_title' ); ?>"><?php _e('Show the post titles?', 'nimbus'); ?>
    </p>

    <?php }


    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = strip_tags($new_instance['number']);
        $instance['id'] = strip_tags($new_instance['id']);

        return $instance;
    }

}

function register_foaf_featured_posts_thumbnail() {
    register_widget( 'foaf_featured_posts_thumbnail' );
}
add_action( 'widgets_init', 'register_foaf_featured_posts_thumbnail' );

add_theme_support( 'html5', array( 'search-form' ) );
add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);
function add_search_form($items, $args) {
        if( $args->theme_location == 'primary' )
        $items .= '<li class="nav-menu-search">' . get_search_form(false) . '</li>';
   return $items;
}


if ( ! function_exists('cpt_obsession') ) {

// Register Custom Post Type
function cpt_obsession() {

  $labels = array(
    'name'                => _x( 'Obsessions', 'Post Type General Name', 'frnd' ),
    'singular_name'       => _x( 'Obsession', 'Post Type Singular Name', 'frnd' ),
    'menu_name'           => __( 'Obsession', 'frnd' ),
    'name_admin_bar'      => __( 'Obsession', 'frnd' ),
    'parent_item_colon'   => __( 'Parent Item:', 'frnd' ),
    'all_items'           => __( 'All Items', 'frnd' ),
    'add_new_item'        => __( 'Add New Item', 'frnd' ),
    'add_new'             => __( 'Add New', 'frnd' ),
    'new_item'            => __( 'New Item', 'frnd' ),
    'edit_item'           => __( 'Edit Item', 'frnd' ),
    'update_item'         => __( 'Update Item', 'frnd' ),
    'view_item'           => __( 'View Item', 'frnd' ),
    'search_items'        => __( 'Search Item', 'frnd' ),
    'not_found'           => __( 'Not found', 'frnd' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'frnd' ),
  );
  $args = array(
    'label'               => __( 'Obsession', 'frnd' ),
    'description'         => __( 'Products that the editors are currently obsessed with', 'frnd' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'excerpt', 'thumbnail', ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-smiley',
    'show_in_admin_bar'   => false,
    'show_in_nav_menus'   => false,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => true,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'obsession', $args );

}
add_action( 'init', 'cpt_obsession', 0 );

}

function remove_su_meta_box_obsession() {
  remove_meta_box('su_postmeta', 'obsession', 'normal');
}
add_action('admin_menu', 'remove_su_meta_box_obsession',1);

add_theme_support('infinite-scroll', array(
    'container' => 'main-content',
    'footer_widgets' => false
));

// function frndofafrnd_style_child_widgets_init() {
//     register_sidebar(array(
//         'name' => 'Guest Editors Widget',
//         'id' => 'guest_editors_widget',
//         'before_widget' => '<div class="guest-editors">'
//         'after_widget' => '</div>',
//         'before_title' => '<h3 class="editors-title">',
//         'after_title' => '</h3>'
//     ));
// }

// add_action('widgets_init', 'frndofafrnd-style_child_widgets_init');

// function register_foaf_guest_edit_widget() {
//     register_widget('guest_editor_widget');
// }
// add_action('widgets_init', 'register_foaf_guest_edit_widget');
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(
        array(
            'label' => 'Secondary Image',
            'id' => 'secondary-image',
            'post_type' => 'post'
        )
    );
}



