<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Employee Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">employee</a></li>
                        <li class="breadcrumb-item active">employee name</li>
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
                <div class="col-md-12">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center mb-3">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="<?php echo base_url(); ?>assets/dist/img/avatar.png"
                                     alt="User profile picture">
                            </div>
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <h3 class="profile-username text-center mb-3"><?php echo $Emp_profile['middle_name'] . ', ' . $Emp_profile['first_name']; ?></h3>
                                    <!--  <p class="text-muted text-center">Software Engineer</p> -->
                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <b>Employee No: </b> <a
                                                class="float-right"><?php echo $Emp_profile['employee_no']; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Department:</b> <a
                                                class="float-right"><?php echo $Emp_profile['dept_name']; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Position</b> <a
                                                class="float-right"><?php echo $Emp_profile['position_name']; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Category</b> <a
                                                class="float-right"><?php echo $Emp_profile['cat_name']; ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#overview" data-toggle="tab">Overview</a>
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                                        href="<?php echo site_url('employee/edit/') . $Emp_profile['employee_id'] ?>">Edit</a>
                                </li>
                                <li class="nav-item"><a class="nav-link " href="#timeline"
                                                        data-toggle="tab">Privileges</a></li>
                                <li class="nav-item"><a class="nav-link" style="cursor: pointer;" data-toggle="modal"
                                                        data-target="#myModal">Change Password</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Remove</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="overview">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3 class="profile-username profile-badge mb-4"><i class="fa fa-user"></i>Profile
                                            </h3>
                                            <!--  <p class="text-muted text-center">Software Engineer</p> -->
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Title</b> <a
                                                        class="float-right"><?php echo $Emp_profile['title']; ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Last Name:</b> <a
                                                        class="float-right"><?php echo $Emp_profile['middle_name']; ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>First Name:</b> <a
                                                        class="float-right"><?php echo $Emp_profile['first_name']; ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Status:</b> <a
                                                        class="float-right"><?php echo $Emp_profile['status'] == 1 ? 'Active' : 'Inactive'; ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Date of birth:</b> <a
                                                        class="float-right"><?php echo $Emp_profile['date_of_birth']; ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Gender:</b> <a
                                                        class="float-right"><?php echo $Emp_profile['gender'] == 'male' ? 'Male' : 'Female'; ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Blood Group:</b> <a
                                                        class="float-right"><?php echo $Emp_profile['blood_group']; ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Nationality:</b> <a
                                                        class="float-right"><?php echo $Emp_profile['nationality']; ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Date Joined:</b> <a
                                                        class="float-right"><?php echo $Emp_profile['date_of_join']; ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Religion:</b> <a
                                                        class="float-right"><?php echo $Emp_profile['religion']; ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Department:</b> <a
                                                        class="float-right"><?php echo $Emp_profile['dept_name']; ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Position:</b> <a
                                                        class="float-right"><?php echo $Emp_profile['position_name']; ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Category: </b> <a
                                                        class="float-right"><?php echo $Emp_profile['cat_name']; ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="profile-contacts">
                                                <div class="profile-b1">
                                                    <h3 class="profile-username profile-badge"><i
                                                            class="fa fa-phone orange"></i>Contacts Info</h3>
                                                    <div class="contact-info">
                                                        <ul class="list-group list-group-unbordered mb-3">
                                                            <li class="list-group-item">
                                                                <b>Phone :</b> <a
                                                                    class="float-right"><?php echo $Emp_profile['phone']; ?></a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Mobile No:</b> <a
                                                                    class="float-right"><?php echo $Emp_profile['mobile_phone']; ?></a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Email:</b> <a
                                                                    class="float-right"><?php echo $Emp_profile['email']; ?></a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Address:</b> <a
                                                                    class="float-right"><?php echo $Emp_profile['address_line']; ?></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profile-contacts">
                                                <div class="profile-b1">
                                                    <h3 class="profile-username profile-badge"><i
                                                            class="fa fa-user orange"></i>Next of kin</h3>
                                                    <div class="contact-info">
                                                        <ul class="list-group list-group-unbordered mb-3">
                                                            <li class="list-group-item">
                                                                <b>Next of kin Name:</b> <a
                                                                    class="float-right"><?php echo $Emp_profile['next_of_kin_name']; ?></a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Relationship with next of kin:</b> <a
                                                                    class="float-right"><?php echo $Emp_profile['next_of_kin_relation']; ?></a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Next of kin mobile:</b> <a
                                                                    class="float-right"><?php echo $Emp_profile['next_of_kin_mobile']; ?></a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Next of kin phone:</b> <a
                                                                    class="float-right"><?php echo $Emp_profile['next_of_kin_phone']; ?></a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Next of kin address:</b> <a
                                                                    class="float-right"><?php echo $Emp_profile['next_of_kin_address_line']; ?></a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profile-contacts">
                                                <div class="profile-b1">
                                                    <h3 class="profile-username profile-badge"><i
                                                            class="fa fa-bank orange"></i>Bank Account</h3>
                                                    <div class="contact-info">
                                                        <ul class="list-group list-group-unbordered mb-3">
                                                            <li class="list-group-item">
                                                                <b>Bank:</b> <a
                                                                    class="float-right"><?php echo $Emp_profile['bankname']; ?></a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Account Name:</b> <a
                                                                    class="float-right"><?php echo $Emp_profile['account_name']; ?></a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Account Number:</b> <a
                                                                    class="float-right"><?php echo $Emp_profile['account_number']; ?></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="edit">
                                    <div class="row">
                                        <div class="col-md-12">

                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="timeline">
                                    <h3 class="heading mb-4">Privileges for <?php echo $Emp_profile['middle_name'] . ', ' . $Emp_profile['first_name']; ?></h3>
                                    <form id="employee_form" method="post" role="form" action="<?php echo isset($form_action) ? $form_action : site_url('employee/update_priviliges') ?>"
                                          data-action="<?php echo isset($form_action) ? $form_action : site_url('employee/add_new_employee') ?>" enctype="multipart/form-data">
                                        <input type="hidden" name="employee_id" value="<?php echo $Emp_profile['employee_id']; ?>">
                                        <input type="hidden" name="admin[]" value="<?php echo $default_menu_list.','; ?>">
                                        <input type="hidden" name="menu_group_id" value="<?php echo $Emp_profile['menu_group_id']; ?>">
                                        <input type="hidden" name="employee_name" value="<?php echo $Emp_profile['first_name'].' '.$Emp_profile['middle_name']; ?>">
                                        <input type="hidden" name="login_rights_group_id" value="<?php echo $Emp_profile['login_rights_group_id']; ?>">
                                        <input type="hidden" name="other_rights_group_id" value="<?php echo $Emp_profile['other_rights_group_id']; ?>">
                                        <div class="row">
                                            <div class="col-md-4">
                                               <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <strong>Administration / Operations</strong>
                                                        <div class="material-switch pull-right">
<!--                                                                <input id="id1" name="admin_ops" value="" type="checkbox"/>-->
<!--                                                                <label for="id1" class="label-default"></label>-->
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        HR Control
                                                        <div class="material-switch pull-right">
                                                            <input id="id2" name="admin[]" value="<?php echo $hr_control_menu; ?>" type="checkbox" <?php echo in_array("6", $menu_detail)?'checked':''; ?>/>
                                                            <label for="id2" class="label-primary"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Employee View
                                                        <div class="material-switch pull-right">
                                                            <input id="id3" name="admin[]" value="<?php echo $emp_view_menu; ?>" type="checkbox" <?php echo in_array("5", $menu_detail)&&!in_array("6", $menu_detail)?'checked':''; ?>/>
                                                            <label for="id3" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Gradebook Control
                                                        <div class="material-switch pull-right">
                                                            <input id="id4" name="admin[]" value="<?php echo $grade_book_menu; ?>" type="checkbox" <?php echo in_array("44", $menu_detail)?'checked':''; ?>/>
                                                            <label for="id4" class="label-info"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Finance Control
                                                        <div class="material-switch pull-right">
                                                            <input id="id5" name="admin[]" value="<?php echo $finance_control_menu; ?>" type="checkbox" <?php echo in_array("17", $menu_detail)?'checked':''; ?>/>
                                                            <label for="id5" class="label-warning"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Finance
                                                        <div class="material-switch pull-right">
                                                            <input id="id6" name="admin[]" value="<?php echo $finance_menu; ?>" type="checkbox" <?php echo in_array("12", $menu_detail)&&!in_array("17", $menu_detail)?'checked':''; ?>/>
                                                            <label for="id6" class="label-danger"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Event Management
                                                        <div class="material-switch pull-right">
                                                            <input id="id7" name="admin[]"  value="<?php echo $event_management; ?>" type="checkbox" <?php echo in_array("24", $menu_detail)?'checked':''; ?>/>
                                                            <label for="id7" class="label-default"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Subject Master
                                                        <div class="material-switch pull-right">
                                                            <input id="id8" name="admin[]" value="<?php echo $subject_master_menu; ?>" type="checkbox" <?php echo in_array("30", $menu_detail)?'checked':''; ?>/>
                                                            <label for="id8" class="label-primary"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Batch Control
                                                        <div class="material-switch pull-right">
                                                            <input id="id9" name="batch_control" value="<?php echo $batch_control_menu; ?>" type="checkbox" <?php echo $Emp_profile['org_status']!=0?'checked':''; ?>/>
                                                            <label for="id9" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Sms Management
                                                        <div class="material-switch pull-right">
                                                            <input id="id21" name="admin[]" value="<?php echo $sms_management_menu; ?>" type="checkbox" <?php echo in_array("21", $menu_detail)?'checked':''; ?>/>
                                                            <label for="id21" class="label-info"></label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4">
                                                <!-- List group -->
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <strong>Student Management</strong>
                                                        <div class="material-switch pull-right">
<!--                                                            <input id="id11" name="id11" type="checkbox"/>-->
<!--                                                            <label for="id11" class="label-warning"></label>-->
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Admission
                                                        <div class="material-switch pull-right">
                                                            <input id="id10" name="student[]" type="checkbox"
                                                                   value="<?php echo $admission; ?>" type="checkbox" <?php echo in_array("3", $menu_detail)&&!in_array("10", $menu_detail)?'checked':''; ?>/>
                                                            <label for="id10" class="label-danger"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Student Control
                                                        <div class="material-switch pull-right">
                                                            <input id="id11" name="student[]" type="checkbox"
                                                                   value="<?php echo $student_control; ?>" type="checkbox" <?php echo in_array("7", $menu_detail)?'checked':''; ?>/>
                                                            <label for="id11" class="label-warning"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Student View
                                                        <div class="material-switch pull-right">
                                                            <input id="id13" name="student[]" type="checkbox"
                                                                   value="<?php echo $student_view; ?>" type="checkbox" <?php echo in_array("2", $menu_detail)&&!in_array("7", $menu_detail)?'checked':''; ?>/>
                                                            <label for="id13" class="label-warning"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Student Attendance Register
                                                        <div class="material-switch pull-right">
                                                            <input id="id14" name="student[]" type="checkbox"
                                                                   value="<?php echo $student_attendance_register; ?>" type="checkbox" <?php echo in_array("10", $menu_detail)&&!in_array("7", $menu_detail)?'checked':''; ?>/>
                                                            <label for="id14" class="label-danger"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Student Attendance View
                                                        <div class="material-switch pull-right">
                                                            <input id="id15" name="student[]" type="checkbox"
                                                                   value="<?php echo $student_attendance_view; ?>" type="checkbox" <?php echo in_array("9", $menu_detail)&&!in_array("7", $menu_detail)?'checked':''; ?>/>
                                                            <label for="id15" class="label-danger"></label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4">
                                                <!-- List group -->
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <strong>Academics</strong>
                                                        <div class="material-switch pull-right">
<!--                                                            <input id="id13" name="id13" type="checkbox"/>-->
<!--                                                            <label for="id13" class="label-default"></label>-->
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Reports Control
                                                        <div class="material-switch pull-right">
                                                            <input id="id16" name="id16" type="checkbox"/>
                                                            <label for="id16" class="label-primary"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        View Reports
                                                        <div class="material-switch pull-right">
                                                            <input id="id17" name="id17" type="checkbox"/>
                                                            <label for="id17" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Enter Score
                                                        <div class="material-switch pull-right">
                                                            <input id="id18" name="id18" type="checkbox"/>
                                                            <label for="id18" class="label-info"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        View Score
                                                        <div class="material-switch pull-right">
                                                            <input id="id19" name="id19" type="checkbox"/>
                                                            <label for="id19" class="label-warning"></label>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <ul class="list-group mt-3">
                                                    <li class="list-group-item">
                                                        System Settings
                                                        <div class="material-switch pull-right">
                                                            <input id="id20" name="id20" type="checkbox"/>
                                                            <label for="id20" class="label-info"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        General Settings
                                                        <div class="material-switch pull-right">
                                                            <input id="id22" name="id22" type="checkbox"/>
                                                            <label for="id22" class="label-warning"></label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-footer" style="text-align: center">
                                            <button id="save_emp_priviliges" type="submit" class="btn btn-primary btn-lg">Update Priviliges</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="settings">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="well bordered-top bordered-bottom bordered-warning">
                                                <h4><i class="fa fa-exclamation-circle warning"></i> Employee Leaving
                                                    Institution
                                                </h4>
                                                <p>
                                                    For employee leaving the Institution, use this option to remove them from the list of active
                                                    employee and place them in the former employees list.
                                                </p>
                                                <form class="form-horizontal" role="form" id="student_archive_form"
                                                      data-action="<?php echo site_url('employee/archive_employee') ?>"
                                                      accept-charset="UTF-8" method="post">
                                                    <input type="hidden" name="employee_id" value="<?php echo $Emp_profile['employee_id']; ?>">
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
                                                            <strong>Warning</strong> Be sure to select the last date employee
                                                            is assumed to have been an active employee of this Institution. Selected date has effects
                                                            across the application and can not be edited or reversed.
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
                                                <h4><i class="fa fa-exclamation-circle danger"></i> Delete Employee</h4>
                                                <p>
                                                    Completely delete employee's records from the Institution's databases. Use this option only
                                                    if you created the employee record by accident and want to remove it completely.
                                                </p>
                                                <div id="guardian-destroy-form-errors"></div>
                                                <div class="alert alert-warning">
                                                    <i class="fa-fw fa fa-warning"></i>
                                                    <strong>Warning</strong>
                                                    All records associated with employee will be deleted and cannot be recovered.
                                                </div>
                                                <a class="btn btn-danger delete-employee" href="javascript:void(0)"
                                                   data-href="<?php echo site_url('employee/delete_user/') . $Emp_profile['employee_id']; ?>">
                                                    <i class="fa fa-trash-o"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                </form>
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
        </div><!-- /.container-fluid -->
        <!-- Modal -->

    </section>
    <!-- /.content -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit
                        password: <?php echo $Emp_profile['first_name'] . " " . $Emp_profile['middle_name'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="change_pwd" method="post" role="form"
                          data-action="<?php echo site_url('employee/change_pwd') ?>"
                          enctype="multipart/form-data">
                        <input type="hidden" name="employee_id" value="<?php echo $Emp_profile['employee_id']; ?>">
                        <input type="hidden" name="email" value="<?php echo $Emp_profile['email']; ?>">
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

    <script>
        $(document).ready(function () {
            <?php if (!empty($this->session->flashdata('errors'))) { ?>
                toastr["warning"]('<?php echo $this->session->flashdata('errors'); ?>');
            <?php }elseif(!empty($this->session->flashdata('success'))){ ?>
                toastr["success"]('<?php echo $this->session->flashdata('success'); ?>');
            <?php } ?>
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

        $(document.body).on('click', '.delete-employee', function () {
            if (confirm('Are you sure to delete this record?')) {
                $.ajax({
                    url: $(this).attr('data-href'),
                    cache: false,
                    success: function (response) {
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