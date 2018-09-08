 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0 text-dark">Search</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">guardian search</li>
           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>

   <!-- /.content-header -->
   <section class="content">
     <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div id="student_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          </div>
          <div id="student_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          </div>
        </div>
      </div>
      <div class="row"> 
       <div class="col-md-12">
        <div class="card card-primary">
         <div class="card-header">
           <h3 class="card-title">Guardians</h3>
         </div>

         <!-- /.card-header -->
         <div class="card-body">
             <div class="btn-group">
                 <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                     <i class="fa fa-user-plus"></i>Create New Guardian</a>
             </div>
             <hr>
             <div id="student_guardian_table">
                 <table id="guardian_table" class="table table-bordered table-striped datatables">
                     <thead>
                     <tr>
                         <th>Name</th>
                         <th>Mobile</th>
                         <th>Phone</th>
                         <th>Email</th>
                         <th data-orderable="false">Action</th>
                     </tr>
                     </thead>
                     <tbody>
                     <?php foreach($guardians as $guardian){ ?>
                         <tr>
                             <td>
                                 <p><?php echo $guardian['surname'].', '.$guardian['first_name'].'('.$guardian['guardian_id'].')' ?></p>
                             </td>
                             <td><?php echo $guardian['mobile_phone']; ?></td>
                             <td><?php echo $guardian['phone']; ?></td>
                             <td><?php echo $guardian['email']; ?></td>
                             <td>
                                 <a href="javascript:void(0)"
                                    data-guardian-id = "<?php echo $guardian['guardian_id']; ?>"
                                    data-student-id = "<?php echo $student_id ?>"
                                    data-href = "<?php echo site_url('students/unassign_guardian/'); ?>"
                                    class="<?php echo $guardian['student_id']>0?"btn btn-danger btn-xs unassign-guardian":"btn btn-primary btn-xs assign-guardian" ?>"><i class="fa fa-user-plus"></i>
                                    <?php echo $guardian['student_id']>0?"Unassigned":"Assign Guardian" ?></a>
                             </td>
                         </tr>
                     <?php } ?>
                     </tbody>
                 </table>
             </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>


 <!-----------------modal guardian-------------------->
 <div class="container">
     <!-- Modal -->
     <div class="modal fade" id="myModal" role="dialog">
         <div class="modal-dialog modal-lg">
             <!-- Modal content-->
             <form id="create_guardian_form" method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('students/add_new_guardian') ?>"
                   data-action="<?php echo site_url('students/add_new_guardian') ?>">
                 <input type="hidden" name="student_id" value="<?php echo $student_id ?>">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 class="modal-title">Create New Guardian</h4>
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>
                     <div class="modal-body">
                         <div class="row">
                             <div class="col-md-12">
                                 <h5>Personal Details</h5>
                                 <hr>

                                 <div class="row">
                                     <?php if ($student_fields['title']) { ?>
                                         <div class="col-md-4">
                                             <div class="form-group">
                                                 <label>Title</label>
                                                 <input type="text" class="form-control" maxlength="15" name="title"/>
                                             </div>
                                         </div>
                                     <?php } ?>
                                     <div class="col-md-4">
                                         <div class="form-group">
                                             <label><code>*</code>Surname</label>
                                             <input type="text" class="form-control" maxlength="15" name="surname"
                                                    required/>
                                         </div>
                                     </div>
                                     <div class="col-md-4">
                                         <div class="form-group">
                                             <label><code>*</code>First Name</label>
                                             <input type="text" class="form-control" maxlength="15" name="first_name"
                                                    required/>
                                         </div>
                                     </div>
                                     <div class="col-md-4">
                                         <div class="form-group">
                                             <label>Middle name</label>
                                             <input type="text" class="form-control" maxlength="15" name="middle_name"/>
                                         </div>
                                     </div>
                                     <?php if ($student_fields['mobile_phone']) { ?>
                                         <div class="col-md-4">
                                             <div class="form-group">
                                                 <label>Mobile phone</label>
                                                 <input type="tel" id="guardian_mobile_phone" class="form-control"
                                                        maxlength="15" name="mobile_phone"/>
                                             </div>
                                         </div>
                                     <?php } ?>
                                     <?php if ($student_fields['phone']) { ?>
                                         <div class="col-md-4">
                                             <div class="form-group">
                                                 <label>Phone</label>
                                                 <input type="tel" id="guardian_phone" maxlength="15"
                                                        class="form-control" name="phone"/>
                                             </div>
                                         </div>
                                     <?php } ?>
                                     <?php if ($student_fields['email']) { ?>
                                         <div class="col-md-4">
                                             <label>Email</label>
                                             <div class="input-group mb-3">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                                 </div>
                                                 <input type="email" class="form-control" maxlength="30" name="email"/>
                                             </div>
                                         </div>
                                     <?php } ?>
                                     <?php if ($student_fields['gender']) { ?>
                                         <div class="col-md-4">
                                             <div class="form-group">
                                                 <label>Gender</label>
                                                 <select class="form-control" name="gender">
                                                     <option value="">Please select</option>
                                                     <option value="male">Male</option>
                                                     <option value="female">Female</option>
                                                 </select>
                                             </div>
                                         </div>
                                     <?php } ?>
                                     <?php if ($student_fields['photo']) { ?>
                                         <div class="col-md-4">
                                             <div class="form-group">
                                                 <label for="exampleInputFile">Photo</label>
                                                 <div class="input-group">
                                                     <div class="custom-file">
                                                         <input type="file" class="custom-file-input" name="photo" id="exampleInputFile">
                                                         <label class="custom-file-label" for="exampleInputFile">Choose
                                                             file</label>
                                                     </div>
                                                     <div class="input-group-append">
                                                         <span class="input-group-text" id="">Upload</span>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     <?php } ?>
                                 </div>
                                 <h5>Wards</h5>
                                 <hr>
                                 <div class="row">
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label>Relationship with student</label>
                                             <input type="text" class="form-control" name="relation_with_student" maxlength="20"/>
                                         </div>

                                     </div>
                                     <div class="col-md-3">
                                         <div class="form-group">
                                             <label for="emergency_contact" class="col-form-label">Emergency contact?</label>
                                             <input type="checkbox" value="1" name="emergency_contact" class="form-control validate" >

                                         </div>

                                     </div>
                                     <div class="col-md-3">
                                         <div class="form-group">
                                             <label for="is_authorized" class="col-form-label">Authorized to pick up?</label>
                                             <input type="checkbox" value="1"  name="is_authorized" class="form-control validate" >

                                         </div>
                                     </div>
                                 </div>
                                 <?php if ($student_fields['address']) { ?>
                                     <h5>Contact Address</h5>
                                     <hr>
                                     <div class="row">
                                         <div class="col-md-4">
                                             <div class="form-group">
                                                 <label>Country</label>
                                                 <select class="form-control" name="country" id="nationality">
                                                     <option value="">Please Select</option>
                                                     <?php foreach ($countries as $country) { ?>
                                                         <option value="<?php echo $country['id'] ?>"><?php echo $country['country_name'] ?></option>
                                                     <?php } ?>
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="col-md-4">
                                             <div class="form-group">
                                                 <label>State</label>
                                                 <select class="form-control" name="state" id="country_states">
                                                     <option value="">Please Select</option>
                                                     <?php foreach ($states as $state): ?>
                                                         <option value="<?php echo $state['id']; ?>"><?php echo $state['name']; ?></option>
                                                     <?php  endforeach; ?>
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="col-md-4">
                                             <div class="form-group">
                                                 <label>City</label>
                                                 <input type="text" class="form-control" maxlength="20" name="city"/>
                                             </div>
                                         </div>
                                         <div class="col-md-4">
                                             <div class="form-group">
                                                 <label>Address line</label>
                                                 <textarea class="form-control" maxlength="70" rows="3"
                                                           name="address_line"></textarea>
                                             </div>
                                         </div>
                                         <div class="col-md-4">
                                             <div class="form-group">
                                                 <label>L.G.A</label>
                                                 <select class="form-control" name="lga" id="lga_of_origin">
                                                     <option value="">Please Select</option>
                                                 </select>
                                             </div>
                                         </div>
                                     </div>
                                 <?php } ?>

                             </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         <button type="submit" id="save_student_guardians" class="btn btn-primary" id="save-guardian">Save</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <div class="modal fade" id="assign_guardian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header text-center">
                 <h4 class="modal-title w-100 font-weight-bold">Assign Guardian</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="row">
                 <div class="col-md-12">
                     <div id="assign_guardian_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                     </div>
                     <div id="assign_guardian_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                     </div>
                 </div>
             </div>
             <form id="assign_guardian_form" method="post" role="form"
                   data-action="<?php echo site_url('students/assign_guardian') ?>" enctype="multipart/form-data">
                 <input type="hidden" name="student_id" id="student_id">
                 <input type="hidden" name="guardian_id" id="guardian_id">
                 <div class="modal-body mx-3">
                     <div class="form-group">
                         <label for="category_name" class="col-form-label">Relation</label>
                         <input type="text" id="relation" name="relation" class="form-control validate">

                     </div>
                     <div class="form-group">
                         <label for="emergency_contact" class="col-form-label">Emergency contact?</label>
                         <input type="checkbox" value="1" id="emergency_contact" name="emergency_contact" class="form-control validate" >

                     </div>
                     <div class="form-group">
                         <label for="is_authorized" class="col-form-label">Authorized to pick up?</label>
                         <input type="checkbox" value="1" id="is_authorized" name="is_authorized" class="form-control validate" >

                     </div>
                     <div class="modal-footer d-flex justify-content-center">
                         <button id="assign_student_guardian" type="submit" class="btn btn-default">Save Assessment Category</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <script>
     $(document).ready(function() {
         $('.select2').select2();
         $('#guardian_table').DataTable();
     } );
     $("#nationality").change(function () {
         var country = $('#nationality').val();
         $.ajax({
             url: '/isms/students/get_state/'+country,
             cache: false,
             success: function(response) {
                 if (response.success) {
                     $('#country_states').empty();
                     $('#country_states').append(response.states_html);
                 } else {
                     toastr["warning"](response.message);
                 }
             }
         });
     });

     $("#country_states").change(function () {
         var state = $('#country_states').val();
         $.ajax({
             url: '/isms/students/get_origin/'+state,
             cache: false,
             success: function(response) {
                 console.log(response);
                 if (response.success) {
                     $('#lga_of_origin').empty();
                     $('#lga_of_origin').append(response.origin_html);
                 } else {
                     toastr["warning"](response.message);
                 }
             }
         });
     });
 </script>