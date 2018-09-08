<script type="text/javascript">
   $('#expList > li').click(function(e){
      e.stopPropagation();
      if(this.getElementsByTagName("ul")[0].style.display == 'block'){
        $(this).find("ul").slideUp();
    }
      else{
        $(this).find("ul").slideDown();
    }
    });

   /////////////// Add student /////////////////////
   $('li #list_itmes_add_student').click(function(){
   	get_students($(this).attr('data-func-call'));
   });
      /////////////// student fields  /////////////////////
   $('li #list_itmes_student_fields').click(function(){
   	profile_fields($(this).attr('data-func-call'));
   });
      /////////////// student categories  ////////////////
   $('li #list_itmes_student_cat').click(function(){
    student_categories($(this).attr('data-func-call'));
   });
    /////////////// Search Students /////////////////////
   $('li #list_itmes_students').click(function(){
    students_listing($(this).attr('data-func-call'));
   });
    /////////////// Search Students /////////////////////
   $('li #list_itmes_employee').click(function(){
    employee_listing($(this).attr('data-func-call'));
   });
    /////////////// Add employee /////////////////////
   $('li #list_itmes_employee_add').click(function(){
    employee_add($(this).attr('data-func-call'));
   });
      /////////////// Search guardians /////////////////////
   $('#list_itmes_guardians').click(function(){
    guardian_listings($(this).attr('data-func-call'));
   });
    /////////////// attendance register /////////////////////
   $('#list_itmes_register').click(function(){
    attendance_register($(this).attr('data-func-call'));
   });
  /////////////// attendance register ///////////////////
   $('#list_itmes_reports').click(function(){
    attendance_reports($(this).attr('data-func-call'));
   });

   /////////////// employee profile fields ///////////////////
   $('#list_itmes_employee_profile_fields').click(function(){
    emp_fields($(this).attr('data-func-call'));
   });
   /////////////// employee categories ///////////////////
   $('#list_itmes_employee_cat').click(function(){
    employee_categories($(this).attr('data-func-call'));
   });

   /////////////// employee deparment ///////////////////
   $('#list_itmes_employee_department').click(function(){
      emp_department($(this).attr('data-func-call'));
   });
      
    /////////////// employee positions ///////////////////
   $('#list_itmes_emp_positions').click(function(){
      employee_position($(this).attr('data-func-call'));
   });

   ///////////////// classes ////////////////////////////
   $('#list_itmes_classes').click(function(){
       get_classes($(this).attr('data-func-call'));
   });

  /////////////// institution details ///////////////////
   $('#list_itmes_institution_details').click(function(){
      institue_details($(this).attr('data-func-call'));
       $( "#list_itmes_institution_details" ).addClass( "active nav-link" );
   });

  /////////////// subject names ///////////////////
   $('#list_itmes_subject_name').click(function(){
      subject_names($(this).attr('data-func-call'));
   });

  /////////////// academic session ///////////////////
   $('#list_itmes_academic_sessions').click(function(){
      academic_session($(this).attr('data-func-call'));
   });

     /////////////// institution bank accounts ///////////////////
   $('#list_itmes_institution_bank_accounts').click(function(){
      institution_bank_acc($(this).attr('data-func-call'));
   });

    /////////////// fee type ///////////////////
   $('#list_itmes_fee_type').click(function(){
      fee_types($(this).attr('data-func-call'));
   });

   /////////////// custom payment method ///////////////////
   $('#list_itmes_custom_payment_method').click(function(){
      custom_payments($(this).attr('data-func-call'));
   });

    /////////////// custom payment method ///////////////////
   $('#list_itmes_transaction_categories').click(function(){
      transaction_category($(this).attr('data-func-call'));
   });

   /////////////// assessment categories ///////////////////
   $('#list_itmes_assessments').click(function(){
       assessment_category($(this).attr('data-func-call'));
   });

   /////////////// assessment grade scales ///////////////////
   $('#list_itmes_grade_scales').click(function(){
       grade_scales($(this).attr('data-func-call'));
   });

   /////////////// assessment learning domain ///////////////////
   $('#list_itmes_domains').click(function(){
       domains($(this).attr('data-func-call'));
   });

   $('#list_itmes_batches').click(function(){
       get_batches($(this).attr('data-func-call'));
   });

   $('#list_itmes_subjects').click(function(){
       get_subjects($(this).attr('data-func-call'));
   });
   
   $('#list_itmes_Calendar').click(function(){
       get_calendar($(this).attr('data-func-call'));
   });
   
   $('#list_itmes_events').click(function(){
       get_events($(this).attr('data-func-call'));
   });

   $('#list_itmes_sms').click(function(){
       get_sms($(this).attr('data-func-call'));
   });

   $('#list_itmes_fee_management').click(function(){
       get_fee_management($(this).attr('data-func-call'));
   });

   $(document).ready(function()
   {
       $('#expList li').click(function(e)
       {
           if(this.id!='list_itmes_'){
               $( "li" ).removeClass( "active nav-link" );
               $( "#"+this.id ).addClass( "active nav-link" );
           }

       });
   });

</script>

<?php
echo $menu_result;