<form id="login-form" @submit="gologin">
	<div class="alert alert-danger" role="alert" v-if="alerts.length > 0" v-cloak>
		<p v-for="alert in alerts">
		{{ alert.replace("Lost your password?","") }}
		</p>
	</div> 
	<div class="form-group">
		<input id="loginid" type="text" v-model="username" class="form-control" placeholder="Username" autofocus required>
	</div>
	<div class="form-group">
		<input id="loginpsw" type="password" v-model="pw" class="form-control" placeholder="Password" required>
	</div>
	<div class="form-group text-center">
		<input type="checkbox" id="remember" v-model="remember">
		<label for="remember"> Remember Me</label>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-primary" value="Log In">
			</div>
		</div>
	</div>
</form>