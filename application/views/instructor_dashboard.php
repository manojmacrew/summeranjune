<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user_session = $this->session->userdata('logged_in');

?>
<div id="dashborad" class="inner">
<div class="dashborad-header">
	<ul class="tab">
		<li class="active"><a href="<?php echo  $this->config->base_url();?>instructor/profile">My Profile</a></li>
		<li><a href="<?php echo  $this->config->base_url();?>instructor/classes">My Classes</a></li>
		<li><a href="<?php echo  $this->config->base_url();?>instructor/messages">My Inbox</a></li>
		<li><a href="<?php echo  $this->config->base_url();?>instructor/settings">Settings</a></li>
		<li><a href="<?php echo  $this->config->base_url();?>instructor/addPaymentDetails">Paypal Details</a></li>
	</ul>
</div>
<div class="username">Welcome <?php echo $user_session['first_name'].' '.$user_session['last_name'].' '.$user_session['user_role'];?> </div>

<h3 class="page-title">  Instructor Dashboard </h3>

</div>