<?php
/**
 * Template Name: Actions
 *
 * @package WordPress
 * @subpackage cp
 */
  get_header();
?>

<div class="container login-container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
							
								<!-- login form -->
								<div id="loginactions">
									<?php get_template_part( 'template-parts/content', 'login' ); ?>
								</div>
								<!-- end login form -->
								
								<!-- register form -->
								<div id="registeractions">
									<?php get_template_part( 'template-parts/content', 'register' ); ?>
								</div>
								<!-- end register form -->
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>

<script src="<?= get_template_directory_uri(); ?>/assets/js/actions.js"></script>