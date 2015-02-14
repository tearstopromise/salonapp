var mysalon =
{
	/* properties */
	$signup_form: null,
	$login_form: null,
	/* initialization functions */

	initSignUpForm: function($)
	{
		mysalon.$signup_form = $("#signupform");
		
		mysalon.$signup_form.validate({
			errorPlacement: function ($error, $element) {
				var name = $element.attr("name");
				$("#error" + name).html($error);
			},
			rules: {
				firstname: {
					required: true,
					minlength: 1
				},
				lastname: {
					required: true,
					minlength: 1
				},
				address: {
					required: true,
					minlength: 1
				},
				contact: {
					required: true,
					minlength: 1
				},
				bdate: {
					required: true,
					minlength: 1
				},
				
				email: {
					required: true,
					email: true
				},
				
				username: {
					required: true,
					minlength: 8
				},
				pass: {
					required: true,
					minlength: 8
				},
				cpass: {
					required: true,
					minlength: 8,
					equalTo: "#pass"
				}
			
			},
			messages: {
				firstname: {
					required: "Please enter your First Name"
				},
				lastname: {
					required: "Please enter your Last Name"
				},
				address: {
					required: "Please enter your Address"
				},
				contact: {
					required: "Please enter your Contact Number"
				},
				bdate: {
					required: "Please enter your Birthdate"
				},
				
				email: "Please enter a valid email address",
			
				username: {
					required: "Please enter a valid username",
					minlength: "Your username must be at least 8 characters long"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 8 characters long"
				},
				cpassword: {
					required: "Please provide a password",
					minlength: "Your password must be at least 8 characters long",
					equalTo: "Passwords does not match"
				}
			}
		});
		
		mysalon.$signup_form.submit(function(e) {
			e.preventDefault();
			
			if ( ! mysalon.$signup_form.valid()) {
				return false;
			}
			
			// validate if email and/or username exists in the database
			$.getJSON(
				"http://salon360.byethost11.com/salon360mobileapp/userval.php?callback=?",
				mysalon.$signup_form.serialize(),
				function(data) {
					// uexists = username exists
					if(data.uexists =="exists") {
						$("body").scrollTop($("#username").offset().top);
						$("#erroremail").text("");
						$("#erroremail").text("");
						$("#erroremail").append("Email <b>"+ data.username + "</b> is already in use, use another Email Address<br>");
					} else {
						$.getJSON(
							"http://salon360.byethost11.com/salon360mobileapp/uregister.php?callback=?",
							mysalon.$signup_form.serialize(),
							function(data) {
								
								alert('Registration Sucessful!');
								localStorage.setItem("username", data.username);
								location.href = "index.html";
							}
						).fail(function(data){
							alert("failed");
						});
					}
				}
			).fail(function(data){
				alert("validation failed");
			});
		});
	}, // [\initSignUpForm]
	
	initLoginForm: function($)
	{
		mysalon.$login_form = $("#hideme");
		
		mysalon.$login_form.submit(function(e) {
			e.preventDefault();
		
			if ($( "#lusername" ).val() == "" || $( "#lpass" ).val() == "") {
				return false;
			}
			
			$.getJSON("http://salon360.byethost11.com/salon360mobileapp/verifyfirst.php?callback=?",
				mysalon.$login_form.serialize(),
				function(data) {
					if (data.verified == "v1") {
					localStorage.setItem("datauser", data.username);
					location.href="home.html";
					} else {
						alert("problem with your Account please try again.");
					}
				}
			).fail(function(data){
				alert("failed to log in");
			});
			
			
		});
	}, // [\initLoginForm]
	
	
};
/* Actual Initialization */
(function($) {


	mysalon.initSignUpForm($);
	mysalon.initLoginForm($);
})(jQuery);