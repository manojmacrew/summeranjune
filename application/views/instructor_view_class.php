<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user_session 	= $this->session->userdata('logged_in');

$userId 		= $user_session['user_id'];
?>

<!-- metisMenu stylesheet -->   
<div id="dashborad" class="inner">
	<?php if( isset($class['id']) && $class['id'] !='' ) {  //check if class exist
			$instructorId 	= $class['instructor_id']; ?>
			<?php if($instructorId == $userId) { //check if logged in user is Owner of class 
					$status = $class['status'];
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
				
				<div class='container-fluid'>
					<div class='row'>
						<div class='col-sm-12'><!--full section!-->
							<div class='row'>
								<div class='col-sm-6'>
									<h3 class='text-left'><?php echo $class['class_name']; ?></h3>
								</div>
								<div class='col-sm-6'>
									<h3 class='text-right'><a href="<?php echo base_url();?>instructor/startClass/<?php echo $class['id']; ?>"  class="btn btn-success" ><?php echo 'Start Class'; ?></a></h3>
								</div>
							</div>
							<div class='row'>
								<div class='col-sm-3'>
									<img width="240" id="profile_image" height="214" src="<?php echo $profile_image_url; ?>">
								</div>
								<div class='col-sm-9'>
									<strong><?php echo $user_session['first_name'].' '.$user_session['last_name'];?></strong>
								</div>
								
							</div>
							<div class='row'>
								<div class='col-sm-12 classinfo'>
									<h4> Class Info</h4>
									<table class="view-class">
										<tr><td class="td-label"> Descriptions: </td> <td> <?php echo $class['class_desc']; ?></td>
										</tr>
										<tr><td class="td-label"> Duration: </td> <td> <?php echo $class['class_hours_length']*60+$class['class_min_length']; ?> Mins</td>
										</tr>
										<tr><td class="td-label"> Class instruction: </td> <td> <?php echo $class['class_instruction']; ?></td>
										</tr>
										<tr><td class="td-label"> Complexity: </td> <td> <?php echo $class['complexity']; ?></td>
										</tr>
										<tr><td class="td-label"> Class date & time: </td> <td> <?php echo $class['class_date']; ?> <?php echo $class['class_time']; ?> </td>
										</tr>
										<tr><td class="td-label"> Class timezone: </td> <td> <?php echo $class['class_time_zone']; ?></td>
										</tr>
										<tr><td class="td-label"> Class cost: </td> <td> <?php echo $class['class_cost']; ?></td>
										</tr>
										<tr><td class="td-label"> Class cancellation cost: </td> <td> <?php echo $class['class_cancellation_cost']; ?></td>
										</tr>
										<tr><td class="td-label"> Allow message: </td> <td> <?php echo $class['allow_message'] == 0 ? 'No' : 'Yes'; ?></td>
										</tr>
										<tr><td class="td-label"> Allow bonus: </td> <td> <?php echo $class['allow_bonus']== 0 ? 'No' : 'Yes'; ?></td>
										</tr>
										<tr><td class="td-label"> Status: </td> <td> <?php echo $statusVal; ?></td>
										</tr>
										<tr><td class="td-label"> Date added: </td> <td> <?php echo $class['date_added']; ?></td>
										</tr>
									</table>
									<div class="back"><a href="<?php echo base_url();?>instructor/classes">Back to all classes</a></div>
									</div>
								</div>
						</div>
					</div>
				</div>
				
			<?php } else { 
			
			 echo '<h3 class="text-center">Access denied.</h3>';
			
			
			} 
		}else{
			echo '<h3 class="text-center">No Class Found.</h3>';
		}			
			?>
</div>