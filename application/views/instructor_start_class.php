<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user_session 	= $this->session->userdata('logged_in');
$userId 		= $user_session['user_id'];
?>

<!-- metisMenu stylesheet -->   
<div id="dashborad" class="inner">
	
	<?php if( isset($class['id']) && $class['id'] !='' ) {  //check if class exist
			$instructorId 	= $class['instructor_id'];
			if($instructorId == $userId) {  //check if logged in user is Owner of class ?>
				<div class='container-fluid'>
					<div class='row'>
						<div class='col-sm-12'><!--full section!-->
							<div class='col-sm-6'>
								<h3 class='text-left'><?php echo $class['class_name']; ?></h3>
							</div>
							<div class='col-sm-6'>
								<h3 class='text-right'><a href=""  class="btn btn-metis-1" ><?php echo 'End Class'; ?></a></h3>
							</div>
								Class conference Video will play here
							<div class="back"><a href="<?php echo base_url();?>instructor/classes">Back to all classes</div>
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