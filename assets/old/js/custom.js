$(document).ready(function(){
	var base_url = $("#base_url").val();

	/** slider homepage */
      $("#slider1").responsiveSlides({
		maxwidth: 1072, 
		auto: true,
		pager: false,
		nav: true,
		speed: 500,
		namespace: "callbacks",
		before: function () {
		  $('.events').append("<li>before event fired.</li>");
		},
		after: function () {
		  $('.events').append("<li>after event fired.</li>");
		}
	  });
	  
	  /* 
	  *
	  *	Change profile image Instructor Account Activation or Profile page start here
	  *
	  */
		$("#user_img").on('change', function () {
			var base_url = $("#base_url").val();
		
            var formdata = new FormData();
            formdata.append('user_img', document.getElementById("user_img").files[0]);
            $('#loader').show();
            $.ajax({
                url: base_url+"instructor/uploadImage",
                type: "POST",
                data: formdata,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('#loader').hide();
                    $('#blah').show();
                    var obj = jQuery.parseJSON(data);
                    if (obj.type == 'fail') {
                        alert(obj.msg);
                        $('#image_name').val('');
                        $('#blah').hide();
                    } else {
                        //$('.ab').html("");
                        $('#label_text').html("");
                        $('#image_name').val(obj.msg);
                        $('#main_image').hide();
                        $('#blah').show();
                        $('#blah').attr('src', base_url+'assets/images/profile/' + obj.msg);
                    }
                },
                error: function () {}
            });
        });
  /* 
  *
  *	Add more fields for Instructor Account Activation or Profile page start here
  *
  */
  // Add more for experience
  
	var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $("#instructor-user-profile .experience"); //Fields wrapper
    var add_button      = $("#instructor-user-profile .add-exp"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row-exp"><input type="text" value="" name="experience[]" placeholder="Experience" class="require experience"><input type="text" value="" name="exp_start_date[]" placeholder="Start Date" class="require exp_start_date"><input type="text" value="" name="exp_end_date[]" placeholder="End Date" class="require exp_end_date"><input type="text" value="" name="certificate[]" placeholder="Certificate" class="require certificate"><input type="file" value="" name="certificate_image[]" class="require certificate_image"><a href="JavaScript:Void(0);" id="rowedit-0" class="edit-exp">Edit</a><a href="JavaScript:Void(0);" class="save-exp" id="rowsave-0" >Save</a></div>'); //add input box
			
			$("#exp-total").val(x);
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
		$("#exp-total").val(x);
    });
  
   // Add more for Education
  
	var edu_max_fields      = 10; //maximum input boxes allowed
    var edu_wrapper         = $("#instructor-user-profile .education"); //Fields wrapper
    var edu_add_button      = $("#instructor-user-profile .add-edu"); //Add button ID
   
    var n = 1; //initlal text box count
    $(edu_add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(n < edu_max_fields){ //max input box allowed
            n++; //text box increment
            $(edu_wrapper).append('<div class="row-edu"><input type="text" value="" name="education[]" placeholder="Education" class="require"><input type="text" value="" name="edu_start_date[]" placeholder="Start Date" class="require"><input type="text" value=""name="edu_start_date[]"  placeholder="End Date" class="require"><a href="JavaScript:Void(0);"  id="rowedit-0"  class="edit-edu" >Edit</a><a href="JavaScript:Void(0);"  class="save-edu"  id="rowsave-0" >Save</a></div>'); //add input box
			$("#edu-total").val(n);
        }
    });
   
    $(edu_wrapper).on("click",".remove_field-edu", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); n--;
		$("#edu-total").val(n);
    });
  /* Add more fields for Instructor Account Activation or Profile page end here */
  
  /* Save experience fields for Instructor Account Activation or Profile page Start here */
  
   $(wrapper).on("click",".save-exp", function(e){ //on add input button click
		e.preventDefault();
		var userId = $("#userId").val();
		var saveExp = $(this).attr('id');
		var splitval = saveExp.split('-');
		var rowId = splitval[1];
		var experience = $(this).closest("div.row-exp").find("input.experience").val();
		var exp_start_date = $(this).closest("div.row-exp").find("input.exp_start_date").val();
		var exp_end_date = $(this).closest("div.row-exp").find("input.exp_end_date").val();
		
		var certificate = $(this).closest("div.row-exp").find("input.certificate").val();
		var certificate_image = $(this).closest("div.row-exp").find("input.certificate_image").val();
		var certificate_image_name = certificate_image.replace(/^.*[\\\/]/, '');
		alert(exp_start_date);
		alert(exp_end_date);
		alert(experience);
		jQuery.ajax({
		  type: "POST",
		  url:  base_url+"InstructorApi/updateExperienceInstructor",
		  data: { rowId: rowId,userId:userId,experience:experience,exp_start_date: exp_start_date, exp_end_date: exp_end_date,certificate:certificate,certificate_image_name:certificate_image_name }
		}).success(function( response ) {
			 // alert(response.status);
			// window.location = 'http://macrew.info/summerandjune/dev/instructor/activateAccount';
		}); 
		
   });
	
	
  /* Save experience fields for Instructor Account Activation or Profile page end here */
  /* Save education fields for Instructor Account Activation or Profile page Start here */
   $(edu_wrapper).on("click",".save-edu", function(e){ //on add input button click
		e.preventDefault();
		var userId = $("#userId").val();
		var saveEdu = $(this).attr('id');
		var splitval = saveExp.split('-');
		var rowId = splitval[1];
		var education = $(this).closest("div.row-edu").find("input.education").val();
		var edu_start_date = $(this).closest("div.row-edu").find("input.edu_start_date").val();
		var edu_end_date = $(this).closest("div.row-edu").find("input.edu_end_date").val();
		
		jQuery.ajax({
		  type: "POST",
		  url:  base_url+"InstructorApi/updateEducationInstructor",
		  data: { rowId: rowId,userId:userId,education:education,edu_start_date: edu_start_date, edu_end_date: edu_end_date}
		}).success(function( response ) {
			  alert(response.status);
			// window.location = 'http://macrew.info/summerandjune/dev/instructor/activateAccount';
		}); 
   });
  
  /* Save experience fields for Instructor Account Activation or Profile page end here */
  
  
  /* 
  *
  *	Upload Certificate image  from Instructor Account Activation or Profile page start here
  *
  */
	$(".certificate_image").on('change', function () {
		var base_url = $("#base_url").val();
		// var formdata = new FormData();
		var file_data = $(this).prop('files')[0];
		var formdata = new FormData();
		formdata.append('certificate_image', file_data);
		$('#loader').show();
		$.ajax({
			url: base_url+"instructor/uploadCertificateImage",
			type: "POST",
			data: formdata,
			contentType: false,
			cache: false,
			processData: false,
			success: function (data) {
				//$('#loader').hide();
				//$('#blah').show();
				var obj = jQuery.parseJSON(data);
				if (obj.type == 'fail') {
					//alert(obj.msg);
					//$('#image_name').val('');
					///$('#blah').hide();
				} else {
					//$('.ab').html("");
					//$('#label_text').html("");
					//$('#image_name').val(obj.msg);
					//$('#main_image').hide();
					//$('#blah').show();
					//$('#blah').attr('src', base_url+'assets/images/profile/' + obj.msg);
				}
			},
			error: function () {}
		});
	});
  
  
  
  
  
  
  
  
  
}); // end of file


