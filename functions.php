<?php
// function sort_users($user_a, $user_b) {
//     return strcmp(get_user_meta($user_a->ID, 'last_name', true), get_user_meta($user_b->ID, 'last_name', true));
// }

/*** 
/* Add Guest Author Capabilities
*****/

add_filter( 'the_author', 'guest_author_name' );
add_filter( 'get_the_author_display_name', 'guest_author_name' );

function guest_author_name( $name ) {
global $post;

$author = get_post_meta( $post->ID, 'guest-author', true );

if ( $author )
$name = $author;

return $name;
}

/*** 
/* Add RSS Icon for Menu Bar
*****/

add_filter( 'storm_social_icons_networks', 'storm_social_icons_networks');
function storm_social_icons_networks( $networks ) {

    $extra_icons = array (
        '/feed' => array(                  // Enable this icon for any URL containing this text
            'name' => 'RSS',               // Default menu item label
            'class' => 'rss',              // Custom class
            'icon' => 'icon-rss',          // FontAwesome class
            'icon-sign' => 'icon-rss-sign' // May not be available. Check FontAwesome.
        ),
    );

    $extra_icons = array_merge( $networks, $extra_icons );
    return $extra_icons;

}
?>

