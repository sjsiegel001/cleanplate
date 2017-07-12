/* Actions page events */
jQuery(function() {
	jQuery("#register-form").hide();

    jQuery('#login-form-link').click(function(e) {
		jQuery("#login-form").delay(100).fadeIn(100);
 		jQuery("#register-form").fadeOut(100);
		jQuery('#register-form-link').removeClass('active');
		jQuery(this).addClass('active');
		e.preventDefault();
	});
	jQuery('#register-form-link').click(function(e) {
		jQuery("#register-form").delay(100).fadeIn(100);
 		jQuery("#login-form").fadeOut(100);
		jQuery('#login-form-link').removeClass('active');
		jQuery(this).addClass('active');
		e.preventDefault();
	});

});



/* Vue login form */
var loginvue = new Vue({
  el: '#loginactions',
  data: {
	username: '',
	pw: '',
	remember: false,
	alerts: []
  },
  methods: {
	testCriteria: function() {
		//this.alerts = ['how','now','brown'];
		return true;
	},
	gologin: function(e) {
		e.preventDefault();
		var satisfied = this.testCriteria();
		if(satisfied) {
			$.post(localized.ajaxurl + 'my_login', {username: this.username, pw: this.pw, remember: this.remember, nonce: localized.loginnonce} , function(response) {
				if(response.success) {
					window.location = localized.siteurl;
				} else {
					loginvue.alerts = response.errors;
				}
			}, 'json');
		}
	}
  }
})


var registervue = new Vue({
  el: '#registeractions',
  data: {
	username: '',
	email: '',
	pw1: '',
	pw2: '',
	alerts: []
  },
  methods: {
	testCriteria: function() {
		this.alerts = [];
		if(this.username == '') {
			this.alerts.push('please specify a username');
			return false;
		}
		
		if(this.email == '') {
			this.alerts.push('please specify an email');
			return false;
		}
		
		if(this.pw1 == '') {
			this.alerts.push('please specify a password');
			return false;
		}
		
		if(this.pw2 == '') {
			this.alerts.push('please confirm your password');
			return false;
		}
		
		if(this.pw1 != this.pw2) {
			alert('pw missmatch');
			this.alerts.push('passwords do not match');
			return false;
		}
		return true;
	},
	goregister: function(e) {
		e.preventDefault();
		var satisfied = this.testCriteria();
		if(satisfied) {
			$.post(localized.ajaxurl + 'my_registration', {username: this.username, pw: this.pw1, email: this.email, nonce: localized.registernonce} , function(response) {
				if(response.success) {
					window.location = localized.siteurl;
				} else {
					registervue.alerts = response.errors;
				}
			}, 'json');
		}
	}
  }
})