<?php
/**
 * Add a todo list to the dashboard homescreen
 */
// Function that outputs the contents of the dashboard widget
function dashboard_widget_todo( $post, $callback_args ) {
	include 'todo.htm';
}
// Function used in the action hook
function add_dashboard_widgets() {
	wp_add_dashboard_widget('dashboard_widget', 'Cleanplate To Do List', 'dashboard_widget_todo');
}
// Register the new dashboard widget with the 'wp_dashboard_setup' action
add_action('wp_dashboard_setup', 'add_dashboard_widgets' );


/**
 * Disable WP Admin Toolbar
 */
add_filter('show_admin_bar', '__return_false');

/**
 * Disable JQuery Migrate console log
 */
add_action( 'wp_default_scripts', function( $scripts ) {
    if ( ! empty( $scripts->registered['jquery'] ) ) {
        $scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, array( 'jquery-migrate' ) );
    }
} );

/**
 * Breadcrumbs
 */
function simple_breadcrumb() {
    global $post;
	$separator = "</li>";
	
    echo '<ol class="breadcrumb">';
	if (get_the_ID() != 13) { //user panel
		echo '<li><a href="';
		echo get_site_url() . '/user-panel/';
		echo '">';
		
		echo 'Home';
		
		echo "</a> ".$separator;
		if ( is_category() || is_single() ) {
			the_category(', ');
			if ( is_single() ) {
				echo $separator;
				the_title();
			}
		} elseif ( is_page() && $post->post_parent ) {
			$home = get_page(get_option('page_on_front'));
			for ($i = count($post->ancestors)-1; $i >= 0; $i--) {
				if (($home->ID) != ($post->ancestors[$i])) {
					echo '<li><a href="';
					echo get_permalink($post->ancestors[$i]); 
					echo '">';
					echo get_the_title($post->ancestors[$i]);
					echo "</a>".$separator;
				}
			}
			echo '<li class="active"><strong>' . get_the_title() . '</strong></li>';
		} elseif (is_page()) {
			echo '<li class="active"><strong>' . get_the_title() . '</strong></li>';
		} elseif (is_404()) {
			echo "404";
		}
	} else {
		echo 'Home';
		
	}
	echo '</ol>';
}

/**
 * Disables wp emojicons
 */
function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
}
add_action( 'init', 'disable_wp_emojicons' );


/*
 * Add user ID to the users page
 */
function rd_user_id_column( $columns ) {
	$columns['user_id'] = 'ID';
	return $columns;
}
add_filter('manage_users_columns', 'rd_user_id_column');
 
/*
 * Column content
 */
function rd_user_id_column_content($value, $column_name, $user_id) {
	if ( 'user_id' == $column_name )
		return $user_id;
	return $value;
}
add_action('manage_users_custom_column',  'rd_user_id_column_content', 10, 3);
 
/*
 * Column style (you can skip this if you want)
 */
function rd_user_id_column_style(){
	echo '<style>.column-user_id{width: 5%}</style>';
}
add_action('admin_head-users.php',  'rd_user_id_column_style');

/**
 * Disables woocommerce 'no theme support' nag
 */
add_theme_support('woocommerce');


/**
 *  Session initalization necessary to use session variables
 */
add_action('init', 'myStartSession', 1);
add_action('wp_logout', 'myEndSession');
add_action('wp_login', 'myEndSession');

function myStartSession() {
    if(!session_id()) {
        session_start();
    }
}

function myEndSession() {
    session_destroy ();
}