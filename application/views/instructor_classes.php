<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// echo '<pre>'; print_r($classes); echo '</pre>';
?>
<div id="dashborad" class="inner">
	<h3 class='text-center'>My Classes</h3>
	<div class='container-fluid'>
		<div class="row">
			<div class= "col-sm-12">
				<ul class="tab">
					<li><a href="<?php echo  $this->config->base_url();?>instructor/profile">My Profile</a></li>
					<li class="active"><a href="<?php echo  $this->config->base_url();?>instructor/classes">My Classes</a></li>
					<li><a href="<?php echo  $this->config->base_url();?>instructor/messages">My Inbox</a></li>
					<li><a href="<?php echo  $this->config->base_url();?>instructor/settings">Settings</a></li>
					<li><a href="<?php echo  $this->config->base_url();?>instructor/addPaymentDetails">Paypal Details</a></li>
				</ul>
			</div>
		</div>

	<a href="<?php echo base_url(); ?>instructor/addClass">Add Class</a>
	</div>
	
	<div class='row'>
		<div class='col-sm-12'><!--full section!-->
		<table id="myClasses" class="display" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>#</th>
					<th>Class Name</th>
					<th>Date & Time</th>
					<th>No. of Students</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
		  <?php $i = 1;
				foreach($classes as $class) 
				{ 
					$status =  $class['status'];
					// 1-Open, 2-Full,, 3->InProgress, 4-Closed, 5-cancelled
					switch ($status) {
						case 1:
							$statusVal = "Open";
							break;
						case 2:
							$statusVal =  "Full";
							break;
						case 3:
							$statusVal =  "In Progress";
							break;
						case 4:
							$statusVal =  "Closed";
							break;
						case 5:
							$statusVal =  "cancelled";
							break;
						default:
							$statusVal = "";
					}
				?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $class['class_name']; ?></td>
						<td><?php echo $class['class_date'].' '.$class['class_time']; ?></td>
						<td><?php echo '1'; ?></td>
						<td><?php echo $statusVal; ?></td>
						<td><a href="<?php echo base_url(); ?>instructor/viewClass/<?php echo $class['id']; ?>">VIEW</a></td>
					</tr>
				
		 <?php  $i++;
				} ?>
			</tbody>
		</table>
		</div>
	</div>
</div>