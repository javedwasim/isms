<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Guardian Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">guardians</a></li>
                        <li class="breadcrumb-item active">guardian name</li>
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
                            <h3 class="profile-username text-center mb-3">Alh, Nura Muhammad</h3>
                            <!--  <p class="text-muted text-center">Software Engineer</p> -->
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Guardian Id</b> <a class="float-right">1322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Status</b> <a
                                            class="float-right"><?php echo isset($guardian['status']) && ($guardian['status'] == 1) ? 'Active' : 'Left'; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Mobile Phone:</b> <a
                                            class="float-right"><?php echo isset($guardian['mobile_phone']) ? $guardian['mobile_phone'] : ''; ?></a>
                                </li>
                            </ul>
                            <!--  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
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
                                <div class="col-md-6">
                                    <h3 class="profile-username profile-badge mb-4"><i class="fa fa-user"></i>Profile
                                    </h3>
                                    <!--  <p class="text-muted text-center">Software Engineer</p> -->
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Title</b> <a
                                                    class="float-right"><?php echo isset($guardian['title']) ? $guardian['title'] : ''; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Last Name:</b> <a
                                                    class="float-right"><?php echo isset($guardian['middle_name']) ? $guardian['middle_name'] : ''; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>First Name:</b> <a
                                                    class="float-right"><?php echo isset($guardian['first_name']) ? $guardian['first_name'] : ''; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Gender:</b> <a
                                                    class="float-right"><?php echo isset($guardian['gender']) ? $guardian['gender'] : ''; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Activated at:</b> <a
                                                    class="float-right"><?php echo isset($guardian['created']) ? $guardian['created'] : ''; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Mobile Phone:</b> <a
                                                    class="float-right"><?php echo isset($guardian['mobile_phone']) ? $guardian['mobile_phone'] : ''; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>SMS enabled?:</b> <a class="float-right">Yes</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <div class="profile-contacts">
                                        <div class="profile-b1">
                                            <h3 class="profile-username profile-badge"><i
                                                        class="fa fa-phone orange"></i>Contacts</h3>
                                            <div class="contact-info">
                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item">
                                                        <b>Phone :</b> <a
                                                                class="float-right"><?php echo isset($guardian['phone']) ? $guardian['phone'] : ''; ?></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Mobile No:</b> <a
                                                                class="float-right"><?php echo isset($guardian['mobile_phone']) ? $guardian['mobile_phone'] : ''; ?></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Email:</b> <a
                                                                class="float-right"><?php echo isset($guardian['email']) ? $guardian['email'] : ''; ?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="">
                                            <h3 class="profile-username profile-badge"><i
                                                        class="fa fa-map-marker azure"></i></h3>
                                        </div>
                                        <div class="contact-info">
                                            <p>
                                                <?php echo isset($guardian['address_line']) ? $guardian['address_line'] : ''; ?>
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
                                <li class="nav-item"><a class="nav-link active" href="#activity"
                                                        data-toggle="tab">Wards</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Edit</a>
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
                                                <table id="guardian-ward" class="display table table-striped"
                                                       style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Admission No</th>
                                                        <th>Status</th>
                                                        <th>Batch</th>
                                                        <th>Admission Date</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($wards as $ward): ?>
                                                    <tr>
                                                        <td><?php echo $ward['surname'] . ', ' . $ward['first_name'] ?></td>
                                                        <td><?php echo $ward['admission_no'];?></td>
                                                        <td><?php echo $ward['status']==1?'Active':'';?></td>
                                                        <td><?php echo $ward['code'] . '-' . $ward['arm'] . '(' . $ward['session'] . ')' ?></td>
                                                        <td><?php echo date('F d, Y', strtotime($ward['admission_date'])) ?></td>
                                                        <td>
                                                            <a class="btn btn-xs btn-info" target="_blank"
                                                               href="<?php echo site_url('students/student_profile/').$ward['student_id'] ?>">
                                                                <i class="fa fa-user"></i> View Profile
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
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
                                            <form id="update_guardian_form" method="post" role="form" action="<?php echo site_url('guardians/update_guardian/').$guardian['guardian_id'] ?>"
                                                  data-action="<?php echo site_url('guardians/update_guardian/').$guardian['guardian_id'] ?>"
                                                  enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input type="text" class="form-control" name="title"
                                                                   value="<?php echo isset($guardian['title']) ? $guardian['title'] : ''; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Surname</label>
                                                            <input type="text" class="form-control" name="surname"
                                                                   value="<?php echo isset($guardian['surname']) ? $guardian['surname'] : ''; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>First name</label>
                                                            <input type="text" class="form-control"  name="first_name"
                                                                   value="<?php echo isset($guardian['first_name']) ? $guardian['first_name'] : ''; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Last name</label>
                                                            <input type="text" class="form-control"  name="last_name"
                                                                   value="<?php echo isset($guardian['last_name']) ? $guardian['last_name'] : ''; ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Middle name</label>
                                                            <input type="text" class="form-control"  name="middle_name"
                                                                   value="<?php echo isset($guardian['middle_name']) ? $guardian['middle_name'] : ''; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Mobile phone</label>
                                                            <input type="text" class="form-control"  name="mobile_phone"
                                                                   value="<?php echo isset($guardian['mobile_phone']) ? $guardian['mobile_phone'] : ''; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Phone</label>
                                                            <input type="text" class="form-control"  name="phone"
                                                                   value="<?php echo isset($guardian['phone']) ? $guardian['phone'] : ''; ?>"/>
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
                                                            <input type="text" class="form-control"  name="email"
                                                                   value="<?php echo isset($guardian['email']) ? $guardian['email'] : ''; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Gender</label>
                                                            <select class="form-control" name="gender">
                                                                <option value="">Please select</option>
                                                                <option value="male"<?php echo isset($guardian['gender']) &&($guardian['gender']=='male') ? 'selected' : ''; ?>>Male</option>
                                                                <option value="female"<?php echo isset($guardian['gender']) &&($guardian['gender']=='female') ? 'selected' : ''; ?>>Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">File input</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" name="photo" class="custom-file-input"
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
                                                    <div class="row">
                                                        <?php foreach($wards as $ward): ?>
                                                            <div class="col-sm">
                                                                <label>Relationship with <?php echo $ward['first_name']." ".$ward['last_name']; ?></label>
                                                                <input type="hidden" name="relation[]" id="<?php echo $ward['id']; ?>" value="">
                                                                <input type="text" class="form-control relation"  data-relation-id="<?php echo $ward['id']; ?>"
                                                                       value="<?php echo isset($ward['relation']) ? $ward['relation'] : ''; ?>"/>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                                <h5>Contact Address</h5>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Country</label>
                                                            <select class="form-control" id="nationality" name="country">
                                                                <option>Select Nationality</option>
                                                                <?php foreach ($countries as $country) { ?>
                                                                    <option value="<?php echo $country['id'] ?>"
                                                                        <?php echo isset($guardian['country']) &&($guardian['country']==$country['id']) ? 'selected' : ''; ?>><?php echo $country['country_name'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>State</label>
                                                            <select class="form-control" id="country_states" name="state">
                                                                <option value="">Please Select</option>
                                                                <?php foreach ($states as $state): ?>
                                                                    <option value="<?php echo $state['id']; ?>"
                                                                        <?php echo isset($guardian['state']) &&($guardian['state']==$state['id']) ? 'selected' : ''; ?>><?php echo $state['name']; ?></option>
                                                                <?php  endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>City</label>
                                                            <input type="text" class="form-control" name="city"
                                                                   value="<?php echo isset($guardian['city']) ? $guardian['city'] : ''; ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Address line</label>
                                                            <textarea class="form-control" rows="3" name="address_line"><?php echo isset($guardian['address_line']) ? $guardian['address_line'] : ''; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>L.G.A</label>
                                                            <select class="form-control" id="lga_of_origin" name="lga">
                                                                <option value="">Please Select</option>
                                                                <?php foreach ($origins as $origin): ?>
                                                                    <option value="<?php echo $origin['id']; ?>"
                                                                        <?php echo isset($guardian['lga']) &&($guardian['lga']==$origin['id']) ? 'selected' : ''; ?>><?php echo $origin['name']; ?></option>
                                                                <?php  endforeach; ?>
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
                                    <div class="col-md-6">
                                        <div class="well bordered-top bordered-bottom bordered-danger">
                                            <h4><i class="fa fa-exclamation-circle danger"></i> Delete Guardian</h4>
                                            <p>
                                                Completely delete guardian's records from the Institution's databases.
                                                Use this option
                                                only if you created the guardian record by accident and want to remove
                                                it completely.
                                            </p>
                                            <div id="guardian-destroy-form-errors"></div>
                                            <div class="alert alert-warning">
                                                <i class="fa-fw fa fa-warning"></i>
                                                <strong>Warning</strong> All records associated with guardian will be
                                                deleted and
                                                cannot be recovered.
                                            </div>
                                            <a data-confirm-title="Delete Guardian"
                                               data-confirm="Are you absolutely sure?"
                                               data-disable-with="<i class=&quot;fa fa-spinner fa-spin&quot;></i> Please wait..."
                                               class="btn btn-danger delete delete-guardian" data-remote="true" rel="nofollow"
                                               data-href="<?php echo site_url('guardians/delete_user/').$guardian['guardian_id']; ?>"
                                               data-method="delete" href="javascript:void(0)">
                                               <i class="fa fa-trash-o"></i> Delete
                                            </a></div>
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

    </section>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit
                        password: <?php echo $guardian['first_name'] . " " . $guardian['middle_name'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="change_pwd" method="post" role="form"
                          data-action="<?php echo site_url('guardians/change_pwd') ?>"
                          enctype="multipart/form-data">
                        <input type="hidden" name="student_id" value="<?php echo $guardian['guardian_id']; ?>">
                        <input type="hidden" name="email" value="<?php echo $guardian['email']; ?>">
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
    <!-- /.content -->
    <script>
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

        $(document.body).on('click', '.delete-guardian', function(){
            if (confirm('Are you sure to delete this record?')) {
                $.ajax({
                    url: $(this).attr('data-href'),
                    cache: false,
                    success: function(response) {
                        $('#student_error').hide();
                        $('#student_success').hide();
                        if (response.success) {
                            $('.content-wrapper').remove();
                            $('#content-wrapper').append(response.guardian_html);
                            toastr["success"](response.message);
                        } else {
                            toastr["error"](response.message);
                        }
                    }
                });
            } else {
                return false;
            }

            return false;
        });
        $('.relation').change(function () {
            var relation_value = this.value;
            var relation_id = $(this).attr('data-relation-id');
            var relation_value = relation_id+'_'+relation_value;
            $('#'+relation_id).val(relation_value);
        });

    </script>