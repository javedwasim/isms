$(document).ready(function () {

    $('#guardian').DataTable();
    $(".buttons-colvis").html('Fields to Show');
    var sttable = $("#student-b-table").DataTable({

        dom: 'Bfrtip',
        buttons: [
        'colvis'
        ]
    });

    sttable.columns( [ 1, 4, 5, 6, 7,8,9,10,11,12,13,14,15,16 ] ).visible( false, false );


/////////////////// toster alert settings //////////////
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "300",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }

/////////////////////////////////////////////////////////


    ///////////////////////////// Sidebar menu call //////////////////////

    var base_url = $('#base').val();
    $('.sidebar-menu').load(base_url + "dashboard/get_menus", function () {
        $('.sidebar-menu').fadeIn('fast');
    });
    ////////////////////////datatable initilization////////////////////////

    $('#example1').DataTable();

    ////////////////////// employee phone number//////////////////////////

    $("#emp-phone").intlTelInput();

    ////////////////////// employee mobile phone number//////////////////////////

    $("#emp-mb-phone").intlTelInput();

    ////////////////employee date of joining///////////////////////////////

    $('#emp-doj').datepicker({
        format: 'dd-mm-yyyy'
    });

    ///////////////////////// employee date of birth///////////////////////

    $('#emp-dob').datepicker({
        format: 'dd-mm-yyyy'
    });
    /////////////////////// Guardian tabel/////////////////////////////
    $(document).ready(function () {
        $('#guardian').DataTable({
            "searching": false
        });
    });
    /////////////////////////// assign guardian form show /////////////////////

    $(document.body).on('submit', '#guardian_form', function () {
        $.ajax({
            url: $(this).attr('data-action'),
            type: 'post',
            data: $(this).serialize(),
            cache: false,
            success: function(response) {
                if(response.success) {
                    $('#guardian-assign-info').remove();
                    $('.guardian-card').append(response.guardian_html);
                    $("#search-guardian").show('slow');
                    $('#myModal').modal('hide');
                    $('#guardian_form')[0].reset();
                    $('#guardian').DataTable({

                    });
                }
            }
        });
        /*$("#search-guardian").hide();
        $("#assign").show("slow");
        $('#myModal').modal('hide');*/
        return false;

    });

    $(document.body).on('click', '#ex-guardian', function () {
        $("#assign").hide();
        $("#search-guardian").show("slow");
        return false;
    });

    ////////////////////////Guardian table////////////////////////

    $('#guardian-ward').DataTable({
        searching: false,
        info: false,
        paging: false
    });
    
    $('#guardian-table').DataTable({
        searching: false,
        info: false,
        paging: false
    });

    ////////////////////////Student Profile table////////////////////////

    $('#student-profile-table').DataTable({
        searching: false,
        info: false,
        paging: false
    });

    ////////////////////////// Student profile script //////////////////

    $('#st-profile-datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });

    ////////////////////////// employee profile script //////////////////

    $('#emp-profile-datepicker').datepicker({
        format: 'dd-mm-yyyy'
    });  

    //////////////////////// employee listings///////////////////////////
    $('#emp-li-dob').datepicker({
        format: 'dd-mm-yyyy'
    });

    $('#emp-li-doj').datepicker({
        format: 'dd-mm-yyyy'
    });

    $('.select2').select2({
        placeholder: "Show more fields"
    });

    /////////////////Flat red color scheme for iCheck//////////////////
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

    /////////////////////// filter fiels show hide //////////////////////////////////
    $(function () {
        $(".show-more").click(function () {
            if ($(this).is(":checked")) {
                $(".filter-toggle").show();
            } else {
                $(".filter-toggle").hide();
            }
        });
    });

});

    function emp_fields(func_call) {
        $.ajax({
            url: '/isms/employee_setting/'+func_call,
            cache: false,
            success: function(response) {
                console.log(response.employee_html);
                if(response.employee_html != ''){
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.employee_html);
                    $('#title').html('Employee Fields | ISMS');
                }
            }
        });
    }




    function emp_department(func_call){
        $.ajax({
            url: '/isms/employee_setting/'+func_call,
            cache: false,
            success: function(response) {
                if(response.employee_html != ''){
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.employee_html);
                    $('.datatables').DataTable();
                    $('#title').html('Employee Department | ISMS');
                }
            }
        });
    }
    function employee_position(func_call){
        $.ajax({
            url: '/isms/employee_setting/'+func_call,
            cache: false,
            success: function(response) {
                if(response.employee_html != ''){
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.employee_html);
                    $('.datatables').DataTable();
                    $('#title').html('Employee Positions | ISMS');
                }
            }
        });
    }


    $(document.body).on('click', '#employee_fields', function(){
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

    function institue_details(func_call){
        $.ajax({
            url: '/isms/general_setting/'+func_call,
            cache: false,
            success: function(response) {
                if(response.settings_html != ''){
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.settings_html);
                    $('.select2').select2();
                    $('#title').html('Institue Details | ISMS');
                }
            }
        });
    }

     $('.datepicker').datepicker({
        format: 'dd-mm-yyyy'
    });

    function academic_session(func_call){
    $.ajax({
        url: '/isms/general_setting/'+func_call,
        cache: false,
        success: function(response) {
            if(response.setting_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.setting_html);
                $('.datatables').DataTable({
                    "scrollX": true
                });
                $('.datepicker').datepicker({
                    format: 'yyyy-mm-dd'
                });
                $('#title').html('Academic Sessions | ISMS');
            }
        }
    });
    }



    function custom_payments(func_call){
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
                $('#title').html('Custom Payment Methods | ISMS');
            }
        }
    });
    }

    function transaction_category(func_call){
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
                $('#title').html('Transaction Categories | ISMS');
            }
        }
    });
    }

    