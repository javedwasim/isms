
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add New Employee</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">add employee</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid --->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div id="employee_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="employee_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Employee Information</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="employee_form" method="post" role="form" action="<?php echo isset($form_action) ? $form_action : site_url('employee/add_new_employee') ?>"
                              data-action="<?php echo isset($form_action) ? $form_action : site_url('employee/add_new_employee') ?>" enctype="multipart/form-data">
                            <div class="card-body">
                                <!-- text input -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Surname</label>
                                            <input type="text" class="form-control" name="surname" value="<?php echo isset($employee['surname']) ? $employee['surname'] : ''; ?>"  />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>First name</label>
                                            <input type="text" class="form-control" name="first_name" value="<?php echo isset($employee['first_name']) ? $employee['first_name'] : ''; ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Middle name</label>
                                            <input type="text" class="form-control" name="middle_name" value="<?php echo isset($employee['middle_name']) ? $employee['middle_name'] : ''; ?>"  />
                                        </div>
                                    </div>

                                    <?php if ($employee_fields['title']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="title" value="<?php echo isset($employee['title']) ? $employee['title'] : ''; ?>"  />
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Employee No</label>
                                            <input type="text" class="form-control" name="employee_no" value="<?php echo isset($employee['employee_no']) ? $employee['employee_no'] : ''; ?>" />
                                        </div>
                                    </div>
                                    <?php if ($employee_fields['gender']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control" name="gender">
                                                    <option value="">Please select</option>
                                                    <option value="male" <?php echo isset($employee['gender']) && $employee['gender'] == 'male' ? 'selected' : ''; ?> >Male</option>
                                                    <option value="female" <?php echo isset($employee['gender']) && $employee['gender'] == 'female' ? 'selected' : ''; ?> >Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($employee_fields['date_of_birth']) { ?>
                                        <div class="col-md-4">
                                            <label>Date of birth</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo isset($employee['date_of_birth']) ? $employee['date_of_birth'] : ''; ?>" >
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($employee_fields['photo']) { ?>
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
                                    <?php if ($employee_fields['date_of_join']) { ?>
                                        <div class="col-md-4">
                                            <label>Date joined</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="date_of_join" name="date_of_join" value="<?php echo isset($employee['date_of_join']) ? $employee['date_of_join'] : ''; ?>">
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($employee_fields['phone']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input  type="tel" class="form-control" id="emp-phone" name="phone" value="<?php echo isset($employee['phone']) ? $employee['phone'] : ''; ?>">
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($employee_fields['email']) { ?>
                                        <div class="col-md-4">
                                            <label>Email</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                                </div>
                                                <input type="email" class="form-control" name="email" value="<?php echo isset($employee['email']) ? $employee['email'] : ''; ?>" 
                                                       <?php echo isset($employee['email']) ? 'readonly' : ''; ?> />
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($employee_fields['mobile_phone']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mobile phone</label>
                                                <input  type="tel" class="form-control" id="emp-mb-phone" name="mobile_phone" value="<?php echo isset($employee['mobile_phone']) ? $employee['mobile_phone'] : ''; ?>"  >
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($employee_fields['employee_category']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Employee Category</label>
                                                <select class="form-control" name="category">
                                                    <option value="">Please select</option>
                                                    <?php foreach ($categories as $category) : ?>
                                                        <option value="<?php echo $category['id']; ?>"<?php echo isset($employee['category']) && ($employee['category'] == $category['id']) ? 'selected' : ''; ?>><?php echo $category['category']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($employee_fields['employee_department']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Employee Department</label>
                                                <select class="form-control" name="department">
                                                    <option value="">Please select</option>
                                                    <?php foreach ($departments as $department) : ?>
                                                        <option value="<?php echo $department['id']; ?>"<?php echo isset($employee['department']) && ($employee['department'] == $department['id']) ? 'selected' : ''; ?>><?php echo $department['name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($employee_fields['employee_position']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Employee Positions</label>
                                                <select class="form-control" name="position">
                                                    <option value="">Please select</option>
                                                    <?php foreach ($positions as $position) : ?>
                                                        <option value="<?php echo $position['id']; ?>"<?php echo isset($employee['position']) && ($employee['position'] == $position['id']) ? 'selected' : ''; ?>><?php echo $position['name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($employee_fields['religion']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Religion</label>
                                                <select class="form-control" name="religion">
                                                    <option value="">Please Select</option>
                                                    <option value="christianity"<?php echo isset($employee['religion']) && $employee['religion'] == 'christianity' ? 'selected' : ''; ?>>Christianity</option>
                                                    <option value="islam"<?php echo isset($employee['religion']) && $employee['religion'] == 'islam' ? 'selected' : ''; ?>>Islam</option>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($employee_fields['marital_status']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Marital status</label>
                                                <select class="form-control" name="marital_status">
                                                    <option value="">Please Select</option>
                                                    <option value="single"<?php echo isset($employee['marital_status']) && $employee['marital_status'] == 'single' ? 'selected' : ''; ?>>Single</option>
                                                    <option value="married"<?php echo isset($employee['marital_status']) && $employee['marital_status'] == 'married' ? 'selected' : ''; ?>>Married</option>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($employee_fields['blood_group']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Blood group</label>
                                                <select class="form-control" name="blood_group">
                                                    <option value="">Please Select</option>
                                                    <option value="A+"<?php echo isset($employee['blood_group']) && $employee['blood_group'] == 'A+' ? 'selected' : ''; ?>>A+</option>
                                                    <option value="A-"<?php echo isset($employee['blood_group']) && $employee['blood_group'] == 'A-' ? 'selected' : ''; ?>>A-</option>
                                                    <option value="AB+"<?php echo isset($employee['blood_group']) && $employee['blood_group'] == 'AB+' ? 'selected' : ''; ?>>AB+</option>
                                                    <option value="AB-"<?php echo isset($employee['blood_group']) && $employee['blood_group'] == 'AB-' ? 'selected' : ''; ?>>AB-</option>
                                                    <option value="B+"<?php echo isset($employee['blood_group']) && $employee['blood_group'] == 'B+' ? 'selected' : ''; ?>>B+</option>
                                                    <option value="B-"<?php echo isset($employee['blood_group']) && $employee['blood_group'] == 'B-' ? 'selected' : ''; ?>>B-</option>
                                                    <option value="O+"<?php echo isset($employee['blood_group']) && $employee['blood_group'] == 'O+' ? 'selected' : ''; ?>>O+</option>
                                                    <option value="O-"<?php echo isset($employee['blood_group']) && $employee['blood_group'] == 'O-' ? 'selected' : ''; ?>>O-</option>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($employee_fields['nationality']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nationality</label>
                                                <select class="form-control select2" name="nationality">
                                                    <option>Select Nationality</option>
                                                    <?php foreach ($countries as $country) { ?>
                                                        <option value="<?php echo $country['id'] ?>"<?php echo isset($employee['nationality']) && $employee['nationality'] == $country['id'] ? 'selected' : ''; ?>><?php echo $country['country_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($employee_fields['qualification']) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Qualification</label>
                                                <select class="form-control" name="qualification">
                                                    <option value="">Please Select</option>
                                                    <option value="Bsc"<?php echo isset($employee['qualification']) && $employee['qualification'] == 'Bsc' ? 'selected' : ''; ?>>Bsc</option>
                                                    <option value="Msc"<?php echo isset($employee['qualification']) && $employee['qualification'] == 'Msc' ? 'selected' : ''; ?>>Msc</option>
                                                    <option value="HND"<?php echo isset($employee['qualification']) && $employee['qualification'] == 'HND' ? 'selected' : ''; ?>>Hnd</option>
                                                    <option value="OND"<?php echo isset($employee['qualification']) && $employee['qualification'] == 'OND' ? 'selected' : ''; ?>>Ond</option>
                                                    <option value="NCE"<?php echo isset($employee['qualification']) && $employee['qualification'] == 'NCE' ? 'selected' : ''; ?>>Nce</option>
                                                    <option value="BA"<?php echo isset($employee['qualification']) && $employee['qualification'] == 'BA' ? 'selected' : ''; ?>>Ba</option>
                                                    <option value="PGDE"<?php echo isset($employee['qualification']) && $employee['qualification'] == 'PGDE' ? 'selected' : ''; ?>>Pgde</option>
                                                    <option value="PROF"<?php echo isset($employee['qualification']) && $employee['qualification'] == 'PROF' ? 'selected' : ''; ?>>Prof</option>
                                                    <option value="DR"<?php echo isset($employee['qualification']) && $employee['qualification'] == 'DR' ? 'selected' : ''; ?>>Dr</option>
                                                    <option value="KCPE"<?php echo isset($employee['qualification']) && $employee['qualification'] == 'KCPE' ? 'selected' : ''; ?>>Kcpe</option>
                                                    <option value="KCSE"<?php echo isset($employee['qualification']) && $employee['qualification'] == 'KCSE' ? 'selected' : ''; ?>>Kcse</option>
                                                    <option value="UNDERGRADUATE"<?php echo isset($employee['qualification']) && $employee['qualification'] == 'UNDERGRADUATE' ? 'selected' : ''; ?>>Undergraduate</option>
                                                    <option value="ECDE"<?php echo isset($employee['qualification']) && $employee['qualification'] == 'ECDE' ? 'selected' : ''; ?>>Ecde</option>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <br />
                                <?php if ($employee_fields['address']) { ?>
                                    <div class="card-header">
                                        <h3 class="card-title">Employee Address</h3>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address line</label>
                                                <textarea class="form-control" rows="3" name="address_line"><?php echo isset($employee['address_line']) ? $employee['address_line'] : ''; ?></textarea>
                                            </div>
                                        </div>
                                        <?php if ($employee_fields['nationality']) { ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select class="form-control" id="nationality" name="country">
                                                        <option value="">Select Nationality</option>
                                                        <?php foreach ($countries as $country) { ?>
                                                            <option value="<?php echo $country['id'] ?>"<?php echo isset($employee['country']) && $employee['country'] == $country['id'] ? 'selected' : ''; ?>><?php echo $country['country_name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <br />
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>State</label>
                        <!--                          <input type="text" class="form-control" name="state" maxlength="20" placeholder="State" value="--><?php //echo isset($employee['state'])? $employee['state']:'';  ?><!--">-->
                                                <select class="form-control" id="country_states" name="state">
                                                    <?php foreach ($states as $state): ?>
                                                        <option value="<?php echo $state['id']; ?>"<?php echo isset($employee['state']) && $employee['state'] == $state['id'] ? 'selected' : ''; ?>><?php echo $state['name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" name="lga_of_origin" maxlength="20" placeholder="LGA of origin" value="<?php echo isset($employee['lga_of_origin']) ? $employee['lga_of_origin'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <br />
                                <?php if ($employee_fields['next_of_kin']) { ?>
                                    <div class="card-header">
                                        <h3 class="card-title">Next of Kin Information</h3>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="next_of_kin_name" value="<?php echo isset($employee['next_of_kin_name']) ? $employee['next_of_kin_name'] : ''; ?>"/>
                                            </div>
                                        </div>
                                        <?php if ($employee_fields['relation_next_of_kin']) { ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Relationship with next of kin</label>
                                                    <input type="text" class="form-control" name="next_of_kin_relation" value="<?php echo isset($employee['next_of_kin_relation']) ? $employee['next_of_kin_relation'] : ''; ?>"/>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($employee_fields['next_of_kin_phone']) { ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Next of kin phone</label>
                                                    <input type="text" class="form-control" name="next_of_kin_phone" value="<?php echo isset($employee['next_of_kin_phone']) ? $employee['next_of_kin_phone'] : ''; ?>"/>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($employee_fields['next_of_kin_mobile']) { ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Next of kin mobile phone</label>
                                                    <input type="text" class="form-control" name="next_of_kin_mobile" value="<?php echo isset($employee['next_of_kin_mobile']) ? $employee['next_of_kin_mobile'] : ''; ?>"/>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if ($employee_fields['next_of_kin_address']) { ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Next of kin address</label>
                                                    <textarea class="form-control" rows="3" name="next_of_kin_address_line" ><?php echo isset($employee['next_of_kin_address_line']) ? $employee['next_of_kin_address_line'] : ''; ?></textarea>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <br />
                                <?php if ($employee_fields['bank_account_details']) { ?>
                                    <div class="card-header">
                                        <h3 class="card-title">Bank Account Details</h3>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Bank</label>
                                                <select class="form-control" name="bank_name">
                                                    <option value="">Please Select</option>
                                                    <option value="1"<?php echo isset($employee['bank_name']) && $employee['bank_name'] == '1' ? 'selected' : ''; ?>>Access Bank Plc</option>
                                                    <option value="2"<?php echo isset($employee['bank_name']) && $employee['bank_name'] == '2' ? 'selected' : ''; ?>>Citibank Nigeria Limited</option>
                                                    <option value="3"<?php echo isset($employee['bank_name']) && $employee['bank_name'] == '3' ? 'selected' : ''; ?>>Diamond Bank Plc</option>
                                                    <option value="4"<?php echo isset($employee['bank_name']) && $employee['bank_name'] == '4' ? 'selected' : ''; ?>>Ecobank Nigeria Plc</option>
                                                    <option value="5"<?php echo isset($employee['bank_name']) && $employee['bank_name'] == '5' ? 'selected' : ''; ?>>Enterprise Bank</option>
                                                    <option value="6"<?php echo isset($employee['bank_name']) && $employee['bank_name'] == '6' ? 'selected' : ''; ?>>Fidelity Bank Plc</option>
                                                    <option value="7"<?php echo isset($employee['bank_name']) && $employee['bank_name'] == '7' ? 'selected' : ''; ?>>First Bank of Nigeria Plc</option>
                                                    <option value="8"<?php echo isset($employee['bank_name']) && $employee['bank_name'] == '8' ? 'selected' : ''; ?>>First City Monument Bank Plc</option>
                                                    <option value="9"<?php echo isset($employee['bank_name']) && $employee['bank_name'] == '9' ? 'selected' : ''; ?>>Guaranty Trust Bank Plc</option>
                                                    <option value="10"<?php echo isset($employee['bank_name']) && $employee['bank_name'] == '10' ? 'selected' : ''; ?>>Heritage Banking Company Ltd.</option>
                                                    <option value="11"<?php echo isset($employee['bank_name']) && $employee['bank_name'] == '11' ? 'selected' : ''; ?>>Key Stone Bank</option>
                                                    <option value="12"<?php echo isset($employee['bank_name']) && $employee['bank_name'] == '12' ? 'selected' : ''; ?>>MainStreet Bank</option>
                                                    <option value="13"<?php echo isset($employee['bank_name']) && $employee['bank_name'] == '13' ? 'selected' : ''; ?>>Skye Bank Plc</option>
                                                    <option value="14"<?php echo isset($employee['bank_name']) && $employee['bank_name'] == '14' ? 'selected' : ''; ?>>Stanbic IBTC Bank Ltd.</option>
                                                    <option value="15"<?php echo isset($employee['bank_name']) && $employee['bank_name'] == '15' ? 'selected' : ''; ?>>Standard Chartered Bank Nigeria Ltd.</option>
                                                    <option value="16"<?php echo isset($employee['bank_name']) && $employee['bank_name'] == '16' ? 'selected' : ''; ?>>Sterling Bank Plc</option>
                                                    <option value="17"<?php echo isset($employee['bank_name']) && $employee['bank_name'] == '17' ? 'selected' : ''; ?>>Union Bank of Nigeria Plc</option>
                                                    <option value="18"<?php echo isset($employee['bank_name']) && $employee['bank_name'] == '18' ? 'selected' : ''; ?>>United Bank For Africa Plc</option>
                                                    <option value="19"<?php echo isset($employee['bank_name']) && $employee['bank_name'] == '19' ? 'selected' : ''; ?>>Unity Bank Plc</option>
                                                    <option value="20"<?php echo isset($employee['bank_name']) && $employee['bank_name'] == '20' ? 'selected' : ''; ?>>Wema Bank Plc</option>
                                                    <option value="21"<?php echo isset($employee['bank_name']) && $employee['bank_name'] == '21' ? 'selected' : ''; ?>Zenith Bank Plc</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Account name</label>
                                                <input type="text" class="form-control" name="account_name" value="<?php echo isset($employee['account_name']) ? $employee['account_name'] : ''; ?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Account number</label>
                                                <input type="text" class="form-control" name="account_number" value="<?php echo isset($employee['account_number']) ? $employee['account_number'] : ''; ?>" />
                                            </div>
                                        </div>

                                    </div>
                                <?php } ?>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button id="<?php echo isset($update_employee_button) && (!empty($update_employee_button)) ? 'save_employees' : 'save_employees'; ?>" type="submit" class="btn btn-primary btn-lg pull-right">Save Employee</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content -->
<script>
    $(document).ready(function () {
        $('#date_of_join').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('#date_of_birth').datepicker({
            format: 'yyyy-mm-dd'
        });

        $("#nationality").change(function () {
            var country = $('#nationality').val();
            $.ajax({
                url: '/isms/students/get_state/' + country,
                cache: false,
                success: function (response) {
                    if (response.success) {
                        $('#country_states').empty();
                        $('#country_states').append(response.states_html);
                    } else {
                        toastr["warning"](response.message);
                    }
                }
            });
        });
    });
</script>