$(document).ready(function(){
	$(document.body).on('click', '#guardian_info', function(){
		if($('#guardian_info').prop('checked')){
			$('#guardian_info_section').show();
		} else {
			$('#guardian_info_section').hide();
		}
	});

	$('.datepicker').datepicker({
		defaultDate: new Date(),

	});

	$('#mobile_phone').intlTelInput({
		defaultCountry: "auto",
		preferredCountries: ["ng"]
	});

	$('#phone').intlTelInput({
		defaultCountry: "auto",
		preferredCountries: ["ng"]
	});
	$("#student-table").DataTable({

	});

	$(document.body).on('click', '.delete-student', function(){
		if (confirm('Are you sure to delete this record?')) {
			$.ajax({
				url: $(this).attr('data-href'),
				cache: false,
				success: function(response) {
					$('#student_error').hide();
					$('#student_success').hide();
					if (response.success) {
						$('.content-wrapper').remove();
						$('#content-wrapper').append(response.student_html);
						$('#student_success').show().html(response.message);
				} else {
					$('#student_error').show().html(response.message);
				}
			}
			});
		} else {
			return false;
		}

		return false;
	});




});

function get_students(func_call) {
	$.ajax({
		url: '/isms/students/'+func_call,
		cache: false,
		success: function(response) {
			console.log(response.student_html);
			if(response.student_html != ''){
				$('.content-wrapper').remove();
				$('#content-wrapper').append(response.student_html);
				$('#mobile_phone').intlTelInput({
					defaultCountry: "auto",
					preferredCountries: ["ng"]
				});
				$('#phone').intlTelInput({
					defaultCountry: "auto",
					preferredCountries: ["ng"]
				});
				$('#guardian').DataTable({

    		});
				$('.datepicker').datepicker({
					defaultDate: new Date(),

				});
				$('#title').html('Add Student | ISMS');

			}
		}
	});
}
///////////////// sohaib's script //////////////

function employee_listing(func_call) {
	$.ajax({
		url: '/isms/employee/'+func_call,
        cache: false,
		success: function(response) {
			if(response.employee_html != ''){
				$('.content-wrapper').remove();
				$('#content-wrapper').append(response.employee_html);
				$('#example1').DataTable();
				  //iCheck for checkbox and radio inputs
			    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
			      checkboxClass: 'icheckbox_minimal-blue',
			      radioClass   : 'iradio_minimal-blue'
			    });
			    //Red color scheme for iCheck
			    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
			      checkboxClass: 'icheckbox_minimal-red',
			      radioClass   : 'iradio_minimal-red'
			    });
			    //Flat red color scheme for iCheck
			    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
			      checkboxClass: 'icheckbox_flat-green',
			      radioClass   : 'iradio_flat-green'
			    });
			    $('.select2').select2({
			     	placeholder: "Show more fields"
			     });
			    $('.datepicker').datepicker({
			        format: 'dd-mm-yyyy'
			    });
				$('.datepicker').datepicker({
			        format: 'dd-mm-yyyy'
			    });
			    $('#title').html('Employee Listing | ISMS');
			}
		}
	});
}

function employee_add(func_call) {
	$.ajax({
		url: '/isms/employee/'+func_call,
		cache: false,
		success: function(response) {
			if(response.employee_html != ''){
				$('.content-wrapper').remove();
				$('#content-wrapper').append(response.employee_html);
				$('#emp-phone').intlTelInput({
					defaultCountry: "auto",
					preferredCountries: ["ng"]
				});
				$('#emp-mb-phone').intlTelInput({
					defaultCountry: "auto",
					preferredCountries: ["ng"]
				});
				$('#emp-dob').datepicker({
			        format: 'dd-mm-yyyy'
			    });
				$('#emp-doj').datepicker({
			        format: 'dd-mm-yyyy'
			    });
			    $('#title').html('Add Employee | ISMS');
			}
		}
	});
}

function guardian_listings(func_call) {
	$.ajax({
		url: '/isms/students/'+func_call,
		cache: false,
		success: function(response) {
			if(response.guardian_html != ''){
				$('.content-wrapper').remove();
				$('#content-wrapper').append(response.guardian_html);
				$('#guardian-table').DataTable();
			    //iCheck for checkbox and radio inputs
			    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
			      checkboxClass: 'icheckbox_minimal-blue',
			      radioClass   : 'iradio_minimal-blue'
			    });
			    //Red color scheme for iCheck
			    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
			      checkboxClass: 'icheckbox_minimal-red',
			      radioClass   : 'iradio_minimal-red'
			    });
			    //Flat red color scheme for iCheck
			    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
			      checkboxClass: 'icheckbox_flat-green',
			      radioClass   : 'iradio_flat-green'
			    });
			     $('.select2').select2({
			     	placeholder: "Show more fields"
			     });
			     $('#title').html('Guardian Listing | ISMS');

			}
		}
	});
}

function attendance_register(func_call){
	$.ajax({
		url: '/isms/attendance/'+func_call,
		cache: false,
		success: function(response) {
			if(response.reports_html != ''){
				$('.content-wrapper').remove();
				$('#content-wrapper').append(response.register_html);
			    $('#title').html('Register | ISMS');
			}
		}
	});
}

function attendance_reports(func_call){
	$.ajax({
		url: '/isms/attendance/'+func_call,
		cache: false,
		success: function(response) {
			if(response.reports_html != ''){
				$('.content-wrapper').remove();
				$('#content-wrapper').append(response.reports_html);
			    $('.daterange').daterangepicker();
			    $('.report-table').DataTable();
			    $('#title').html('Reports | ISMS');
			}
		}
	});
}



//////////// student report page////////////////////////////////////


$(document.body).on('click', '.get-report', function(){
	  $.ajax({
		url: '/isms/attendance/student_report_page',
		cache: false,
		success: function(response) {
			if(response.reports_html != ''){
				$('.content-wrapper').remove();
				$('#content-wrapper').append(response.reports_html);
			    $('.report-table').DataTable();
			    $('#title').html('Student Report | ISMS');
			}
		}
	});
	});

///////////////////////////////////////////////////

function profile_fields(func_call) {
	$.ajax({
		url: '/isms/students/'+func_call,
		cache: false,
		success: function(response) {
			console.log(response.student_html);
			if(response.student_html != ''){
				$('.content-wrapper').remove();
				$('#content-wrapper').append(response.student_html);
				$('#title').html('Students Fields | ISMS');
			}
		}
	});
}

$(document.body).on('click', '#save_student', function(){
	$.ajax({
		url: $('#student_form').attr('data-action'),
		type: 'post',
		data: $('#student_form').serialize(),
		cache: false,
		success: function(response) {
			$('#student_error').hide();
			$('#student_success').hide();
			if (response.success) {
				$('#student_success').show().html(response.message);
				$('#student_form')[0].reset();
			} else {
				$('#student_error').show().html(response.message);
			}

		}
	});

	return false;
});

$(document.body).on('click', '#save_employee', function(){
    $.ajax({
        url: $('#employee_form').attr('data-action'),
        type: 'post',
        data: $('#employee_form').serialize(),
        cache: false,
        success: function(response) {
            $('#employee_error').hide();
            $('#employee_success').hide();
            if (response.success) {
                $('#employee_success').show().html(response.message);
                $('#employee_form')[0].reset();
            } else {
                $('#employee_error').show().html(response.message);
            }

        }
    });

    return false;
});

$(document.body).on('click', '#student_fields', function(){
	$.ajax({
		url: $('#form_fields').attr('data-action'),
		type: 'post',
		data: $('#form_fields').serialize(),
		cache: false,
		success: function(response) {
			if (response.success) {
				$('#student_success').show().html(response.message);
			} else {
				$('#student_error').show().html(response.message);
			}

		}
	});

	return false;
});

function students_listing(func_call) {
	$.ajax({
		url: '/isms/students/'+func_call,
		cache: false,
		success: function(response) {
			console.log(response);
			if(response.student_html != ''){
				$('.content-wrapper').remove();
				$('#content-wrapper').append(response.student_html);
				$('#student-table').DataTable();
				$('#title').html('Student Listing | ISMS');
			} 
		}
	});
}

function loadEditForm(url){
	console.log(url);
    $.ajax({
        url: url,
        cache: false,
        success: function(response) {
            if(response.student_html != ''){
                console.log(response);
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.student_html);
                $('#guardian').DataTable({

              });
            } else {
                $('#student_error').show().html(response.message);
            }
        }
    });
    return false;

}

$(document.body).on('click', '.edit-student', function(){
	$.ajax({
		url: $('.edit-student').attr('data-href'),
		cache: false,
		success: function(response) {
			console.log(response);
			if(response.student_html != ''){
				$('.content-wrapper').remove();
				$('#content-wrapper').append(response.student_html);
				$('#guardian').DataTable({

    		});
			} else {
				$('#student_error').show().html(response.message);
			}
		}
	});
	return false;
});

$(document.body).on('click', '#update_student', function(){
	$.ajax({
		url: $('#student_update_form').attr('data-action'),
		type: 'post',
		data: $('#student_update_form').serialize(),
		cache: false,
		success: function(response) {
			if(response.student_html != ''){
				$('.content-wrapper').remove();
				$('#content-wrapper').append(response.student_html);
				$('#student_success').show().html(response.message);
				$('#guardian').DataTable({

    		});
			} else {
				$('#student_error').show().html(response.message);
			}
		}
	});
	return false;
});

$(document.body).on('click', '#update_employee', function(){alert($('#employee_form').attr('data-action'));
    $.ajax({
        url: $('#employee_form').attr('data-action'),
        type: 'post',
        data: $('#employee_form').serialize(),
        cache: false,
        success: function(response) {
            if(response.employee_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.employee_html);
                $('#employee_success').show().html(response.message);
                $('#employee_listing_table').DataTable();
                $('.select2').select2();
                //iCheck for checkbox and radio inputs
			    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
			      checkboxClass: 'icheckbox_minimal-blue',
			      radioClass   : 'iradio_minimal-blue'
			    });
			    //Red color scheme for iCheck
			    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
			      checkboxClass: 'icheckbox_minimal-red',
			      radioClass   : 'iradio_minimal-red'
			    });
			    //Flat red color scheme for iCheck
			    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
			      checkboxClass: 'icheckbox_flat-green',
			      radioClass   : 'iradio_flat-green'
			    });
            } else {
                $('#employee_error').show().html(response.message);
            }

        }
    });
    return false;
});
