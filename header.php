<?php
 function enqueue_common() {

	 //styles
	 wp_enqueue_style( 'cpstyles', get_template_directory_uri() . '/style.css');
	 wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/build/app.css');
	 wp_enqueue_style( 'jqueryuicss', get_stylesheet_directory_uri() . "/assets/css/jquery-ui.css" );
	 wp_enqueue_style( 'fa', get_template_directory_uri() . '/assets/css/font-awesome.min.css');

	 //scripts
	 wp_enqueue_script( 'jqueryjs', get_template_directory_uri() . '/assets/js/jquery-1.12.4.js');
	 wp_enqueue_script( 'jqueryuijs', get_template_directory_uri() . '/assets/js/jquery-ui.js');
	 wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.min.js');

	 //wp_enqueue_script( 'appjs', get_template_directory_uri() . '/assets/build/app.js');

/*
	 if( strpos(get_site_url(), 'localhost') ) {
		wp_enqueue_script( 'vue', get_template_directory_uri() . '/assets/js/vue.js'); //vue development
	 } else {
		wp_enqueue_script( 'vuemin', get_template_directory_uri() . '/assets/js/vue.min.js'); //vue production
	 }
*/

	wp_localize_script( 'jqueryjs', 'localized', array(
			'tempdir' => get_template_directory_uri(),
			'ajaxurl'   => admin_url( 'admin-ajax.php' ) . '?action=',
			'siteurl' 	=> get_site_url(),
			'title' => get_the_title(),
			'loginnonce' => wp_create_nonce( 'my_login' ),
			'registernonce' => wp_create_nonce( 'my_registration' )
		)
	);

 }
 add_action( 'wp_enqueue_scripts', 'enqueue_common' );
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<title><?php echo bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>
