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
</nav>
<!-- /.navbar -->
<?php $this->load->view('parts/sidebar'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add New Student</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Student</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="row">
        <div class="col-md-12">
            <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?> </div>
            <?php } ?>
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?> </div>
            <?php } ?>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row"> 
                <div class="col-md-12">
                    <form role="form" method="post" action="<?php echo site_url('students/add_new_student') ?>" enctype="multipart/form-data">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Student Information</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><code>*</code>Surname</label>
                                            <input type="text" class="form-control" name="surname" placeholder="Surname" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><code>*</code>First Name</label>
                                            <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label><code>*</code>Admission No</label>
                                                <input type="text" class="form-control" name="admission_no" placeholder="Admission No" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><code>*</code>Admission Date</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" name="admission_date" placeholder="Admission Date" required>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($student_fields['date_of_birth']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" name="date_of_birth" placeholder="Date of Birth">
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($student_fields['gender']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control" name="gender">
                                                    <option value="">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($student_fields['religion']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Religion</label>
                                                <select class="form-control" name="religion">
                                                    <option value="">Select Religion</option>
                                                    <option value="Christianity">Christianity</option>
                                                    <option value="Islam">Islam</option>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($student_fields['photo']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputFile">File input</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="photo" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="">Upload</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($student_fields['blood_group']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Blood Group</label>
                                                <select class="form-control" name="blood_group">
                                                    <option value="">Blood Group</option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($student_fields['genotype']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Geno Type</label>
                                                <select class="form-control" name="genotype">
                                                    <option value="">Select Genotype</option>
                                                    <option value="AA">AA</option>
                                                    <option value="AS">AS</option>
                                                    <option value="SS">SS</option>
                                                    <option value="AC">AC-</option>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($student_fields['nationality']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nationality</label>
                                                <select class="form-control" name="nationality">
                                                    <option value="">Select Nationality</option>
                                                    <?php foreach ($countries as $country) { ?>
                                                        <option value="<?php echo $country['country_code'] ?>"><?php echo $country['country_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($student_fields['state_of_origin']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>State of Origin</label>
                                                <input type="text" class="form-control" name="state_of_origin" placeholder="State of Origin">
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($student_fields['lga_of_origin']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>L.G.A of Origin</label>
                                                <input type="text" class="form-control" name="lga_of_origin" placeholder="L.G.A of Origin">
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><code>*</code>Batch</label>
                                            <input type="text" class="form-control" placeholder="Batch No." name="batch_no" required="">
                                        </div>
                                    </div>
                                    <?php if ($student_fields['student_category']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Student Category</label>
                                                <input type="text" class="form-control" name="student_category" placeholder="Student Category">
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($student_fields['mobile_phone']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mobile Phone</label>
                                                <input type="tel" id="mobile_phone" name="mobile_phone" class="form-control">
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($student_fields['email']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="email" placeholder="Email">
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($student_fields['phone']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="tel" class="form-control" name="phone" id="phone">
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php if ($student_fields['address']) { ?>
                                <div class="card-header">
                                    <h3 class="card-title">Student Address</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Address Line</label>
                                                <textarea class="form-control" rows="1" name="address_line"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <select class="form-control" name="country">
                                                    <option value="">Select Country</option>
                                                    <?php foreach ($countries as $country) { ?>
                                                        <option value="<?php echo $country['country_code'] ?>"><?php echo $country['country_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" class="form-control" name="state" placeholder="State">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label></label>
                                                <input type="text" class="form-control" name="city" placeholder="City">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($student_fields['guardian_info_section']) { ?>
                                <div class="card-header">
                                    <h3 class="card-title">Guardian Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Assign Guardian</button>
                                                    <span class="sr-only"></span>
                                                    <div class="dropdown-menu">
                                                        <button class="dropdown-item" id="ex-guardian">Assign Existing Guardian</button>
                                                        <button class="dropdown-item" data-toggle="modal" data-target="#myModal">Create New Guardian</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="assign" style="display: none;">
                                        <div class="col-md-12">
                                            <!-- /.card-header -->
                                            <div class="card-body p-0">
                                                <table id="guardian" class="display table table-striped" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Relationship</th>
                                                            <th>Mobile Phone</th>
                                                            <th>Emergency</th>
                                                            <th>Can pick up?</th>
                                                            <th>Email</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Tiger Nixon</td>
                                                            <td>System Architect</td>
                                                            <td>Edinburgh</td>
                                                            <td>61</td>
                                                            <td>2011/04/25</td>
                                                            <td>$320,800</td>
                                                            <td>
                                                                <a class="btn btn-xs btn-info" target="_blank" href="#">
                                                                    <i class="fa fa-user"></i> View Profile
                                                                </a>
                                                                <a class="btn btn-xs btn-danger" target="_blank" href="#">
                                                                    <i class="fa fa-user-times"></i> Unassign
                                                                </a>
                                                            </td>
                                                        </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-6" style="margin-bottom: 20px;">

                                        <button type="submit" class="btn btn-primary btn-lg pull-right">Save Student</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-primary btn-lg pull-center">Save and add another</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                <?php } ?>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </form>
        </div>
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->

<!-----------------modal guardian-------------------->
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
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
                            <form>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="emp_surname" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Surname</label>
                                            <input type="text" class="form-control" name="emp_first_name" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>First name</label>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Middle name</label>
                                            <input type="text" class="form-control" name="emp_surname" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mobile phone</label>
                                            <input type="text" class="form-control" name="emp_first_name" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Email</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                            </div>
                                            <input type="email" class="form-control" />
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
                                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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
                                            <input type="text" class="form-control" />
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
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Address line</label>
                                            <textarea class="form-control" rows="3" ></textarea>
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
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save-guardian">Save</button>
                </div>
            </div>

        </div>
    </div>
</div>
</section>
<!-- /.content -->
</div>
<?php $this->load->view('parts/footer'); ?>