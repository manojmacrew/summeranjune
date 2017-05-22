<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user_session = $this->session->userdata('logged_in');
		
if(!$user_session['social_profile_id']){
?>
<div id="content">
<div class="home-button row">
	<div class="fb col-lg-4 col-sm-6 col-lg-offset-2">
			<a class="signup-button btn btn-lg btn-primary btn-block" href="<?php echo  $this->config->base_url();?>signup?q=2">Sign Up as Student</a>
	</div>
	<div class="gl col-lg-4 col-sm-6"><a class="signup-button btn btn-lg btn-primary btn-block" href="<?php echo  $this->config->base_url();?>signup?q=1">Sign Up as Instructor</a>
	</div>
	
</div>
<?php } ?>
	<div class='row'>
		
		<div class='col-lg-12 col-sm-12'>
			
			<div class="home-slider callbacks_container">
				<ul class="rslides" id="slider1">
				  <li><img src="<?php echo $this->config->base_url();?>assets/images/slider/1.jpg" /></li>
				  <li><img src="<?php echo $this->config->base_url();?>assets/images/slider/2.jpg" /></li>
				  <li><img src="<?php echo $this->config->base_url();?>assets/images/slider/3.jpg" /></li>
				</ul>

			</div>
			
		</div>
	</div>
	<div class='row'  style="padding-top: 100px !important;">
		<div class='col-lg-12 col-sm-12'></div>
	</div>

</div>