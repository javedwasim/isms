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
              <li class="breadcrumb-item active">Student Fields</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
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
    <section class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class="col-md-12">
            <form role="form" method="post" id="form_fields" data-action="<?php echo site_url('students/add_student_fields') ?>">
              <div class="card card-primary">
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
                          <input class="form-check-input" type="checkbox" value="photo" <?php echo isset($student_fields['photo'])&&($student_fields['photo']==1)?'checked':''; ?> name="student_form_fields[]">
                          <label class="form-check-label">photo.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                            <?php //print_r($student_fields);  ?>
                          <input class="form-check-input" type="checkbox" value="gender" <?php echo isset($student_fields['gender'])&&($student_fields['gender']==1)?'checked':''; ?>  name="student_form_fields[]" >
                          <label class="form-check-label">Gender.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="date_of_birth" <?php echo isset($student_fields['date_of_birth'])&&($student_fields['date_of_birth']==1)?'checked':''; ?>  name="student_form_fields[]">
                          <label class="form-check-label">Date of birth.</label>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="email" <?php echo isset($student_fields['email'])&&($student_fields['email']==1)?'checked':''; ?> name="student_form_fields[]">
                          <label class="form-check-label">Email.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="mobile_phone" <?php echo isset($student_fields['mobile_phone'])&&($student_fields['mobile_phone']==1)?'checked':''; ?> name="student_form_fields[]">
                          <label class="form-check-label">Mobile Phone.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="phone" <?php echo isset($student_fields['phone'])&&($student_fields['phone']==1)?'checked':''; ?> name="student_form_fields[]">
                          <label class="form-check-label">Phone.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="address" <?php echo isset($student_fields['address'])&&($student_fields['address']==1)?'checked':''; ?>  name="student_form_fields[]">
                          <label class="form-check-label">Address.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="student_category" <?php echo isset($student_fields['student_category'])&&($student_fields['student_category']==1)?'checked':''; ?> name="student_form_fields[]">
                          <label class="form-check-label">Student Category.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="religion" <?php echo isset($student_fields['religion'])&&($student_fields['religion']==1)?'checked':''; ?>  name="student_form_fields[]">
                          <label class="form-check-label">Religion.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="nationality" <?php echo isset($student_fields['nationality'])&&($student_fields['nationality']==1)?'checked':''; ?> name="student_form_fields[]">
                          <label class="form-check-label">Nationality.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="state_of_origin" <?php echo isset($student_fields['state_of_origin'])&&($student_fields['state_of_origin']==1)?'checked':''; ?> name="student_form_fields[]">
                          <label class="form-check-label">State of Origin.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="lga_of_origin" <?php echo isset($student_fields['lga_of_origin'])&&($student_fields['lga_of_origin']==1)?'checked':''; ?> name="student_form_fields[]">
                          <label class="form-check-label">LGA of Origin.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="blood_group" <?php echo isset($student_fields['blood_group'])&&($student_fields['blood_group']==1)?'checked':''; ?> name="student_form_fields[]">
                          <label class="form-check-label">Blood Group.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="genotype" <?php echo isset($student_fields['genotype'])&&($student_fields['genotype']==1)?'checked':''; ?> name="student_form_fields[]">
                          <label class="form-check-label">Genotype.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="health_info" <?php echo isset($student_fields['health_info'])&&($student_fields['health_info']==1)?'checked':''; ?> name="student_form_fields[]">
                          <label class="form-check-label">Health Info.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" id="guardian_info" type="checkbox" value="guardian_info_section" <?php echo isset($student_fields['guardian_info_section'])&&($student_fields['guardian_info_section']==1)?'checked':''; ?> name="student_form_fields[]">
                          <label class="form-check-label">Guardian Info.</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- /.card-body -->
              </div>

              <div class="card card-primary" id="guardian_info_section" >
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
<!--                          <input class="form-check-input" name="guardian_info[]" type="checkbox" value="photo">-->
                          <input class="form-check-input" <?php echo isset($guardian_fields['photo'])&&($guardian_fields['photo']==1)?'checked':''; ?> name="guardian_info[]" type="checkbox" value="photo">
                          <label class="form-check-label">photo.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo isset($guardian_fields['title'])&&($guardian_fields['title']==1)?'checked':''; ?> name="guardian_info[]" type="checkbox" value="title">
                          <label class="form-check-label">Title.</label>
                        </div>
                      </div>
                    </div>
                    

                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo isset($guardian_fields['email'])&&($guardian_fields['email']==1)?'checked':''; ?> name="guardian_info[]" type="checkbox" value="email">
                          <label class="form-check-label">Email.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo isset($guardian_fields['gender'])&&($guardian_fields['gender']==1)?'checked':''; ?> name="guardian_info[]" type="checkbox" value="gender">
                          <label class="form-check-label">Gender.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" <?php echo isset($guardian_fields['mobile_phone'])&&($guardian_fields['mobile_phone']==1)?'checked':''; ?> name="guardian_info[]" type="checkbox" value="mobile_phone">
                          <label class="form-check-label">Mobile Phone.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" name="guardian_info[]" type="checkbox" value="phone" <?php echo isset($guardian_fields['phone'])&&($guardian_fields['phone']==1)?'checked':''; ?>>
                          <label class="form-check-label">Phone.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" name="guardian_info[]" type="checkbox" value="address" <?php echo isset($guardian_fields['address'])&&($guardian_fields['address']==1)?'checked':''; ?>>
                          <label class="form-check-label">Address.</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- /.card-body ---->
              </div>
              <!-- /.card -->
              <div class="row">
                <div class="col-md-4 col-md-offset-4"><button id="student_fields" type="submit" class="btn btn-primary">Save</button></div>
                
              </div>
            </form>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid ---->
    </section>
    <!-- /.content -->
  </div>
  