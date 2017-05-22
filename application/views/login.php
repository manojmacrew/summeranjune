<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');
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
			//add action here
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
            getFbUserData();
        } else {
            document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
        }
    }, {scope: 'email'});
}

// Fetch the user profile data from facebook
function getFbUserData(){
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
    function (response) {
		jQuery.ajax({
		  type: "POST",
		  url: "<?php echo base_url()?>login/saveFacebookUserData/",
		  data: { social_id: response.id,first_name: response.first_name, last_name: response.last_name, email: response.email, image_url: 'http://graph.facebook.com/' + response.id + '/picture?width=800&height=800'  }
		})
		.success(function( data ) {
		<?php if($this->session->userdata('ref_url') !== ''){
			$url = $this->session->userdata('ref_url');
			
		}else{
			$url = base_url();
		}
		$url = base_url();
		?>
			window.location = '<?php echo $url;?>';
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
		<div class="login-options">Do not have account yet? Signin here</div>
		<div class="button">
			<a href="javascript:void(0);" onclick="fbLogin()" id="fbLink" class="facebook" >Facebook</a>
			<a class="google" href="#">Google+</a>
		</div>
		<div class="clr"><hr /></div>

		

<?php include('footer.php'); ?>
