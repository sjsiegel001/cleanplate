<form id="register-form" @submit="goregister">
	<div class="alert alert-danger" role="alert" v-if="alerts.length > 0" v-cloak>
		<p v-for="alert in alerts">
			{{ alert }}
		</p>
	</div> 
	<div class="form-group">
		<input type="text" v-model="username" class="form-control" placeholder="Username">
	</div>
	<div class="form-group">
		<input type="email" v-model="email" class="form-control" placeholder="Email Address">
	</div>
	<div class="form-group">
		<input type="password" v-model="pw1" class="form-control" placeholder="Password">
	</div>
	<div class="form-group">
		<input type="password" v-model="pw2" class="form-control" placeholder="Confirm Password">
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-primary" value="Register Now">
			</div>
		</div>
	</div>
</form>