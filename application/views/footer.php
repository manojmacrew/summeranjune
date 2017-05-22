		</div> <!-- /.container -->
   	</div> <!-- /.wrapper -->
	   <!-- /#wrap -->
            <footer class="Footer bg-dark dker">
                <p><?php echo date('Y'); ?> &copy; Summer And June </p>
            </footer>
           
            <!--jQuery -->
            <script src="<?php echo base_url();?>assets/lib/jquery/jquery.js"></script>
            <!--Bootstrap -->
            <script src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap.js"></script>
            <!-- MetisMenu -->
            <script src="<?php echo base_url();?>assets/lib/metismenu/metisMenu.js"></script>
            <!-- onoffcanvas -->
            <script src="<?php echo base_url();?>assets/lib/onoffcanvas/onoffcanvas.js"></script>
            <!-- Screenfull -->
            <script src="<?php echo base_url();?>assets/lib/screenfull/screenfull.js"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.1/js/bootstrap-datepicker.min.js"></script>
			
            <!-- Metis core scripts -->
            <script src="<?php echo base_url();?>assets/js/core.js"></script>
            <!-- Metis demo scripts -->
			<script src="<?php echo base_url();?>assets/js/custom.js"></script>
			<script src="<?php echo base_url();?>assets/js/responsiveslides.min.js"></script>
			<script src="<?php echo base_url();?>/assets/lib/jquery-validation/jquery.validate.js"></script>
			<!--- DataTable JS ---->
			<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
			 <script>
				var today = new Date();
				$('#dp1').datepicker({
					format: 'yyyy-mm-dd	',
					minDate:today,
					startDate: "today",
					autoclose:true
				});
				
				$('#dp2').datepicker();
				$('#dp3').datepicker();
				$('#dp3').datepicker();
				$('#dpYears').datepicker();
				$('#dpMonths').datepicker();
				// Form Profile page multiple datepicker fields.
				$('.datepicker').datepicker({
					format: 'yyyy-mm-dd'
				});
				// Form block-validate 
				;(function ($) {
					"use strict";

					Metis.formValidation = function () {
					$('#block-validate').validate({
						rules: {
							required2: "required",
							email2: {
								required: true,
								email: true
							},
							date2: {
								required: true,
								date: true
							},
							url2: {
								required: true,
								url: true
							},
							password2: {
								required: true,
								minlength: 5
							},
							confirm_password2: {
								required: true,
								minlength: 5,
								equalTo: "#password2"
							},
							agree2: "required",
							digits: {
								required: true,
								digits: true
							},
							range: {
								required: true,
								range: [5, 16]
							}
						},
						errorClass: 'help-block',
						errorElement: 'span',
						highlight: function highlight(element, errorClass, validClass) {
							$(element).parents('.form-group').removeClass('has-success').addClass('has-error');
						},
						unhighlight: function unhighlight(element, errorClass, validClass) {
							$(element).parents('.form-group').removeClass('has-error').addClass('has-success');
						}
					});
						/*----------- END validate CODE -------------------------*/
					};

					return Metis;
				})(jQuery);

			</script>
			
			 <script>
				$(function() {
				  Metis.formValidation();
				});
			</script>
        </body>
</html>