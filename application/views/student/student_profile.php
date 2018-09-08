<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Student Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">students</a></li>
                        <li class="breadcrumb-item active"><?php echo isset($student['first_name']) && (!empty($student['first_name'])) ? $student['first_name'] . ', ' . $student['last_name'] : "" ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center mb-3">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="<?php echo base_url(); ?>assets/dist/img/avatar.png"
                                     alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center mb-3"><?php echo isset($student['first_name']) && (!empty($student['first_name'])) ? $student['first_name'] . ', ' . $student['last_name'] : "" ?></h3>
                            <!--  <p class="text-muted text-center">Software Engineer</p> -->
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Admission No</b> <a
                                            class="float-right"><?php echo isset($student['admission_no']) && (!empty($student['admission_no'])) ? $student['admission_no'] : "" ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Batch No</b> <a
                                            class="float-right"><?php echo isset($student['batch_no']) && (!empty($student['batch_no'])) ? $student['batch_no'] : "" ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Status</b> <a class="float-right">Registering</a>
                                </li>
                            </ul>
                            <div class="row">
                                <div class="col-md-4 text-center border-right">
                    <span class="">
                      <i class="fa fa-venus mt-2" style="font-size: 24px;"></i>
                    </span>
                                </div>
                                <div class="col-md-4 text-center border-right">
                    <span class="mt-3">
                      <p>Due Fees</p>
                      <p>0.00</p>
                    </span>
                                </div>
                                <div class="col-md-4 text-center mb-3">
                    <span class="mt-3">
                      <p>Age</p>
                      <p>10</p>
                    </span>
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary btn-block"><i class="fa fa-print"></i><b>Print</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            Overview
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <h3 class="profile-username profile-badge mb-4 text-center"><i class="fa fa-user"></i>Profile
                                </h3>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>First Name</b> <a
                                                    class="float-right"><?php echo isset($student['first_name']) && (!empty($student['first_name'])) ? $student['first_name'] : "" ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Middle Name</b> <a
                                                    class="float-right"><?php echo isset($student['last_name']) && (!empty($student['last_name'])) ? $student['last_name'] : "" ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Last Name:</b> <a
                                                    class="float-right"><?php echo isset($student['surname']) && (!empty($student['surname'])) ? $student['surname'] : "" ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Date of Birth:</b> <a
                                                    class="float-right"><?php echo isset($student['date_of_birth']) && (!empty($student['date_of_birth'])) ? date('F d, Y', strtotime($student['date_of_birth'])) : "" ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Gender:</b> <a
                                                    class="float-right"><?php echo isset($student['gender']) && (!empty($student['gender'])) ? $student['gender'] : "" ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Blood Group:</b> <a
                                                    class="float-right"><?php echo isset($student['blood_group']) && (!empty($student['blood_group'])) ? $student['blood_group'] : "" ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Genotype:</b> <a
                                                    class="float-right"><?php echo isset($student['genotype']) && (!empty($student['genotype'])) ? $student['genotype'] : "" ?></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-unbordered mb-3">

                                        <li class="list-group-item">
                                            <b>Admission Date:</b> <a
                                                    class="float-right"><?php echo isset($student['admission_date']) && (!empty($student['admission_date'])) ? date('F d, Y', strtotime($student['admission_date'])) : "" ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Student Categories:</b> <a
                                                    class="float-right"><?php echo isset($student['student_category']) && (!empty($student['student_category'])) ? $student['student_category'] : "" ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Nationality:</b> <a
                                                    class="float-right"><?php echo isset($student['nationality']) && (!empty($student['nationality'])) ? $student['nationality'] : "" ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>State of origin:</b> <a
                                                    class="float-right"><?php echo isset($student['state_of_origin']) && (!empty($student['state_of_origin'])) ? $student['state_of_origin'] : "" ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>LGA of origin:</b> <a
                                                    class="float-right"><?php echo isset($student['lga_of_origin']) && (!empty($student['lga_of_origin'])) ? $student['lga_of_origin'] : "" ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Religion:</b> <a
                                                    class="float-right"><?php echo isset($student['religion']) && (!empty($student['religion'])) ? $student['religion'] : "" ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Health Info:</b> <a class="float-right"></a>
                                        </li>
                                        <!--  <li class="list-group-item">
                          <b>Mobile Phone:</b> <a class="float-right"><?php echo isset($student['mobile_phone']) && (!empty($student['mobile_phone'])) ? $student['mobile_phone'] : "" ?></a>
                      </li>
                      <li class="list-group-item">
                          <b></b> <a class="float-right">Yes</a>
                      </li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile-b1">
                                        <h3 class="profile-username profile-badge"><i class="fa fa-phone orange"></i>Contacts
                                        </h3>
                                        <div class="contact-info">
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Phone :</b> <a class="float-right"><?php echo $student['phone']; ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Mobile No:</b> <a class="float-right"><?php echo $student['mobile_phone']; ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Email:</b> <a class="float-right"><?php echo $student['email']; ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="profile-contacts">

                                        <div class="">
                                            <h3 class="profile-username profile-badge"><i
                                                        class="fa fa-map-marker azure"></i>Address</h3>
                                        </div>
                                        <div class="contact-info">
                                            <p>
                                                Kano, Kibiya, Kano, Nigeria
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /row 1-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Guardians</a>
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                                        href="<?php echo site_url('students/edit/') . $student['student_id']; ?>"
                                                        data-href="<?php echo site_url('students/edit/') . $student['student_id'] ?>">Edit</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" style="cursor: pointer;" data-toggle="modal"
                                                        data-target="#myModal">Change Password</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Remove</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- /.card-header -->
                                            <div class="card-body p-0">
                                                <?php $this->load->view('student/student_guardian_table'); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>Personal Details</h5>
                                            <hr>
                                            <form>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input type="text" class="form-control" name="emp_surname"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Surname</label>
                                                            <input type="text" class="form-control"
                                                                   name="emp_first_name"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>First name</label>
                                                            <input type="text" class="form-control"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Middle name</label>
                                                            <input type="text" class="form-control" name="emp_surname"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Mobile phone</label>
                                                            <input type="text" class="form-control"
                                                                   name="emp_first_name"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Phone</label>
                                                            <input type="text" class="form-control"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Email</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                            class="fa fa-envelope"></i></span>
                                                            </div>
                                                            <input type="email" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Gender</label>
                                                            <select class="form-control">
                                                                <option value="">Please select</option>
                                                                <option>Male</option>
                                                                <option>Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">File input</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                           id="exampleInputFile">
                                                                    <label class="custom-file-label"
                                                                           for="exampleInputFile">Choose file</label>
                                                                </div>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="">Upload</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5>Wards</h5>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Relationship with student</label>
                                                            <input type="text" class="form-control"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5>Contact Address</h5>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Country</label>
                                                            <select class="form-control">
                                                                <option>Select Nationality</option>
                                                                <?php foreach ($countries as $country) { ?>
                                                                    <option value="<?php echo $country['country_code'] ?>"><?php echo $country['country_name'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>State</label>
                                                            <select class="form-control">
                                                                <option value="">Please Select</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>City</label>
                                                            <input type="text" class="form-control"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Address line</label>
                                                            <textarea class="form-control" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>L.G.A</label>
                                                            <select class="form-control">
                                                                <option value="">Please Select</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" class="btn btn-danger">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="settings">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="well bordered-top bordered-bottom bordered-warning">
                                                <h4><i class="fa fa-exclamation-circle warning"></i> Student Leaving
                                                    Institution
                                                </h4>
                                                <p>
                                                    For students leaving the Institution. Use this option to remove them
                                                    from the list of
                                                    active students and place them in the former students list.
                                                </p>
                                                <form class="form-horizontal" role="form" id="student_archive_form"
                                                      data-action="<?php echo site_url('students/archive_student') ?>"
                                                      accept-charset="UTF-8" method="post">
                                                    <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="control-label"><code>*</code>Last day in batch</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                  <span class="input-group-text">
                                                                      <i class="fa fa-calendar"></i>
                                                                  </span>
                                                                </div>
                                                                <input type="text" name="status_updated_at" class="form-control"
                                                                       id="st-profile-datepicker">
                                                            </div>
                                                        </div>
                                                        <div class="alert alert-warning">
                                                            <i class="fa-fw fa fa-warning"></i>
                                                            <strong>Warning</strong> Be sure to select the last date
                                                            student is assumed to
                                                            have been an active student of this Institution. Selected
                                                            date has effects across
                                                            the application and can not be edited or reversed.
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label "><code>*</code>Reason</label>
                                                        <textarea class="form-control" name="reason"></textarea>
                                                    </div>
                                                    <div class="col-xs-4 col-xs-offset-4">
                                                        <div class="form-group">
                                                            <button name="button" type="submit" class="btn btn-primary" id="archive_btn">
                                                                <i class="fa fa-archive"></i> Move to Archive
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="well bordered-top bordered-bottom bordered-danger">
                                                <h4><i class="fa fa-exclamation-circle danger"></i> Delete Student</h4>
                                                <p>
                                                    Completely delete student's records from the Institution's
                                                    databases. Use this option
                                                    only if you created the guardian record by accident and want to
                                                    remove it completely.
                                                </p>
                                                <div id="guardian-destroy-form-errors"></div>
                                                <div class="alert alert-warning">
                                                    <i class="fa-fw fa fa-warning"></i>
                                                    <strong>Warning</strong> All records associated with student will be
                                                    deleted and
                                                    cannot be recovered.
                                                </div>
                                                <a class="btn btn-danger delete-student" href="javascript:void(0)"
                                                   data-href="<?php echo site_url('students/delete_user/') . $student['student_id'] ?>">
                                                   <i class="fa fa-trash-o"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /row 2-->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit
                            password: <?php echo $student['first_name'] . " " . $student['last_name'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="change_pwd" method="post" role="form"
                              data-action="<?php echo site_url('students/change_pwd') ?>"
                              enctype="multipart/form-data">
                            <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">
                            <input type="hidden" name="email" value="<?php echo $student['email']; ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Current password</label>
                                        <input type="text" class="form-control" name="current_pwd"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="text" class="form-control" name="new_pwd"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password confirmation</label>
                                        <input type="text" class="form-control" name="c_pwd"/>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="change_password" class="btn btn-primary">Save</button>
                                <button type="submit" class="btn btn-default" data-dismiss="modal">
                                    Close
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
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
        $('.datatables').DataTable();
    });

    $(document.body).on('click', '#change_password', function () {
        $.ajax({
            url: $('#change_pwd').attr('data-action'),
            type: 'post',
            data: $('#change_pwd').serialize(),
            cache: false,
            success: function (response) {
                if (response.success) {
                    toastr["success"](response.message);
                    $('#myModal').modal('hide');
                } else {
                    toastr["error"](response.message);
                }

            }
        });
        return false;
    });
    $(document.body).on('click', '#archive_btn', function () {
        $.ajax({
            url: $('#student_archive_form').attr('data-action'),
            type: 'post',
            data: $('#student_archive_form').serialize(),
            cache: false,
            success: function (response) {
                console.log(response);
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }

            }
        });
        return false;
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
</script>