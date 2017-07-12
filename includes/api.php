<?php

/*
 * User Registration
*/
add_action( 'wp_ajax_my_registration', 'my_registration' );
add_action( 'wp_ajax_nopriv_my_registration', 'my_registration' );
function my_registration() {
	
	$errors         = array();      // array to hold validation errors
	$data           = array();      // array to pass back data
	
	$username = $_POST['username'];
	$email = sanitize_text_field($_POST['email']);
	$pw = sanitize_text_field($_POST['pw']);
	
	
	if (empty($username)) {
		$errors['user'] = "Please enter a username";
	}
	
	if (empty($email)) {
		$errors['email'] = "Please enter an email";
	}
	
	if (empty($pw)) {
		$errors['pwblank'] = "Please enter a password";
	}
	
	
	if ( 
		! isset( $_POST['nonce'] ) 
		|| ! wp_verify_nonce( $_POST['nonce'], 'my_registration' ) 
	) {
	   $errors[] = "nonce field could not be verified";
	}
	
	
	if(empty($errors)) { //clean up username
		$username = wp_strip_all_tags( $username );
		$username = remove_accents( $username );
		// Kill octets
		$username = preg_replace( '|%([a-fA-F0-9][a-fA-F0-9])|', '', $username );
		$username = preg_replace( '/&.+?;/', '', $username ); // Kill entities
			// If strict, reduce to ASCII for max portability.
		if ( $strict )
			 $username = preg_replace( '|[^a-z0-9 _.\-@]|i', '', $username );
	}
	
	
	if (empty($errors)) {
		global $error;
		$user_id = wp_create_user( $username, $pw, $email );
		
		if ( is_wp_error($user_id) ) {
			$errors['err'] = str_replace('ERROR: ', '', strip_tags($user_id->get_error_message()));
		}
	}		
	
	if ( ! empty($errors)) {
        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {
        // if there are no errors process our form, then return a message		
		$data['output'] = "User Registration Successful";
        // show a message of success and provide a true success variable
        $data['success'] = true;
		
		$credentials = array();
		$credentials['user_login'] = $username;
		$credentials['user_password'] = $pw;
		wp_logout();
		wp_signon($credentials); //log the user in
    }
	
    echo json_encode($data);
	wp_die();
}

/*
 * User Login
*/
add_action( 'wp_ajax_my_login', 'my_login' );
add_action( 'wp_ajax_nopriv_my_login', 'my_login' );
function my_login() {
	
	$errors         = array();      // array to hold validation errors
	$data           = array();      // array to pass back data

	
	$credentials['user_login'] = $_POST['username'];
	$credentials['user_password'] = $_POST['pw'];
	$credentials['remember'] = (isset($_POST['remember']) ? true:false);
	
	
	if (empty($_POST['username']))
		$errors[] = "Please enter a valid username or email";
	if (empty($_POST['pw']))
		$errors[] = "Please enter a valid password";
	
	if ( 
		! isset( $_POST['nonce'] ) 
		|| ! wp_verify_nonce( $_POST['nonce'], 'my_login' ) 
	) {
	   $errors[] = "nonce field could not be verified";
	}
	
	
	$email = $_POST['username'];
	$pw = $_POST['pw'];
	
	if (empty($errors)) {
		global $error;
		$user = wp_authenticate($email, $pw);
		if ( is_wp_error($user) )
			$errors[] = str_replace('ERROR: ', '', strip_tags($user->get_error_message()));
		

	}
	
	if (empty($errors)) {
		$user = wp_signon($credentials);
		if ( is_wp_error($user) )
			$errors[] = 'error while logging in';
	}
	
	
	if ( ! empty($errors)) {
        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {
        // if there are no errors process our form, then return a message		
		$data['output'] = 'login successful';
        $data['success'] = true;
		
    }
	
    echo json_encode($data);
	wp_die();	
	
}

?>