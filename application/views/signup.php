<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
window.fbAsyncInit = function() {
    // FB JavaScript SDK configuration and setup
    FB.init({
      appId      : '127362404486867', // FB App ID
      cookie     : true,  // enable cookies to allow the server to access the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.8' // use graph api version 2.8
    });
    
    // Check whether the user already logged in
	FB.getLoginStatus(function(response) {
		if (response.status === 'connected') {
			//display user data
		}
	});
};

// Load the JavaScript SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Facebook login with JavaScript SDK
function fbLogin() {
    FB.login(function (response) {
        if (response.authResponse) {
            // Get and display the user profile data
            getFbData();
        } else {
            document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
        }
    }, {scope: 'email'});
}

// Fetch the user profile data from facebook
function getFbData(){
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
    function (response) {
		jQuery.ajax({
		  type: "POST",
		  url: "<?php echo base_url()?>signup/saveFacebookUserData/",
		  data: { social_id: response.id,role: 2,first_name: response.first_name, last_name: response.last_name, email: response.email, image_url: 'http://graph.facebook.com/' + response.id + '/picture?width=800&height=800'  }
		}).success(function( data ) {
			//add action here
		<?php
		$user_session = $this->session->userdata('logged_in');
		if(isset($user_session) && $user_session['user_role'] == 1)
		{
			 $url = base_url('instructor/dashboard');
		}
		elseif(isset($user_session) && $user_session['user_role'] == 2)
		{
			 $url = base_url('student/dashboard');
		}
		else{
			 $url = base_url();
		}
		?>
			window.location = data;
		});

    });
}

// Logout from facebook
function fbLogout() {
    FB.logout(function() {
        document.getElementById('fbLink').setAttribute("onclick","fbLogin()");
        document.getElementById('fbLink').innerHTML = '<img src="fblogin.png"/>';
        document.getElementById('userData').innerHTML = '';
        document.getElementById('status').innerHTML = 'You have successfully logout from Facebook.';
    });
}
</script>
	<div class='row'>
		<div class="col-sm-12 text-center"><?php echo $this->session->flashdata('statusMsg'); ?></div>
	</div>
	<div class="signup-bx">	
		<?php 
			if(isset($_GET['q']) && $_GET['q'] == 1)
			{
				$this->session->unset_userdata('signup_role');
				$this->session->set_userdata('signup_role', 1); 
		?>
				<h3 class="sm-title text-center">  Sign Up as Instructor </h3>
				<div class='row'>
					<div class="button col-sm-4 col-sm-offset-2 text-center"><a href="javascript:void(0);" onclick="fbLogin()" id="fbLink" class="facebook" > Facebook</a></div>
					<div class="button col-sm-4 text-center"><a class="google" href="<?php echo $google_login_url;?>">Google+</a></div>
				</div>	
	<?php	}
			elseif(isset($_GET['q']) && $_GET['q'] == 2)
			{ 
				$this->session->unset_userdata('signup_role');
				$this->session->set_userdata('signup_role', 2); 
			?>
				<h3 class="sm-title text-center">  Sign Up as Student </h3>
				<div class='row'>
					<div class="button col-sm-4 col-sm-offset-2 text-center"><a href="javascript:void(0);" onclick="fbLogin()" id="fbLink" class="facebook" > Facebook</a></div>
					<div class="button col-sm-4  text-center"><a class="google" href="<?php echo $google_login_url;?>">Google+</a></div>
				</div>
	  <?php }
		 else 
		 { ?>
			<div class='row'>
				<div class=" col-sm-4 col-sm-offset-2 text-right">
				<h3 class="sm-title text-center">  I am a Student </h3>
					<div class="button">
						<a class="signup-button  btn btn-lg btn-primary btn-block" href="<?php echo  base_url('signup?q=2');?>">Sign Up</a>
					</div>
				</div>
				<div class=" col-sm-4 ">
				<h3 class="sm-title text-center">  I am an Instructor </h3>
					<div class="button">
						<a class="signup-button  btn btn-lg btn-primary btn-block" href="<?php echo  base_url('signup?q=1');?>">Sign Up</a>
					</div>
				</div>
			</div>
<?php 	}	?>
		</div>