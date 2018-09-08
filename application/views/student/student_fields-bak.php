<?php $this->load->view('parts/header'); ?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?php echo base_url(); ?>" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>
  </ul>

  <!-- SEARCH FORM -->
  <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fa fa-search"></i>
        </button>
      </div>
    </div>
  </form>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fa fa-comments-o"></i>
        <span class="badge badge-danger navbar-badge">3</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="<?php echo base_url(); ?>assets/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Brad Diesel
                <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
              </h3>
              <p class="text-sm">Call me whenever you can...</p>
              <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="<?php echo base_url(); ?>assets/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                John Pierce
                <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
              </h3>
              <p class="text-sm">I got your message bro</p>
              <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="<?php echo base_url(); ?>assets/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Nora Silvester
                <span class="float-right text-sm text-warning"><i class="fa fa-star"></i></span>
              </h3>
              <p class="text-sm">The subject goes here</p>
              <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
      </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fa fa-bell-o"></i>
        <span class="badge badge-warning navbar-badge">15</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fa fa-envelope mr-2"></i> 4 new messages
          <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fa fa-users mr-2"></i> 8 friend requests
          <span class="float-right text-muted text-sm">12 hours</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fa fa-file mr-2"></i> 3 new reports
          <span class="float-right text-muted text-sm">2 days</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
        class="fa fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <?php $this->load->view('parts/sidebar'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
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
            <form role="form" method="post" action="<?php echo site_url('students/add_student_fields') ?>">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Students</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" disabled checked type="checkbox" value="admission_no" name="student_form_fields[]">
                          <label class="form-check-label">Admission No.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" disabled checked type="checkbox" value="admission_date"  name="student_form_fields[]">
                          <label class="form-check-label">Admission Date.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" disabled checked type="checkbox" value="last_name"  name="student_form_fields[]">
                          <label class="form-check-label">Last Name.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" disabled checked type="checkbox" value="first_name"  name="student_form_fields[]">
                          <label class="form-check-label">First Name.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" disabled checked type="checkbox" value="middle_name" name="student_form_fields[]">
                          <label class="form-check-label">Middle Name.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($student_form_fields['photo'] == 1) ? "checked": "" ?> type="checkbox" value="photo" name="student_form_fields[]">
                          <label class="form-check-label">photo.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($student_form_fields['gender'] == 1) ? "checked": "" ?> type="checkbox" value="gender" name="student_form_fields[]">
                          <label class="form-check-label">Gender.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($student_form_fields['date_of_birth'] == 1) ? "checked": "" ?> type="checkbox" value="date_of_birth" name="student_form_fields[]">
                          <label class="form-check-label">Date of birth.</label>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($student_form_fields['email'] == 1) ? "checked": "" ?> type="checkbox" value="email" name="student_form_fields[]">
                          <label class="form-check-label">Email.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($student_form_fields['mobile_phone'] == 1) ? "checked": "" ?> type="checkbox" value="mobile_phone" name="student_form_fields[]">
                          <label class="form-check-label">Mobile Phone.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($student_form_fields['phone'] == 1) ? "checked": "" ?> type="checkbox" value="phone" name="student_form_fields[]">
                          <label class="form-check-label">Phone.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($student_form_fields['address'] == 1) ? "checked": "" ?> type="checkbox" value="address" name="student_form_fields[]">
                          <label class="form-check-label">Address.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($student_form_fields['student_category'] == 1) ? "checked": "" ?> type="checkbox" value="student_category" name="student_form_fields[]">
                          <label class="form-check-label">Student Category.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($student_form_fields['religion'] == 1) ? "checked": "" ?> type="checkbox" value="religion" name="student_form_fields[]">
                          <label class="form-check-label">Relegion.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($student_form_fields['nationality'] == 1) ? "checked": "" ?> type="checkbox" value="nationality" name="student_form_fields[]">
                          <label class="form-check-label">Nationality.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($student_form_fields['state_of_origin'] == 1) ? "checked": "" ?> type="checkbox" value="state_of_origin" name="student_form_fields[]">
                          <label class="form-check-label">State of Origin.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($student_form_fields['lga_of_origin'] == 1) ? "checked": "" ?> type="checkbox" value="lga_of_origin" name="student_form_fields[]">
                          <label class="form-check-label">LGA of Origin.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($student_form_fields['blood_group'] == 1) ? "checked": "" ?> type="checkbox" value="blood_group" name="student_form_fields[]">
                          <label class="form-check-label">Blood Group.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($student_form_fields['genotype'] == 1) ? "checked": "" ?> type="checkbox" value="genotype" name="student_form_fields[]">
                          <label class="form-check-label">Genotype.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($student_form_fields['health_info'] == 1) ? "checked": "" ?> type="checkbox" value="health_info" name="student_form_fields[]">
                          <label class="form-check-label">Health Info.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($student_form_fields['guardian_info_section'] == 1) ? "checked": "" ?> id="guardian_info" type="checkbox" value="guardian_info_section" name="student_form_fields[]">
                          <label class="form-check-label">Guardian Info.</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- /.card-body -->
              </div>

              <div class="card" id="guardian_info_section" <?php if($student_form_fields['guardian_info_section'] == 0) { echo "style='display: none'"; } ?> >
                <div class="card-header">
                  <h3 class="card-title">Guardian Fields</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" name="guardian_info[]" disabled checked type="checkbox" value="last_name">
                          <label class="form-check-label">Last Name.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" name="guardian_info[]" disabled checked type="checkbox" value="first_name">
                          <label class="form-check-label">First Name.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" name="guardian_info[]" disabled checked type="checkbox" value="middle_name">
                          <label class="form-check-label">Middle Name.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($guardian_form_fields['photo'] == 1) ? "checked": "" ?> name="guardian_info[]" type="checkbox" value="photo">
                          <label class="form-check-label">photo.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($guardian_form_fields['title'] == 1) ? "checked": "" ?> name="guardian_info[]" type="checkbox" value="title">
                          <label class="form-check-label">Title.</label>
                        </div>
                      </div>
                    </div>
                    

                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($guardian_form_fields['email'] == 1) ? "checked": "" ?> name="guardian_info[]" type="checkbox" value="email">
                          <label class="form-check-label">Email.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($guardian_form_fields['gender'] == 1) ? "checked": "" ?> name="guardian_info[]" type="checkbox" value="gender">
                          <label class="form-check-label">Gender.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($guardian_form_fields['mobile_phone'] == 1) ? "checked": "" ?> name="guardian_info[]" type="checkbox" value="mobile_phone">
                          <label class="form-check-label">Mobile Phone.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($guardian_form_fields['phone'] == 1) ? "checked": "" ?> name="guardian_info[]" type="checkbox" value="phone">
                          <label class="form-check-label">Phone.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo ($guardian_form_fields['address'] == 1) ? "checked": "" ?> name="guardian_info[]" type="checkbox" value="address">
                          <label class="form-check-label">Address.</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>

                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="row">
                <div class="col-md-4 col-md-offset-4"><button type="submit" class="btn btn-primary">Save</button></div>
                
              </div>
            </form>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php $this->load->view('parts/footer'); ?>