<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user_session 	= $this->session->userdata('logged_in');
$userId 		= $user_session['user_id'];

if(isset($paymentData['paypal_email']) && $paymentData['paypal_email'] !='')
{
	$email = $paymentData['paypal_email'];
}
else
{
	$email = '';
}
?>
<div id="dashborad" class="inner profile">
<h3 class='text-center'>Add Your Paypal Details</h3>
<div class='container-fluid'>
	<div class="row">
		<div class= "col-sm-12">
			<ul class="tab">
				<li><a href="<?php echo  $this->config->base_url();?>instructor/profile">My Profile</a></li>
				<li><a href="<?php echo  $this->config->base_url();?>instructor/classes">My Classes</a></li>
				<li><a href="<?php echo  $this->config->base_url();?>instructor/messages">My Inbox</a></li>
				<li><a href="<?php echo  $this->config->base_url();?>instructor/settings">Settings</a></li>
				<li class="active"><a href="<?php echo  $this->config->base_url();?>instructor/addPaymentDetails">Paypal Details</a></li>
			</ul>
		</div>
	</div>
		<div class='row'>
			<div class='col-sm-12'><!--left section!-->
			<div id="instructor-paymant-details">
			<h4 class="text-center">Please add your paypal email here to receive payments</h4>
				<form class="form-horizontal add-payment"  enctype="multipart/form-data" action="<?php echo base_url();?>instructor/savePaymentDetails" method="POST" id="block-validate" >
				
					<div class="form-group">
					<div class="col-sm-4 col-md-3 col-lg-3 text-right">
						<label class="control-label" for="email">Paypal Email(*):</label>
					</div>
						<div class="col-sm-8 col-md-9 col-lg-6">
							<input  id="required2"  type="text" value="<?php echo $email; ?>" name="paypal-email" placeholder="Paypal Email" class="require form-control" required>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-4 col-md-3 col-lg-3 text-right">
						<label class="control-label" for=""></label>
						</div>
						<div class="col-sm-8 col-md-9 col-lg-6">
							<input type="hidden" value="<?php echo $userId ; ?>" id="user_id" name="user_id">
							<div class="form-actions no-margin-bottom">
								<input class="btn btn-primary" type="submit" value="Save">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div><!---right-sec --->
	</div>
</div>
</div>