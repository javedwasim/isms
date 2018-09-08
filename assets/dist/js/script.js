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

    $(document.body).on('click', '.delete-student_cat', function(){
        if (confirm('Are you sure to delete this record?')) {
            $.ajax({
                url: $(this).attr('data-href'),
                cache: false,
                success: function(response) {
                    $('#student_error').hide();
                    $('#student_success').hide();
                    if(response.student_html != ''){
                        $('.content-wrapper').remove();
                        $('#content-wrapper').append(response.student_html);
                        $('.datatables').DataTable();
                        $('#title').html('Student Categories | ISMS');

                        $( ".modal-backdrop" ).remove();
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
///////////////// sohaib's script ////////////////



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
		url: '/isms/guardians/'+func_call,
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

function student_categories(func_call){
	$.ajax({
		url: '/isms/student_setting/'+func_call,
		cache: false,
		success: function(response) {
			if(response.student_html != ''){
				$('.content-wrapper').remove();
				$('#content-wrapper').append(response.student_html);
			    $('.datatables').DataTable();
			    $('#title').html('Student Categories | ISMS');
			}
		}
	});
}


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

/////////////////////////////////////////////////

function profile_fields(func_call) {
	$.ajax({
		url: '/isms/students/'+func_call,
		cache: false,
		success: function(response) {
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
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["success"](response.message);
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
			if(response.student_html != ''){
				$('.content-wrapper').remove();
				$('#content-wrapper').append(response.student_html);
				$('.select2').select2();
				var sttable = $("#student-b-table").DataTable({
			        dom: 'Bfrtip',
			        buttons: [
			            'colvis'
			        ]   
			    });
			    $(".buttons-colvis").html('Fields to Show');
			    sttable.columns( [ 1, 4, 5, 6, 7,8,9,10,11,12,13,14,15,16 ] ).visible( false, false );
			     $(function () {
			        $(".show-more").click(function () {
			            if ($(this).is(":checked")) {
			                $(".filter-toggle").show();
			            } else {
			                $(".filter-toggle").hide();
			            }
			        });
			    });
				$('#title').html('Student Listing | ISMS');
			} 
		}
	});
}

function loadEditForm(url){
    $.ajax({
        url: url,
        cache: false,
        success: function(response) {
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

}

$(document.body).on('click', '.edit-student', function(){
	$.ajax({
		url: $('.edit-student').attr('data-href'),
		cache: false,
		success: function(response) {
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
        beforeSend: function(){
            $('#spinner').show();
        },
        complete: function(){
            $('#spinner').hide();
        },
		success: function(response) {
			if(response.success){
				$('.content-wrapper').remove();
				$('#content-wrapper').append(response.student_html);
                $('#student-table').DataTable();
                var sttable = $("#student-b-table").DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'colvis'
                    ]
                });
                $(".buttons-colvis").html('Fields to Show');
                sttable.columns( [ 1, 4, 5, 6, 7,8,9,10,11,12,13,14,15,16 ] ).visible( false, false );
                $('#title').html('Student Listing | ISMS');
                toastr["success"](response.message);
			} else {
                toastr["error"](response.message);
			}
		}
	});
	return false;
});

$(document.body).on('click', '#update_employee', function(){
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


function student_filters(){
    $.ajax({
        url: '/isms/students/student_filters',
        data: $('#student_form_filters').serialize(),
        type: 'post',
        cache: false,
        success: function(response) {
            if(response.student_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.student_html);
                $('#student-table').DataTable();
                var sttable = $("#student-b-table").DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'colvis'
                    ]
                });
                $(".buttons-colvis").html('Fields to Show');
                sttable.columns( [ 1, 4, 5, 6, 7,8,9,10,11,12,13,14,15,16 ] ).visible( false, false );
                $('#title').html('Student Listing | ISMS');
            }
        }
    });
}

$(document.body).on('click', '#save_cat', function(){
    $.ajax({
        url: $('#category_form').attr('data-action'),
        type: 'post',
        data: $('#category_form').serialize(),
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



$(document.body).on('click', '#update_cat', function(){
    $.ajax({
        url: $('#update_category_form').attr('data-action'),
        type: 'post',
        data: $('#update_category_form').serialize(),
        cache: false,
        success: function(response) {
            $('#student_error').hide();
            $('#student_success').hide();
            if(response.student_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.student_html);
                $('.datatables').DataTable();
                $('#title').html('Student Categories | ISMS');

                $( ".modal-backdrop" ).remove();
            } else {
                $('#student_error').show().html(response.message);
            }

        }
    });

    return false;
});

function save_category(id,value) {
    $('#category_id').val(id);
    $('#category_value').val(value);
    var url = $('#data_action').val();
    $('#updateCategoryForm').modal('show');


}

$(document.body).on('click', '.delete-student_cate', function(){
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

function employee_categories(func_call){
    $.ajax({
        url: '/isms/employee_setting/'+func_call,
        cache: false,
        success: function(response) {
            if(response.employee_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.employee_html);
                $('.datatables').DataTable();
                $('#title').html('Employee Categories | ISMS');
            }
        }
    });
}

$(document.body).on('click', '#save_employee_category', function(){
    $.ajax({
        url: $('#employee_cat_form').attr('data-action'),
        type: 'post',
        data: $('#employee_cat_form').serialize(),
        cache: false,
        success: function(response) {
            $('#employee_cat_error').hide();
            $('#employee_cat_success').hide();
            if (response.success) {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.employee_html);
                $('#employee_success').show().html(response.message);
                $('.datatables').DataTable();
                $('#title').html('Employee Department | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#employee_category_add').modal('hide');
            } else {
                $('#employee_cat_error').show().html(response.message);
            }

        }
    });

    return false;
});

$(document.body).on('click', '.edit-employee-category', function(){
   $('#category_id').val($(this).attr('data-href'));
   $('#category_name_update').val($(this).attr('data-value'));
   $('#employee_category_update').modal('show');
   return false;

});

$(document.body).on('click', '#update_employee_category', function(){
    $.ajax({
        url: $('#employee_cat_update').attr('data-action'),
        type: 'post',
        data: $('#employee_cat_update').serialize(),
        cache: false,
        success: function(response) {
            $('#employee_error').hide();
            $('#employee_success').hide();
            if(response.employee_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.employee_html);
                $('#employee_success').show().html(response.message);
                $('.datatables').DataTable();
                $('#title').html('Employee Categories | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#employee_category_update').modal('hide');
            } else {
                $('#employee_error').show().html(response.message);
            }

        }
    });

    return false;
});

$(document.body).on('click', '.delete-employee-category', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('#employee_error').hide();
                $('#employee_success').hide();
                if (response.success) {
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.employee_html);
                    $('#employee_success').show().html(response.message);
                } else {
                    $('#employee_error').show().html(response.message);
                }
            }
        });
    } else {
        return false;
    }

    return false;
});

$(document.body).on('click', '#save_employee_department', function(){
    $.ajax({
        url: $('#employee_department_form').attr('data-action'),
        type: 'post',
        data: $('#employee_department_form').serialize(),
        cache: false,
        success: function(response) {
            $('#employee_department_error').hide();
            $('#employee_department_success').hide();
            if (response.success) {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.employee_html);
                $('#employee_success').show().html(response.message);
                $('.datatables').DataTable();
                $('#title').html('Employee Department | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#employee_department_add').modal('hide');
            } else {
                $('#employee_department_error').show().html(response.message);
            }

        }
    });

    return false;
});

$(document.body).on('click', '.edit-employee-department', function(){
    $('#department_id').val($(this).attr('data-href'));
    $('#department_name_update').val($(this).attr('data-value'));
    $('#department_abbreviation').val($(this).attr('data-abbreviation'));
    $('#employee_department_update').modal('show');
    return false;

});

$(document.body).on('click', '#update_employee_department', function(){
    $.ajax({
        url: $('#employee_department_update_form').attr('data-action'),
        type: 'post',
        data: $('#employee_department_update_form').serialize(),
        cache: false,
        success: function(response) {
            $('#employee_error').hide();
            $('#employee_success').hide();
            if(response.employee_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.employee_html);
                $('#employee_success').show().html(response.message);
                $('.datatables').DataTable();
                $('#title').html('Employee Department | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#employee_department_update').modal('hide');
            } else {
                $('#employee_error').show().html(response.message);
            }

        }
    });

    return false;
});


$(document.body).on('click', '.delete-employee-department', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('#employee_error').hide();
                $('#employee_success').hide();
                if (response.success) {
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.employee_html);
                    $('#employee_success').show().html(response.message);
                } else {
                    $('#employee_error').show().html(response.message);
                }
            }
        });
    } else {
        return false;
    }

    return false;
});

$(document.body).on('click', '#save_employee_position', function(){
    $.ajax({
        url: $('#employee_position_form').attr('data-action'),
        type: 'post',
        data: $('#employee_position_form').serialize(),
        cache: false,
        success: function(response) {
            $('#employee_position_error').hide();
            $('#employee_position_success').hide();
            if (response.success) {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.employee_html);
                $('#employee_success').show().html(response.message);
                $('.datatables').DataTable();
                $('#title').html('Employee Department | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#employee_position_add').modal('hide');
            } else {
                $('#employee_position_error').show().html(response.message);
            }

        }
    });

    return false;
});


$(document.body).on('click', '.edit-employee-position', function(){
    $('#position_id').val($(this).attr('data-href'));
    $('#position_name_update').val($(this).attr('data-value'));
    $('#position_abbreviation').val($(this).attr('data-abbreviation'));
    $('#employee_position_update').modal('show');
    return false;

});


$(document.body).on('click', '#update_employee_position', function(){
    $.ajax({
        url: $('#employee_position_update_form').attr('data-action'),
        type: 'post',
        data: $('#employee_position_update_form').serialize(),
        cache: false,
        success: function(response) {
            $('#employee_error').hide();
            $('#employee_success').hide();
            if(response.employee_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.employee_html);
                $('#employee_success').show().html(response.message);
                $('.datatables').DataTable();
                $('#title').html('Employee Categories | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#employee_position_update').modal('hide');
            } else {
                $('#employee_error').show().html(response.message);
            }

        }
    });

    return false;
});

$(document.body).on('click', '.delete-employee-position', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('#employee_error').hide();
                $('#employee_success').hide();
                if (response.success) {
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.employee_html);
                    $('#employee_success').show().html(response.message);
                } else {
                    $('#employee_error').show().html(response.message);
                }
            }
        });
    } else {
        return false;
    }

    return false;
});


function get_classes(func_call) {
    $.ajax({
        url: '/isms/general_setting/'+func_call,
        cache: false,
        success: function(response) {
            if(response.classes_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.classes_html);
                $('.datatables').DataTable();
                $('#title').html('Classes | ISMS');
            }
        }
    });
}

$(document.body).on('click', '#save_class', function(){
    $.ajax({
        url: $('#class_form').attr('data-action'),
        type: 'post',
        data: $('#class_form').serialize(),
        cache: false,
        success: function(response) {
            $('#class_form_error').hide();
            $('#class_form_success').hide();
            if (response.success) {
                $('#class_form_success').show().html(response.message);
                $('#class_form')[0].reset();
            } else {
                $('#class_form_error').show().html(response.message);
            }

        }
    });

    return false;
});

$(document.body).on('click', '.edit-class', function(){
	var enable = $(this).attr('data-enale')
    $('#class_id').val($(this).attr('data-href'));
    $('#class_name').val($(this).attr('data-value'));
    $('#class_code').val($(this).attr('data-abbreviation'));

    if(enable == 1){
        $('#is_enabled').prop('checked', true);
    }
    $('#class_update').modal('show');
    return false;

});

$(document.body).on('click', '#update_class', function(){
    $.ajax({
        url: $('#class_update_form').attr('data-action'),
        type: 'post',
        data: $('#class_update_form').serialize(),
        cache: false,
        success: function(response) {
            $('#class_error').hide();
            $('#class_success').hide();
            if(response.classes_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.classes_html);
                $('#class_success').show().html(response.message);
                $('.datatables').DataTable();
                $('#title').html('Classes | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#class_update').modal('hide');
            } else {
                $('#class_error').show().html(response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '.delete-class', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('#class_error').hide();
                $('#class_success').hide();
                if (response.success) {
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.classes_html);
                    $('#class_success').show().html(response.message);
                } else {
                    $('#class_error').show().html(response.message);
                }
            }
        });
    } else {
        return false;
    }

    return false;
});

function subject_names(func_call){
    $.ajax({
        url: '/isms/general_setting/'+func_call,
        cache: false,
        success: function(response) {
            if(response.setting_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.setting_html);
                $('.datatables').DataTable();
                $('#title').html('Subject Names | ISMS');
            }
        }
    });
}

$(document.body).on('click', '#save_subject', function(){
    $.ajax({
        url: $('#subject_form').attr('data-action'),
        type: 'post',
        data: $('#subject_form').serialize(),
        cache: false,
        success: function(response) {
            $('#subject_form_error').hide();
            $('#subject_form_success').hide();
            if (response.success) {
                $('#subject_form_success').show().html(response.message);
                $('#subject_form')[0].reset();
            } else {
                $('#subject_form_error').show().html(response.message);
            }

        }
    });

    return false;
});

$(document.body).on('click', '.edit-subject', function(){
    $('#subject_id').val($(this).attr('data-href'));
    $('#subject_name').val($(this).attr('data-value'));
    $('#subject_code').val($(this).attr('data-abbreviation'));
    $('#subject_update').modal('show');
    return false;

});

$(document.body).on('click', '#update_subject', function(){
    $.ajax({
        url: $('#subject_update_form').attr('data-action'),
        type: 'post',
        data: $('#subject_update_form').serialize(),
        cache: false,
        success: function(response) {
            $('#subject_error').hide();
            $('#subject_success').hide();
            if(response.setting_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.setting_html);
                $('#subject_success').show().html(response.message);
                $('.datatables').DataTable();
                $('#title').html('Classes | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#subject_update').modal('hide');
            } else {
                $('#subject_error').show().html(response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '.delete-subject', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('#subject_error').hide();
                $('#subject_success').hide();
                if (response.success) {
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.setting_html);
                    $('#class_success').show().html(response.message);
                } else {
                    $('#class_error').show().html(response.message);
                }
            }
        });
    } else {
        return false;
    }

    return false;
});


$(document.body).on('click', '#save_institution', function(){
    $.ajax({
        url: $('#institution_form').attr('data-action'),
        type: 'post',
        data: $('#institution_form').serialize(),
        cache: false,
        success: function(response) {
            $('#institution_error').hide();
            $('#institution_success').hide();
            if (response.success) {
                $('#institution_success').show().html(response.message);
                $('#institution_form')[0].reset();
            } else {
                $('#institution_error').show().html(response.message);
            }

        }
    });

    return false;
});

$(document.body).on('click', '#save_session', function(){
    $.ajax({
        url: $('#session_form').attr('data-action'),
        type: 'post',
        data: $('#session_form').serialize(),
        cache: false,
        success: function(response) {
            $('#session_error').hide();
            $('#session_success').hide();
            if(response.session_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.session_html);
                $('#session_success').show().html(response.message);
                $('.datatables').DataTable();
                $('#title').html('Session | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#session_add').modal('hide');
            } else {
                $('#session_error').show().html(response.message);
            }

        }
    });

    return false;
});

$(document.body).on('click', '.edit-session', function(){
    $('#session_id').val($(this).attr('data-href'));
    $('#first_term_start').val($(this).attr('data-first-term-start'));
    $('#first_term_end').val($(this).attr('data-first-term-end'));
    $('#second_term_start').val($(this).attr('data-second-term-start'));
    $('#second_term_end').val($(this).attr('data-second-term-end'));
    $('#third_term_start').val($(this).attr('data-third-term-start'));
    $('#third_term_end').val($(this).attr('data-third-term-end'));
    $('#name').val($(this).attr('data-value'));
    $('#session_edit').modal('show');
    return false;

});

$(document.body).on('click', '#update_session', function(){
	alert($('#session_update_form').attr('data-action'));
    $.ajax({
        url: $('#session_update_form').attr('data-action'),
        type: 'post',
        data: $('#session_update_form').serialize(),
        cache: false,
        success: function(response) {
            $('#session_error').hide();
            $('#session_success').hide();
            if(response.session_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.session_html);
                $('#session_success').show().html(response.message);
                $('.datatables').DataTable();
                $('#title').html('Classes | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#session_edit').modal('hide');
            } else {
                $('#session_error').show().html(response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '.delete-session', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('#session_error').hide();
                $('#session_success').hide();
                if (response.success) {
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.session_html);
                    $('#session_success').show().html(response.message);
                } else {
                    $('#session_error').show().html(response.message);
                }
            }
        });
    } else {
        return false;
    }

    return false;
});

function institution_bank_acc(func_call){
    $.ajax({
        url: '/isms/finance/'+func_call,
        cache: false,
        success: function(response) {
            if(response.finance_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.finance_html);
                $('.datatables').DataTable({
                    "scrollX": true
                });
                $('#title').html('Institution Bank Accounts | ISMS');
            }
        }
    });
}

$(document.body).on('click', '#save_account', function(){
    $.ajax({
        url: $('#institution_bank_account_form').attr('data-action'),
        type: 'post',
        data: $('#institution_bank_account_form').serialize(),
        cache: false,
        success: function(response) {
            $('#account_error').hide();
            $('#account_success').hide();
            if(response.finance_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.finance_html);
                $('#account_success').show().html(response.message);
                $('.datatables').DataTable();
                $('#title').html('Session | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#institute_account').modal('hide');
            } else {
                $('#account_error').show().html(response.message);
            }

        }
    });

    return false;
});

$(document.body).on('click', '.edit-account', function(){
    $('#account_id').val($(this).attr('data-href'));
    $('#account_name').val($(this).attr('account-name'));
    $('#account_number').val($(this).attr('account-number'));
    $('#upadate_institute_account').modal('show');
    return false;

});

$(document.body).on('click', '#update_account', function(){
    $.ajax({
        url: $('#institution_bank_account_update_form').attr('data-action'),
        type: 'post',
        data: $('#institution_bank_account_update_form').serialize(),
        cache: false,
        success: function(response) {
            $('#account_error').hide();
            $('#account_success').hide();
            if(response.finance_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.finance_html);
                $('#account_success').show().html(response.message);
                $('.datatables').DataTable();
                $('#title').html('Classes | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#upadate_institute_account').modal('hide');
            } else {
                $('#account_error').show().html(response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '.delete-account', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('#account_error').hide();
                $('#account_success').hide();
                if (response.success) {
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.finance_html);
                    $('#account_success').show().html(response.message);
                } else {
                    $('#account_error').show().html(response.message);
                }
            }
        });
    } else {
        return false;
    }

    return false;
});

function fee_types(func_call){
    $.ajax({
        url: '/isms/finance/'+func_call,
        cache: false,
        success: function(response) {
            if(response.finance_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.finance_html);
                $('.datatables').DataTable({
                    "scrollX": true
                });
                $('#title').html('Fee Type | ISMS');
            }
        }
    });
}

$(document.body).on('click', '#save_fee', function(){
    $.ajax({
        url: $('#add_fee_form').attr('data-action'),
        type: 'post',
        data: $('#add_fee_form').serialize(),
        cache: false,
        success: function(response) {
            if(response.finance_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.finance_html);
                toastr["success"]("Fee save successfully!");
                $('.datatables').DataTable();
                $('#title').html('Session | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#add_fee').modal('hide');
            } else {
                toastr["warning"](response.message);
            }

        }
    });

    return false;
});

$(document.body).on('click', '.edit-fee', function(){
    $('#fee_id').val($(this).attr('data-href'));
    $('#fee_name').val($(this).attr('data-name'));
    $('#fee_description').val($(this).attr('data-description'));
    $('#edit_fee').modal('show');
    return false;

});

$(document.body).on('click', '#update_fee', function(){
    $.ajax({
        url: $('#update_fee_form').attr('data-action'),
        type: 'post',
        data: $('#update_fee_form').serialize(),
        cache: false,
        success: function(response) {
            if(response.finance_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.finance_html);
                toastr["success"]("Fee updated successfully!");
                $('.datatables').DataTable();
                $('#title').html('Fees | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#edit_fee').modal('hide');
            } else {
                toastr["warning"](response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '.delete-fee', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                if (response.success) {
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.finance_html);
                    toastr["success"](response.message);
                } else {
                    toastr["warning"](response.message);
                }
            }
        });
    } else {
        return false;
    }

    return false;
});

$(document.body).on('click', '#save_payment', function(){
    $.ajax({
        url: $('#add_payment_form').attr('data-action'),
        type: 'post',
        data: $('#add_payment_form').serialize(),
        cache: false,
        success: function(response) {
            if(response.finance_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.finance_html);
                toastr["success"](response.message);
                $('.datatables').DataTable();
                $('#title').html('Session | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#add_payment').modal('hide');
            } else {
                toastr["warning"](response.message);
            }

        }
    });

    return false;
});

$(document.body).on('click', '.edit-payment', function(){
    $('#is_incoming').prop('checked', false);
    var incoming = $(this).attr('data-incoming')
    $('#payment_id').val($(this).attr('data-href'));
    $('#payment_name').val($(this).attr('data-name'));
    $('#payment_description').val($(this).attr('data-description'));
    if(incoming == 1){
        $('#is_incoming').prop('checked', true);
    }
    $('#edit_payment').modal('show');
    return false;
});

$(document.body).on('click', '#update_payment', function(){
    $.ajax({
        url: $('#update_payment_form').attr('data-action'),
        type: 'post',
        data: $('#update_payment_form').serialize(),
        cache: false,
        success: function(response) {
            if(response.finance_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.finance_html);
                toastr["success"](response.message);
                $('.datatables').DataTable();
                $('#title').html('Fees | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#edit_payment').modal('hide');
            } else {
                toastr["warning"](response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '.delete-payment', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                if (response.success) {
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.finance_html);
                    toastr["success"](response.message);
                } else {
                    toastr["warning"](response.message);
                }
            }
        });
    } else {
        return false;
    }
    return false;
});

function assessment_category(func_call){
    $.ajax({
        url: '/isms/assessment/'+func_call,
        cache: false,
        success: function(response) {
            if(response.assessment_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.assessment_html);
                $('.datatables').DataTable({
                    "scrollX": true
                });
                $('#title').html('Assessment Categories Type | ISMS');
            }
        }
    });
}

$(document.body).on('click', '#save_assessment_category', function(){
    $.ajax({
        url: $('#add_assessment_category_form').attr('data-action'),
        type: 'post',
        data: $('#add_assessment_category_form').serialize(),
        cache: false,
        success: function(response) {
            if(response.assessment_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.assessment_html);
                toastr["success"](response.message);
                $('.datatables').DataTable();
                $('#title').html('Assessment Categories | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#add_assessment_category').modal('hide');
            } else {
                toastr["warning"](response.message);
            }

        }
    });

    return false;
});

$(document.body).on('click', '.edit-assessment-category', function(){
    $('#assessment_category_id').val($(this).attr('data-href'));
    $('#assessment_category_name').val($(this).attr('data-name'));
    $('#assessment_category_abbreviation').val($(this).attr('data-abbreviation'));
    $('#update_assessment_category').modal('show');
    return false;
});

$(document.body).on('click', '#update_assessment', function(){
    $.ajax({
        url: $('#update_assessment_category_form').attr('data-action'),
        type: 'post',
        data: $('#update_assessment_category_form').serialize(),
        cache: false,
        success: function(response) {
            if(response.assessment_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.assessment_html);
                toastr["success"](response.message);
                $('.datatables').DataTable();
                $('#title').html('Fees | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#update_assessment_category').modal('hide');
            } else {
                toastr["warning"](response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '.delete-assessment-category', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                if (response.success) {
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.assessment_html);
                    toastr["success"](response.message);
                } else {
                    toastr["warning"](response.message);
                }
            }
        });
    } else {
        return false;
    }

    return false;
});

$(document.body).on('click', '#save-transection', function(){
    $.ajax({
        url: $('#new-transaction-categories-form').attr('data-action'),
        type: 'post',
        data: $('#new-transaction-categories-form').serialize(),
        cache: false,
        success: function(response) {
            $('#transaction_error').hide();
            $('#transaction_success').hide();
            if(response.finance_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.finance_html);
                $('#transaction_success').show().html(response.message);
                $('.datatables').DataTable();
                $('#title').html('Transaction Categories | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#new-transaction-categories').modal('hide');
            } else {
                $('#transaction_error').show().html(response.message);
            }

        }
    });

    return false;
});

$(document.body).on('click', '.edit-trans-cat', function(){
    $('#trans_id').val($(this).attr('data-href'));
    $('#edit_transaction_name').val($(this).attr('name'));
    $('#edit_transaction_description').val($(this).attr('description'));
    $('#edit-transaction-categories').modal('show');
    return false;

});

$(document.body).on('click', '#update-transaction-categories', function(){
    $.ajax({
        url: $('#update-transaction-categories-form').attr('data-action'),
        type: 'post',
        data: $('#update-transaction-categories-form').serialize(),
        cache: false,
        success: function(response) {
            $('#transaction_error').hide();
            $('#transaction_success').hide();
            if(response.finance_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.finance_html);
                $('#transaction_success').show().html(response.message);
                $('.datatables').DataTable();
                $('#title').html('Transaction Categories | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#edit-transaction-categories').modal('hide');
            } else {
                $('#transaction_error').show().html(response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '.delete-trans-cat', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('#transaction_error').hide();
                $('#transaction_success').hide();
                if (response.success) {
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.finance_html);
                    toastr["success"]("Deleted successfully!");
                } else {
                    toastr["warning"]("There is an error while deleting!");
                }
            }
        });
    } else {
        return false;
    }

    return false;
});

function grade_scales(func_call){
    $.ajax({
        url: '/isms/grade_scale/'+func_call,
        cache: false,
        success: function(response) {
            if(response.scale_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.scale_html);
                $('#title').html('Grading Scales | ISMS');
            }
        }
    });
}

$(document.body).on('click', '#save_scale', function(){
    $.ajax({
        url: $('#grade_scale_add_form').attr('data-action'),
        type: 'post',
        data: $('#grade_scale_add_form').serialize(),
        cache: false,
        success: function(response) {
            if(response.scale_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.scale_html);
                toastr["success"](response.message);
                $('.datatables').DataTable();
                $('#title').html('Grade Scales | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#add_scale').modal('hide');
            } else {
                toastr["warning"](response.message);
            }

        }
    });

    return false;
});

$(document.body).on('click', '.edit_grade_scale', function(){
    var scale_id = $(this).attr('data-href');
    $.ajax({
        url: '/isms/grade_scale/edit_scale/'+scale_id,
        cache: false,
        success: function(response) {
            $('.edit-modal-body').empty();
            $('.edit-modal-body').append(response.scale_html);
            $('#edit_scale').modal('show');
        }
    });
    return false;
});

$(document.body).on('click', '#update_scale', function(){
    $.ajax({
        url: $('#grade_scale_update_form').attr('data-action'),
        type: 'post',
        data: $('#grade_scale_update_form').serialize(),
        cache: false,
        success: function(response) {
            if(response.scale_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.scale_html);
                toastr["success"](response.message);
                $('#title').html('Grade Scales | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#edit_scale').modal('hide');
            } else {
                toastr["warning"](response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '.delete-grade-scale', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                if (response.success) {
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.scale_html);
                    toastr["success"](response.message);
                } else {
                    toastr["warning"](response.message);
                }
            }
        });
    } else {
        return false;
    }

    return false;
});


$(document.body).on('click', '.grade_scale_level', function(){
    var scale_id = $(this).attr('data-href');
    $.ajax({
        url: '/isms/grade_scale/grade_scales_level/'+scale_id,
        cache: false,
        success: function(response) {
            if (response.scale_html != '') {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.scale_html);
                $('#title').html('Grade Scale Levels | ISMS');
            } else {
                toastr["warning"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '#save_scale_level', function(){
    $.ajax({
        url: $('#grade_scale_level_add_form').attr('data-action'),
        type: 'post',
        data: $('#grade_scale_level_add_form').serialize(),
        cache: false,
        success: function(response) {
            if(response.scale_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.scale_html);
                toastr["success"](response.message);
                $('.datatables').DataTable();
                $('#title').html('Grade Scale Levels | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#add_scale_level').modal('hide');
            } else {
                toastr["warning"](response.message);
            }

        }
    });

    return false;
});

$(document.body).on('click', '.edit_grade_scale_level', function(){
    $('#grade_scale_level_edit_form')[0].reset();
    $('#level_id').val($(this).attr('data-href'));
    $('#scale_id').val($(this).attr('data-scale-id'));
    $('#level_name').val($(this).attr('data-name'));
    $('#min_percentage').val($(this).attr('data-percent'));
    $('#level_remarks').val($(this).attr('data-remaks'));
    $('#edit_scale_level').modal('show');
});

$(document.body).on('click', '#update_scale_level', function(){
    $.ajax({
        url: $('#grade_scale_level_edit_form').attr('data-action'),
        type: 'post',
        data: $('#grade_scale_level_edit_form').serialize(),
        cache: false,
        success: function(response) {
            if(response.scale_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.scale_html);
                toastr["success"](response.message);
                $('.datatables').DataTable();
                $('#title').html('Grade Scales | ISMS');
                $( ".modal-backdrop" ).remove();
                $('#edit_scale_level').modal('hide');
            } else {
                toastr["warning"](response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '.delete-grade-scale-level', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                if (response.success) {
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.scale_html);
                    toastr["success"](response.message);
                } else {
                    toastr["warning"](response.message);
                }
            }
        });
    } else {
        return false;
    }

    return false;
});

$(document.body).on('click', '.retire-grade-scale', function(){
    $.ajax({
        url: $(this).attr('data-href'),
        cache: false,
        success: function(response) {
            if (response.success) {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.scale_html);
                toastr["success"](response.message);
            } else {
                toastr["warning"](response.message);
            }
        }
    });
    return false;
});

function domains(func_call){
    $.ajax({
        url: '/isms/domains/'+func_call,
        cache: false,
        success: function(response) {
            if(response.domain_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.domain_html);
                $('#title').html('Grading Scales | ISMS');
            }
        }
    });
}

$(document.body).on('click', '#save_domain_indicator', function(){
    $.ajax({
        url: $('#add_domain_indicator_form').attr('data-action'),
        type: 'post',
        data: $('#add_domain_indicator_form').serialize(),
        cache: false,
        success: function(response) {
            if(response.indicator_html != ''){
                $('.domain_indicator_table').empty();
                $('.domain_indicator_table').append(response.indicator_html);
                $('#add_domain_group_indicator').modal('hide');
                toastr["success"](response.message);
            } else {
                toastr["warning"](response.message);
            }

        }
    });

    return false;
});

$(document.body).on('click', '.edit-domain-group-indicator', function(){
     $('#edit_domain_indicator_form')[0].reset();
     $('#indicator_id').val($(this).attr('data-href'));
     $('#indicator_name').val($(this).attr('data-name'));
     $('#indicator_code').val($(this).attr('data-code'));
     $('#indicator_description').val($(this).attr('data-description'));
     $('#domain_id').val($(this).attr('data-domain-id'));
    $('#edit_domain_group_indicator').modal('show');
});

$(document.body).on('click', '#update_domain_indicator', function(){
    $.ajax({
        url: $('#edit_domain_indicator_form').attr('data-action'),
        type: 'post',
        data: $('#edit_domain_indicator_form').serialize(),
        cache: false,
        success: function(response) {
            if(response.indicator_html != ''){
                $('.domain_indicator_table').empty();
                $('.domain_indicator_table').append(response.indicator_html);
                $('#edit_domain_group_indicator').modal('hide');
                toastr["success"](response.message);
            } else {
                toastr["warning"](response.message);
            }
        }
    });

    return false;
});

$(document.body).on('click', '.delete-domain-group-indicator', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            type: 'post',
            data : { delete_id : $(this).attr('data-delete-id'), domain_id : $(this).attr('data-domain-id') },
            cache: false,
            success: function(response) {
                if (response.success) {
                    $('.domain_indicator_table').empty();
                    $('.domain_indicator_table').append(response.indicator_html);
                    toastr["success"](response.message);
                } else {
                    toastr["warning"](response.message);
                }
            }
        });
    } else {
        return false;
    }

    return false;
});

$(document.body).on('click', '.assign-guardian', function(){
    $('#assign_guardian_form')[0].reset();
    $('#student_id').val($(this).attr('data-student-id'));
    $('#guardian_id').val($(this).attr('data-guardian-id'));
    $('#assign_guardian').modal('show');
    return false;

});

$(document.body).on('click', '#assign_student_guardian', function(){
    $.ajax({
        url: $('#assign_guardian_form').attr('data-action'),
        type: 'post',
        data: $('#assign_guardian_form').serialize(),
        cache: false,
        success: function(response) {
            if(response.guardian_html != ''){
                $('#guardian_table').empty();
                $('#guardian_table').append(response.guardian_html);
                $('#assign_guardian').modal('hide');
                toastr["success"](response.message);
            } else {
                toastr["warning"](response.message);
            }

        }
    });

    return false;
});

$(document.body).on('click', '#save_student_guardian', function(){
    $.ajax({
        url: $('#create_guardian_form').attr('data-action'),
        type: 'post',
        data: $('#create_guardian_form').serialize(),
        cache: false,
        success: function(response) {
            if(response.guardian_html != ''){
                $('#guardian_table').empty();
                $('#guardian_table').append(response.guardian_html);
                $('#myModal').modal('hide');
                toastr["success"](response.message);
            } else {
                toastr["warning"](response.message);
            }

        }
    });

    return false;
});

$(document.body).on('click', '.unassign-guardian', function(){
    if (confirm('Are you sure to unassin this guardian?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            type: 'post',
            data : { guardian_id : $(this).attr('data-guardian-id'), student_id : $(this).attr('data-student-id') },
            cache: false,
            success: function(response) {
                if(response.guardian_html != ''){
                    $('#guardian_table').empty();
                    $('#guardian_table').append(response.guardian_html);
                    toastr["success"](response.message);
                } else {
                    toastr["warning"](response.message);
                }
            }
        });
    } else {
        return false;
    }

    return false;
});


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


function get_batches(func_call) {
    $.ajax({
        url: '/isms/batches/'+func_call,
        cache: false,
        success: function(response) {
            if(response.batch_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.batch_html);

                $('.select2').select2({
                    placeholder: "Show more fields"
                });
                $('#title').html('Batches | ISMS');

            }
        }
    });
}

$(document.body).on('click', '#save_batch', function(){
    $.ajax({
        url: $('#batch_form').attr('data-action'),
        type: 'post',
        data: $('#batch_form').serialize(),
        cache: false,
        success: function(response) {
            if (response.success) {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.batch_html);
                $('#new_batch').modal('hide');
                $( ".modal-backdrop" ).remove();
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '.edit-batch', function(){

    $.ajax({
        url: $(this).attr('data-href'),
        cache: false,
        success: function(response) {
            $('.modal-body').empty();
            $('.modal-body').append(response.batch_html);
            $('#new_batch').modal('show');
        }
    });
    return false;
});

$(document.body).on('click', '.delete-batch', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            type: 'post',
            data : { delete_id : $(this).attr('data-delete-id'), domain_id : $(this).attr('data-domain-id') },
            cache: false,
            success: function(response) {
                if (response.success) {
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.batch_html);
                    toastr["success"](response.message);
                } else {
                    toastr["success"](response.message);
                }
            }
        });
    } else {
        return false;
    }

    return false;
});

$(document.body).on('click', '#assign_employee', function(){
    $.ajax({
        url: $('#assign_employee_form').attr('data-action'),
        type: 'post',
        data: $('#assign_employee_form').serialize(),
        cache: false,
        success: function(response) {
            if (response.success) {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.batch_html);
                $('#myModal').modal('hide');
                $( ".modal-backdrop" ).remove();
                toastr["success"](response.message);
            } else {
                toastr["success"](response.message);
            }
        }
    });
    return false;
});


function get_subjects(func_call) {
    $.ajax({
        url: '/isms/subjects/'+func_call,
        cache: false,
        success: function(response) {
            if(response.subject_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.subject_html);
                $('#title').html('Subjects | ISMS');
            }
        }
    });
}

$(document.body).on('click', '#save_subject', function(){
    $.ajax({
        url: $('#batch_form').attr('data-action'),
        type: 'post',
        data: $('#batch_form').serialize(),
        cache: false,
        success: function(response) {
            if (response.success) {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.subject_html);
                $('#new_subject').modal('hide');
                $( ".modal-backdrop" ).remove();
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});


$(document.body).on('click', '.delete_subject_detail', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            type: 'post',
            cache: false,
            success: function(response) {
                if (response.success) {
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.subject_html);
                    toastr["success"](response.message);
                } else {
                    toastr["success"](response.message);
                }
            }
        });
    } else {
        return false;
    }

    return false;
});


$(".update_check").change(function() {
    var subject_id = $(this).attr('data-subject-id');
    var data_update = $(this).attr('data-update');
    $.ajax({
        url: '/isms/subjects/update_publish_grade',
    	type: 'post',
        data : { subject_detail_id : subject_id, data_update:data_update },
    	cache: false,
        success: function(response) {
        if (response.success) {
            toastr["success"](response.message);
        } else {
            toastr["error"](response.message);
        }
    }
	});

});

function get_calendar(func_call) {
    $.ajax({
        url: '/isms/calendar/'+func_call,
        cache: false,
        success: function(response) {
            if(response.calendar_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.calendar_html);
                $('#title').html('Subjects | ISMS');
            }
        }
    });
}

function get_events(func_call) {
    $.ajax({
        url: '/isms/calendar/'+func_call,
        cache: false,
        success: function(response) {
            if(response.calendar_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.calendar_html);
                $('#title').html('Subjects | ISMS');
            }
        }
    });
}

$(document.body).on('click', '.delete-event', function(){
        if (confirm('Are you sure to delete this record?')) {
            $.ajax({
                url: $(this).attr('data-href'),
                type: 'post',
                data : { event_id : $(this).attr('data-event-id')},
                cache: false,
                success: function(response) {
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.calendar_html);
                    toastr["success"](response.message);
                }
            });
        } else {
            return false;
        }

        return false;
});

function get_sms(func_call) {
    $.ajax({
        url: '/isms/sms/'+func_call,
        cache: false,
        success: function(response) {
            if(response.sms_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.sms_html);
                $('#title').html('SMS | ISMS');
            }
        }
    });
}

$(document.body).on('click', '#send_message', function(){
    $.ajax({
        url: $('#sms_form').attr('data-action'),
        type: 'post',
        data: $('#sms_form').serialize(),
        cache: false,
        success: function(response) {
            console.log(response);
            if(response.success){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.sms_html);
                $('#title').html('SMS | ISMS');
                toastr["success"](response.message);
            }else{
                toastr["warning"](response.message);
			}
        }
    });

    return false;
});

$(document.body).on('click', '.add-sms', function(){
    $.ajax({
        url: $(this).attr('data-href'),
        type: 'post',
        cache: false,
        success: function(response) {
            if (response.sms_html!=='') {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.sms_html);
                $('#title').html('SMS | Add Message');
            } else {
                toastr["warning"]('Unable to load view');
            }
        }
    });

    return false;
});

$(document.body).on('click', '.sms_view', function(){
    $.ajax({
        url: $(this).attr('data-href'),
        type: 'post',
        data: {sms_id:$(this).attr('data-sms-id')},
        cache: false,
        success: function(response) {
            if (response.sms_html!=='') {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.sms_html);
                $('#title').html('SMS | View Message');
            } else {
                toastr["warning"]('Unable to load view');
            }
        }
    });

    return false;
});