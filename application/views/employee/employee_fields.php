 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Fields</li>
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
            <form role="form" method="post" id="form_fields" data-action="<?php echo site_url('employee_setting/add_employee_fields') ?>">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Employee Profile Fields</h3>
                  <br>
                  <h5>Select employee profile fields to enable.</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" disabled checked type="checkbox" value="staff_no" name="employee_form_fields[]">
                          <label class="form-check-label">Staff No.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" disabled checked type="checkbox" value="last_name"  name="employee_form_fields[]">
                          <label class="form-check-label">Last Name.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" disabled checked type="checkbox" value="first_name"  name="employee_form_fields[]">
                          <label class="form-check-label">First Name.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" disabled checked type="checkbox" value="middle_name"  name="employee_form_fields[]">
                          <label class="form-check-label">Middle Name.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="title" <?php echo isset($employee_fields['title'])&&($employee_fields['title']==1)?'checked':''; ?>   name="employee_form_fields[]">
                          <label class="form-check-label">Title.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="photo" <?php echo isset($employee_fields['photo'])&&($employee_fields['photo']==1)?'checked':''; ?> name="employee_form_fields[]">
                          <label class="form-check-label">Photo.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                            <?php //print_r($employee_fields);  ?>
                          <input class="form-check-input" type="checkbox" value="date_of_join" <?php echo isset($employee_fields['date_of_join'])&&($employee_fields['date_of_join']==1)?'checked':''; ?>  name="employee_form_fields[]" >
                          <label class="form-check-label">Date Joined</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="gender" <?php echo isset($employee_fields['gender'])&&($employee_fields['gender']==1)?'checked':''; ?>  name="employee_form_fields[]">
                          <label class="form-check-label">Gender.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="date_of_birth" <?php echo isset($employee_fields['date_of_birth'])&&($employee_fields['date_of_birth']==1)?'checked':''; ?> name="employee_form_fields[]">
                          <label class="form-check-label">Date of birth.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="email" <?php echo isset($employee_fields['email'])&&($employee_fields['email']==1)?'checked':''; ?> name="employee_form_fields[]">
                          <label class="form-check-label">Email.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="mobile_phone" <?php echo isset($employee_fields['mobile_phone'])&&($employee_fields['mobile_phone']==1)?'checked':''; ?> name="employee_form_fields[]">
                          <label class="form-check-label">Mobile Phone.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="phone" <?php echo isset($employee_fields['phone'])&&($employee_fields['phone']==1)?'checked':''; ?> name="employee_form_fields[]">
                          <label class="form-check-label">Phone.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="address" <?php echo isset($employee_fields['address'])&&($employee_fields['address']==1)?'checked':''; ?>  name="employee_form_fields[]">
                          <label class="form-check-label">Address.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="employee_category" <?php echo isset($employee_fields['employee_category'])&&($employee_fields['employee_category']==1)?'checked':''; ?> name="employee_form_fields[]">
                          <label class="form-check-label">Employee Category.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="employee_position" <?php echo isset($employee_fields['employee_position'])&&($employee_fields['employee_position']==1)?'checked':''; ?> name="employee_form_fields[]">
                          <label class="form-check-label">Employee Position.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="employee_department" <?php echo isset($employee_fields['employee_department'])&&($employee_fields['employee_department']==1)?'checked':''; ?> name="employee_form_fields[]">
                          <label class="form-check-label">Employee Department.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="religion" <?php echo isset($employee_fields['religion'])&&($employee_fields['religion']==1)?'checked':''; ?>  name="employee_form_fields[]">
                          <label class="form-check-label">Religion.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="nationality" <?php echo isset($employee_fields['nationality'])&&($employee_fields['nationality']==1)?'checked':''; ?> name="employee_form_fields[]">
                          <label class="form-check-label">Nationality.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="blood_group" <?php echo isset($employee_fields['blood_group'])&&($employee_fields['blood_group']==1)?'checked':''; ?> name="employee_form_fields[]">
                          <label class="form-check-label">Blood Group.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="qualification" <?php echo isset($employee_fields['qualification'])&&($employee_fields['qualification']==1)?'checked':''; ?> name="employee_form_fields[]">
                          <label class="form-check-label">Qualification.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="marital_status" <?php echo isset($employee_fields['marital_status'])&&($employee_fields['marital_status']==1)?'checked':''; ?> name="employee_form_fields[]">
                          <label class="form-check-label">Marital Status.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="bank_account_details" <?php echo isset($employee_fields['bank_account_details'])&&($employee_fields['bank_account_details']==1)?'checked':''; ?> name="employee_form_fields[]">
                          <label class="form-check-label">Bank Account Details.</label>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="next_of_kin" <?php echo isset($employee_fields['next_of_kin'])&&($employee_fields['next_of_kin']==1)?'checked':''; ?> name="employee_form_fields[]">
                          <label class="form-check-label">Next of kin info.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="next_of_kin_mobile" <?php echo isset($employee_fields['next_of_kin_mobile'])&&($employee_fields['next_of_kin_mobile']==1)?'checked':''; ?> name="employee_form_fields[]">
                          <label class="form-check-label">Next of Kin Mobile.</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="relation_next_of_kin" <?php echo isset($employee_fields['relation_next_of_kin'])&&($employee_fields['relation_next_of_kin']==1)?'checked':''; ?> name="employee_form_fields[]">
                          <label class="form-check-label">Relationship with Next of Kin.</label>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="next_of_kin_phone" <?php echo isset($employee_fields['next_of_kin_phone'])&&($employee_fields['next_of_kin_phone']==1)?'checked':''; ?> name="employee_form_fields[]">
                          <label class="form-check-label">Next of Kin Phone.</label>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="next_of_kin_address" <?php echo isset($employee_fields['next_of_kin_address'])&&($employee_fields['next_of_kin_address']==1)?'checked':''; ?> name="employee_form_fields[]">
                          <label class="form-check-label">Next of Kin Address.</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="row">
                <div class="col-md-4 col-md-offset-4"><button id="employee_fields" type="submit" class="btn btn-primary">Save</button></div>
                
              </div>
            </form>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  