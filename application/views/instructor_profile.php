<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user_session 	= $this->session->userdata('logged_in');
$userId 		= $user_session['user_id']; //get logged in user id from session
?>
<div id="dashborad" class="inner">
<h3 class='text-center'>Profile</h3>
<div class='container-fluid'>
	<div class="row">
		<div class= "col-sm-12">
			<ul class="tab">
				<li class="active"><a href="<?php echo  $this->config->base_url();?>instructor/profile">My Profile</a></li>
				<li><a href="<?php echo  $this->config->base_url();?>instructor/classes">My Classes</a></li>
				<li><a href="<?php echo  $this->config->base_url();?>instructor/messages">My Inbox</a></li>
				<li><a href="<?php echo  $this->config->base_url();?>instructor/settings">Settings</a></li>
				<li><a href="<?php echo  $this->config->base_url();?>instructor/addPaymentDetails">Paypal Details</a></li>
			</ul>
		</div>
	</div>
	<div class='row'>
		<div class='col-sm-3'><!--left section!-->
			
				<?php $userId = $user_session['user_id'];	?>
				<!--<img src="<?php echo $profile_image_url; ?>">-->
				 <div class="sendpage-left white-bg"><label>
						<div class="pro_photo">
							<div class="upload_photo">
								<!--input type="file" name="user_img" id="user_img" onchange="readURL(this);" /-->
								<input type="file" name="user_img" id="user_img" />
								<div class="ab">
									<img width="240" height="214" src='' id="blah" style="display:none;" />
									<img src='<?php echo base_url() ?>assets/images/loader.gif' id="loader" style="display:none;position:absolute;left:50px;z-index:9;" />
									<img width="240" id="main_image" height="214" src="<?php echo $profile_image_url; ?>">
								</div></div>
						</div>

						<input name="ads_photo" type="hidden" id="image_name" value="" />
					</label>
				</div>
				<div class="username">Welcome <?php echo $user_session['first_name'].' '.$user_session['last_name'];?> </div>
			</div><!--left section!-->
		<div class='col-sm-9'><!--right section!-->
			<div id="content" class="right-sec">
		<div id="instructor-user-profile">
			<form class="form-horizontal"  enctype="multipart/form-data" action="<?php echo base_url();?>instructor/editProfile" method="POST" id="block-validate" >
				<div class="form-group">
					<div class="col-lg-8">
						<input  id="required2"  type="text" value="<?php echo $user_data['first_name']; ?>" name="fname" placeholder="First Name" class="require form-control" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-8">
				<input type="text" value="<?php echo $user_data['middle_name']; ?>" name="mname"  placeholder="Middle Name" class="require form-control">
				</div>
				</div>
				<div class="form-group">
					<div class="col-lg-8">
				<input type="text" value="<?php echo $user_data['last_name']; ?>" name="lname" placeholder="Last Name" class="require form-control" required>
				</div>
				</div>
				<div class="form-group">
					<div class="col-lg-8">
				<input type="email" value="<?php echo $user_data['email']; ?>" name="email" placeholder="Email" class="require form-control" readonly required>
				</div>
				</div>
				<div class="form-group">
					<div class="col-lg-8">
				<input type="number" value="<?php echo $user_data['phone']; ?>" name="phone" placeholder="Phone" class="require form-control" required>
				</div>
				</div>
				<div class="form-group">
					<div class="col-lg-8">
				<input type="text" value="<?php echo $user_data['address_1']; ?>" name="address1" placeholder="Address 1" class="require form-control" required>
				</div>
				</div>
				<div class="form-group">
					<div class="col-lg-8">
				<input type="text" value="<?php echo $user_data['address_2']; ?>" name="address2" placeholder="Address 2" class="form-control">
				</div>
				</div>
				<div class="form-group">
					<div class="col-lg-8">
				<input type="text" value="<?php echo $user_data['state']; ?>" name="state" placeholder="State" class="require form-control required">
				</div>
				</div>
				<div class="form-group">
					<div class="col-lg-8">
				<input type="text" value="<?php echo $user_data['country']; ?>" name="country" placeholder="Country" class="require form-control required">
				</div>
				</div>
				<div class="form-group">
					<div class="col-lg-8">
						<input type="number" value="<?php echo $user_data['zip']; ?>" name="zip" placeholder="Zip" class="require form-control required">
					</div>
				</div>
				<!--- Experience Multiple fields ---->
				<div id ="instructor-exp" class="experiences">
					<h4 class="form-label">Experience</h4>
					<?php if( !empty($experience[0]) ) { 
						$row = count($experience);
						foreach($experience as $expVal)
						{ ?>
						
							<div class='row-exp'>
								<div class='row mg_btm'>
									<div class='col-lg-3 col-sm-6'>
										<input type="text" value="<?php echo $expVal['Name'] ?>" name="experience[]" placeholder="Experience*" class="require experience  form-control">
									</div>
									<div class='col-lg-3 col-sm-6'>
										<div class="datepicker input-group input-append date" data-date="<?php  echo $expVal['start_date'] ?>" data-date-format="yyyy-mm-dd">
											<input name = "exp_start_date[]" class="form-control require exp_start_date" value="<?php  echo $expVal['start_date'] ?>" readonly="" type="text">
											<span class="input-group-addon add-on">
											<i class="fa fa-calendar"></i>
											</span>
										</div>
									</div>
									<div class='col-lg-3 col-sm-6'>
										<div class="datepicker input-group input-append date" data-date="<?php  echo $expVal['end_date'] ?>" data-date-format="yyyy-mm-dd">
											<input  name = "exp_end_date[]"  class="form-control require exp_end_date" value="<?php  echo $expVal['end_date'] ?>" readonly="" type="text">
											<span class="input-group-addon add-on">										<i class="fa fa-calendar"></i>
											</span>
										</div>
									</div>
									<div class='col-lg-3 col-sm-6'>
										<input type="text" value="<?php echo $expVal['certificate'] ?>" name="certificate[]" placeholder="Certificate" class="require certificate  form-control">
									</div>
								</div>
								<div class='row mg_btm'>
									<div class='col-lg-3 col-sm-6'>
										<input type="file" value="<?php echo base_url();?>/assets/images/certificate/<?php echo $expVal['certificate_image'] ?>" name="certificate_image[]" class="require certificate_image">
									</div>
									
									<div class='col-lg-3 col-sm-6'>
										 <a href="JavaScript:Void(0);" class="remove_record" id="rowdelete-<?php echo $expVal['id']; ?>">X</a>
									</div>
									
								</div>
								<input type="hidden" value="<?php echo $expVal['id'] ?>" name="exprowid[]">
							</div>
						
							
				<?php  }
					}
					else
					{ 
						$row = 1;
					?>
						<div class='row-exp'>
								<div class='row mg_btm'>
									<div class='col-lg-3 col-sm-6'>
										<input type="text" value="" name="experience[]" placeholder="Experience*" class="require experience  form-control">
									</div>
									<div class='col-lg-3 col-sm-6'>
										<div class="datepicker input-group input-append date" data-date="" data-date-format="yyyy-mm-dd">
											<input name = "exp_start_date[]" class="form-control require exp_start_date" value="" readonly="" type="text">
											<span class="input-group-addon add-on">
											<i class="fa fa-calendar"></i>
											</span>
										</div>
									</div>
									<div class='col-lg-3 col-sm-6'>
										<div class="datepicker input-group input-append date" data-date="" data-date-format="yyyy-mm-dd">
											<input  name = "exp_end_date[]"  class="form-control require exp_end_date" value="" readonly="" type="text">
											<span class="input-group-addon add-on"><i class="fa fa-calendar"></i>
											</span>
										</div>
									</div>
									<div class='col-lg-3 col-sm-6'>
										<input type="text" value="" name="certificate[]" placeholder="Certificate" class="require certificate  form-control">
									</div>
								</div>
								<div class='row mg_btm'>
									<div class='col-lg-3 col-sm-6'>
										<input type="file" value="" name="certificate_image[]" class="require certificate_image">
									</div>
									
									<div class='col-lg-3 col-sm-6'>
										 <a href="JavaScript:Void(0);" class="remove_record">X</a>
									</div>
									
								</div>
								<input type="hidden" value="0" name="exprowid[]">
							</div>
						
					<?php
					}
					?>
				</div>
					<div class="form-group">
						<div class="col-lg-2">
							<input type="hidden" value="<?php echo $row; ?>" id="exp-total">
							<input type="hidden" value="<?php echo $userId; ?>" id="userId">
							<button class="add-exp btn btn-primary"> Add Experience</button>
						</div>
					</div>
				<!--- Education Multiple fields ---->
				<div id ="instructor-edu" class="educations">
				<span class="form-label">Education</span>
				<?php 
				// echo '<pre>'; print_r($education);
				if( !empty($education[0]) ) {
						$row = count($education);
						foreach($education as $eduVal)
						{ ?>
						
						<div class="row-edu">
							<div class='row mg_btm'>
									<div class='col-sm-5'>
										<input type="text" value="<?php echo $eduVal['Name'] ?>" name="education[]" placeholder="Education" class="require form-control education">
									</div>
									<div class='col-sm-3'>
										<div class="datepicker input-group input-append date" data-date="" data-date-format="yyyy-mm-dd">
										<input type="text" value="<?php echo $eduVal['start_date'] ?>" name="edu_start_date[]" placeholder="Start Date" class="require form-control edu_start_date">
										<span class="input-group-addon add-on">	<i class="fa fa-calendar"></i></span>
									</div>
									</div>
									<div class='col-sm-3'>
										<div class="datepicker input-group input-append date" data-date="" data-date-format="yyyy-mm-dd">
											<input type="text" value="<?php echo $eduVal['end_date'] ?>" name="edu_end_date[]"  placeholder="End Date" class="require form-control edu_end_date">
											<span class="input-group-addon add-on">	<i class="fa fa-calendar"></i></span>
										</div>
									</div>
									
									<div class="col-sm-1">  
										<a href="JavaScript:Void(0);" class="remove_record" id="rowdelete-<?php echo $eduVal['id']; ?>">X</a>
									</div>
									<input type="hidden" value="<?php echo $eduVal['id'] ?>" name="edurowid[]">
							</div>
						
						</div>
					<?php   }
					}
					else
					{ 
						$row = 1;
					?>
					<div class="row-edu">
							<div class='row mg_btm'>
									<div class='col-sm-5'>
										<input type="text" value="" name="education[]" placeholder="Education" class="require form-control education">
									</div>
									<div class='col-sm-3'>
										<div class="datepicker input-group input-append date" data-date="" data-date-format="yyyy-mm-dd">
										<input type="text" value="" name="edu_start_date[]" placeholder="Start Date" class="require form-control edu_start_date">
										<span class="input-group-addon add-on">	<i class="fa fa-calendar"></i></span>
									</div>
									</div>
									<div class='col-sm-3'>
										<div class="datepicker input-group input-append date" data-date="" data-date-format="yyyy-mm-dd">
											<input type="text" value="" name="edu_end_date[]"  placeholder="End Date" class="require form-control edu_end_date">
											<span class="input-group-addon add-on">	<i class="fa fa-calendar"></i></span>
										</div>
									</div>
									
									<div class="col-sm-1">  
										<a href="JavaScript:Void(0);" class="remove_record" >X</a>
									</div>
									<input type="hidden" value="0" name="edurowid[]">
							</div>
						
						</div>
						
					<?php
					}
					?>
				</div>
				<div class="form-group">
					<div class="col-lg-4">
					<input type="hidden" value="1" id="edu-total">
					<button class="add-edu btn btn-primary"> Add Education</button>
				</div>
						</div>
				<div class="form-group">
					<div class="col-sm-8">
						<input type="hidden" value="<?php echo $userId ; ?>" id="user_id" name="user_id">
						<div class="form-actions no-margin-bottom">
							<input class="btn btn-primary" type="submit" value="Submit">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div><!---right-sec --->
		</div><!--right section!-->
	</div>

</div>
</div>