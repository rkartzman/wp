
<?php
// set conditions to show widget areas
global $wp_query;
$i = 1;
echo "<div class='sidebar-top'></div>";
if (is_active_sidebar( "sidebar_about_me" )) {
    dynamic_sidebar( "sidebar_about_me" );
}

if (is_page() || is_single()) {
    if ( is_single() ) {
        if (is_active_sidebar( "sidebar_blog" )) {
            dynamic_sidebar( "sidebar_blog" );
        }
    } else {
        if (is_active_sidebar( "sidebar_pages" )) {
            dynamic_sidebar( "sidebar_pages" );
        }
    }
} else if ( is_archive() || is_search()) {
    if (is_active_sidebar( "sidebar_blog" )) {
        dynamic_sidebar( "sidebar_blog" );
    }
}  else if (is_home() || is_front_page() ) {
    if (is_active_sidebar( "sidebar_homepage" )) {
        dynamic_sidebar( "sidebar_homepage" );
    }
}
?>