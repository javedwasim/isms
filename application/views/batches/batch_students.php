<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo isset($students[0])?$students[0]['code'] . '-' . $students[0]['arm'] . '(' . $students[0]['session'] . ')':''; ?></h1>
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
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Behavioural Scoresheet</a></li>
                                <li class="nav-item"><a class="nav-link" href="#demographic" data-toggle="tab">Demographics</a></li>
                                <li class="nav-item"><a class="nav-link" style="cursor: pointer;" data-toggle="modal" data-target="#myModal">Assign Employee</a></li>
                                <li class="nav-item"><a class="nav-link" href="#transfer" data-toggle="tab">Student Transfer</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="card-header">
                                <h3 class="card-title" style="text-align: center;">
                                  <i class="fa fa-info"></i>
                                  <?php $session = $current_batch_info['session']; echo $current_batch_info['code'].'-'.$current_batch_info['arm']."($session) behavioural scoresheet"; ?>
                                </h3>
                            </div>
                            <hr>
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="punctuality" class="col-sm-2 col-form-label">Select Term</label>
                                                <div class="col-sm-4 col-sm-offset-6">
                                                    <select name="term_filter" id="term_filter" class="form-control">
                                                        <option value="1"<?php echo isset($_REQUEST['term_id'])&&($_REQUEST['term_id']==1)?'selected':''; ?>>First Term</option>
                                                        <option value="2"<?php echo isset($_REQUEST['term_id'])&&($_REQUEST['term_id']==2)?'selected':''; ?>>Second Term</option>
                                                        <option value="3"<?php echo isset($_REQUEST['term_id'])&&($_REQUEST['term_id']==3)?'selected':''; ?>>Third Term</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- /.card-header -->
                                            <div class="card-body p-0">
                                                <div class="card card-primary card-outline">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Student List</h5>
                                                        <hr>
                                                        <ul class="list-group">
                                                            <?php foreach ($students as $student): $admission_no = $student['admission_no']; ?> 
                                                                <a href="javascript:void(0)" class="student_grade_link" data-href="<?php echo $student['student_id'] ?>" data-action="<?php echo base_url()."batches/get_student_grade"; ?>">
                                                                    <li class="list-group-item list-group-item-warning"><?php echo $student['first_name'].' '.$student['last_name'],"($admission_no)"; ?></li></a>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div><!-- /.card -->

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- /.card-header -->
                                            <div class="card-body p-0">
                                                <div class="card card-primary card-outline">
                                                    <div id="student_behaviour_score_model">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?php $session = $current_batch_info['session'];
                                                                echo $current_batch_info['code'].'-'.$current_batch_info['arm']."($session) behavioural scoresheet"; ?></h5>
                                                            <hr/>
                                                            <form id="student_behavioural_score_form" method="post" role="form"  data-action="<?php echo site_url('Batches/save_student_behavioural_score') ?>"
                                                                  enctype="multipart/form-data">
                                                                <input type="hidden" name="student_id" id="student_id">
                                                                <input type="hidden" name="grade_scale_id" id="grade_scale_id" value="2">
                                                                <input type="hidden" name="term_id" id="term_id" value="3">
                                                                <div class="form-group row" style="background-color: lightgrey;">
                                                                    <label for="inputEmail3" class="col-sm-6 col-form-label">Affective Domain</label>
                                                                    <label for="inputEmail3" class="col-sm-6 col-form-label">Grade</label>
                                                                </div>
                                                                <div class="form-group row" style="background-color: #f9f9f9;">
                                                                    <label for="punctuality" class="col-sm-6 col-form-label">Punctuality</label>
                                                                    <div class="col-sm-6">
                                                                        <select class="custom-select mr-sm-2" name="punctuality" id="punctuality">
                                                                            <option value="">Please Select</option>
                                                                            <?php foreach($scales as $scale): ?>
                                                                                <option value="<?php echo $scale['id']; ?>"><?php echo $scale['name']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="assignments" class="col-sm-6 col-form-label">Assignments</label>
                                                                    <div class="col-sm-6">
                                                                        <select class="custom-select mr-sm-2" name="assignments" id="assignments">
                                                                            <option value="">Please Select</option>
                                                                            <?php foreach($scales as $scale): ?>
                                                                                <option value="<?php echo $scale['id']; ?>"><?php echo $scale['name']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row" style="background-color: #f9f9f9;">
                                                                    <label for="participation" class="col-sm-6 col-form-label">Participation in Class</label>
                                                                    <div class="col-sm-6">
                                                                        <select class="custom-select mr-sm-2" name="participation" id="participation">
                                                                            <option value="">Please Select</option>
                                                                            <?php foreach($scales as $scale): ?>
                                                                                <option value="<?php echo $scale['id']; ?>"><?php echo $scale['name']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="relationship" class="col-sm-6 col-form-label">Relationship with Others</label>
                                                                    <div class="col-sm-6">
                                                                        <select class="custom-select mr-sm-2" name="relationship" id="relationship">
                                                                            <option value="">Please Select</option>
                                                                            <?php foreach($scales as $scale): ?>
                                                                                <option value="<?php echo $scale['id']; ?>"><?php echo $scale['name']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row" style="background-color: #f9f9f9;">
                                                                    <label for="neatness" class="col-sm-6 col-form-label">Neatness</label>
                                                                    <div class="col-sm-6">
                                                                        <select class="custom-select mr-sm-2" name="neatness" id="neatness">
                                                                            <option value="">Please Select</option>
                                                                            <?php foreach($scales as $scale): ?>
                                                                                <option value="<?php echo $scale['id']; ?>"><?php echo $scale['name']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="sense_of_responsibility" class="col-sm-6 col-form-label">Sense of Responsibility</label>
                                                                    <div class="col-sm-6">
                                                                        <select class="custom-select mr-sm-2" name="sense_of_responsibility" id="sense_of_responsibility">
                                                                            <option value="">Please Select</option>
                                                                            <?php foreach($scales as $scale): ?>
                                                                                <option value="<?php echo $scale['id']; ?>"><?php echo $scale['name']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row" style="background-color: #f9f9f9;">
                                                                    <label for="religious_activities" class="col-sm-6 col-form-label">Religious Activities</label>
                                                                    <div class="col-sm-6">
                                                                        <select class="custom-select mr-sm-2" name="religious_activities" id="religious_activities">
                                                                            <option value="">Please Select</option>
                                                                            <?php foreach($scales as $scale): ?>
                                                                                <option value="<?php echo $scale['id']; ?>"><?php echo $scale['name']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="self_control" class="col-sm-6 col-form-label">Self Control</label>
                                                                    <div class="col-sm-6">
                                                                        <select class="custom-select mr-sm-2" name="self_control" id="self_control">
                                                                            <option value="">Please Select</option>
                                                                            <?php foreach($scales as $scale): ?>
                                                                                <option value="<?php echo $scale['id']; ?>"><?php echo $scale['name']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row" style="background-color: #f9f9f9;">
                                                                    <label for="obedience" class="col-sm-6 col-form-label">Obedience</label>
                                                                    <div class="col-sm-6">
                                                                        <select class="custom-select mr-sm-2" name="obedience" id="obedience">
                                                                            <option value="">Please Select</option>
                                                                            <?php foreach($scales as $scale): ?>
                                                                                <option value="<?php echo $scale['id']; ?>"><?php echo $scale['name']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="participation_in_social_activities" class="col-sm-6 col-form-label">Participation in Social Activities</label>
                                                                    <div class="col-sm-6">
                                                                        <select class="custom-select mr-sm-2" name="participation_in_social_activities" id="participation_in_social_activities">
                                                                            <option value="">Please Select</option>
                                                                            <?php foreach($scales as $scale): ?>
                                                                                <option value="<?php echo $scale['id']; ?>"><?php echo $scale['name']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row" style="background-color: #f9f9f9;">
                                                                    <label for="honesty" class="col-sm-6 col-form-label">Honesty</label>
                                                                    <div class="col-sm-6">
                                                                        <select class="custom-select mr-sm-2" name="honesty" id="honesty">
                                                                            <option value="">Please Select</option>
                                                                            <?php foreach($scales as $scale): ?>
                                                                                <option value="<?php echo $scale['id']; ?>"><?php echo $scale['name']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="politeness" class="col-sm-6 col-form-label">Politeness</label>
                                                                    <div class="col-sm-6">
                                                                        <select class="custom-select mr-sm-2" name="politeness" id="politeness">
                                                                            <option value="">Please Select</option>
                                                                            <?php foreach($scales as $scale): ?>
                                                                                <option value="<?php echo $scale['id']; ?>"><?php echo $scale['name']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row" style="background-color: #f9f9f9;">
                                                                    <label for="attentiveness" class="col-sm-6 col-form-label">Attentiveness</label>
                                                                    <div class="col-sm-6">
                                                                        <select class="custom-select mr-sm-2" name="attentiveness" id="attentiveness">
                                                                            <option value="">Please Select</option>
                                                                            <?php foreach($scales as $scale): ?>
                                                                                <option value="<?php echo $scale['id']; ?>"><?php echo $scale['name']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="community_spirit" class="col-sm-6 col-form-label">Community Spirit</label>
                                                                    <div class="col-sm-6">
                                                                        <select class="custom-select mr-sm-2" name="community_spirit" id="community_spirit">
                                                                            <option value="">Please Select</option>
                                                                            <?php foreach($scales as $scale): ?>
                                                                                <option value="<?php echo $scale['id']; ?>"><?php echo $scale['name']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row" style="background-color: #f9f9f9;">
                                                                    <label for="initiative" class="col-sm-6 col-form-label">Initiative</label>
                                                                    <div class="col-sm-6">
                                                                        <select class="custom-select mr-sm-2" name="initiative" id="initiative">
                                                                            <option value="">Please Select</option>
                                                                            <?php foreach($scales as $scale): ?>
                                                                                <option value="<?php echo $scale['id']; ?>"><?php echo $scale['name']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-10" style="text-align: center">
                                                                        <button type="submit" id="save_student_grade" class="btn btn-primary"><i class="fa fa-floppy-o"></i>Save</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="demographic">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Admission No</th>
                                                    <th>Name</th>
                                                    <th>Birthday</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($students as $student): ?>
                                                        <tr>
                                                            <td><?php echo $student['admission_no'] ?></td>
                                                            <td><?php echo $student['first_name'].' '.$student['last_name']; ?></td>
                                                            <td><?php echo date('F j, Y',strtotime($student['date_of_birth'])) ; ?></td>
                                                            <td>
                                                                <a class="btn btn-xs btn-info" target="_blank" href="<?php echo base_url()."students/student_profile/".$student['student_id']; ?>">
                                                                    <i class="fa fa-user"></i> View Profile
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-3">
                                            <ul class="list-group">
                                                <?php foreach ($assigned_employee as $employee): $path = base_url().'assets/uploads/employee_images/'; ?>
                                                    <li class="list-group-item">
                                                        <img class="form-control"
                                                             src="<?php echo !empty($employee['photo'])?$path.$employee['photo']:$path.'user.png'; ?>" />
                                                        <?php echo $employee['first_name']." ".$employee['middle_name']."<br>".$employee['role_name'].'<br>'.$employee['gender']; ?>

                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="transfer">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="card-header">
                                                <h3 class="card-title">Student Transfer</h3>
                                            </div>
                                            <br>
                                            <form id="transfer_batch_form" method="post" role="form"
                                                data-action="<?php echo site_url('batches/transfer_batch') ?>" >
                                                <input type="hidden" name="ids" id="ids"  >
                                                <div class="form-group row">
                                                    <label for="inter_batch" class="col-sm-2 col-form-label">Transfer type:</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" id="inter_batch" value="inter_batch" name="transfer_type" >
                                                            <label class="form-check-label" for="inter_batch">Inter Batch</label>
                                                            &nbsp;
                                                            <input class="form-check-input" type="radio" id="graduation" value="graduation" name="transfer_type" >
                                                            <label class="form-check-label" for="graduation">Graduation</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row" id="transfer_batch_no">
                                                    <label for="batch_no" class="col-sm-2 col-form-label">Transfer to batch<span style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <select prompt="Select Batch" class="form-control" required="required"
                                                                name="batch_no" id="batch_no">
                                                            <option value=""></option>
                                                            <?php $priorGroup = "";
                                                            foreach ($batches as $batch){ ?>
                                                            <?php if ($batch["session"] != $priorGroup){ ?>
                                                            <optgroup label="<?php echo $batch['session']; ?>">
                                                                <?php } ?>
                                                                <option value="<?php echo $batch['id']; ?>">
                                                                    <?php echo $batch['code'] . '-' . $batch['arm'] . '(' . $batch['session'] . ')' ?>
                                                                </option>
                                                                <?php $priorGroup = $batch["session"];
                                                                }
                                                                if ($batch["session"] != $priorGroup) {
                                                                    echo '</optgroup>';
                                                                } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Last day in batch<span style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="last_day_in_batch" id="last_day_in_batch"
                                                               placeholder="Last day in batch" required>
                                                        <div class="alert alert-warning">
                                                            <i class="fa-fw fa fa-warning"></i>
                                                            <strong>Warning</strong> Be sure to enter the last date the selected students spent in this batch. This has effects across the application ( e.g attendance calculation) and is not reversible.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="batch_no" class="col-sm-2 col-form-label">Reason<span style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" id="reason_to_leave_batch" name="reason_to_leave_batch" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-10" style="text-align: center">
                                                        <button type="submit" id="transfer_batch_btn" class="btn btn-primary">Transfer</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-5">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        <input type="checkbox" id="9999" >&nbsp;Name
                                                    </th>
                                                    <th>Admission No</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($students as $student): ?>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="getAll" name="student_id" onclick="$(this).attr('value', this.checked ? 1 : '')"
                                                                   id="<?php echo $student['student_id']; ?>" value="" />
                                                            <?php echo $student['first_name'].' '.$student['last_name']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $student['admission_no'] ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

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
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign Roles</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="assign_employee_form" method="post" role="form"
                      data-action="<?php echo site_url('batches/assign_employees') ?>"
                      enctype="multipart/form-data">
                    <input type="hidden" name="batch_id" value="<?php echo $batch_id; ?>">
                    <div class="assign_employee">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <select id="employee" name="employee[]" class="form-control">
                                    <option selected="">Please Select</option>
                                    <?php foreach ($employees as $employee): ?>
                                        <option value="<?php echo $employee['employee_id']; ?>"><?php echo $employee['first_name'].' '.$employee['surname'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <select id="role" name="role[]" class="form-control">
                                    <option selected="">Please Select</option>
                                    <option value="1">Class Teacher</option>
                                    <option value="5">Guidance Counsellor</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="container"></div>
                        <div class="col-md-12">
                            <div class="form-group" style="text-align: center">
                                <button type="button" id="add_role" class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus"></i>Add Role</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="assign_employee" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus fa-floppy-o"></i>Save</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#example1").DataTable();
        $('#last_day_in_batch').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('.student_grade_link:first-child').click();
    });
    $(document.body).on('click', '#save_student_grade', function(){
        $.ajax({
            url: $('#student_behavioural_score_form').attr('data-action'),
            type: 'post',
            data: $('#student_behavioural_score_form').serialize(),
            cache: false,
            success: function(response) {
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
            }
        });
        return false;
    });
    $('#add_role').click(function () {
        var fieldHTML = '<div class="form-row"><div class="form-group col-md-4">' +
                            '<select id="employee" name="employee[]" class="form-control">' +
                                '<option selected="">Please Select</option>' +
                                 <?php foreach ($employees as $employee): $id = $employee['employee_id'];
                                    $name = $employee['first_name'].' '.$employee['surname']; ?>
                                    '<option value="<?php echo $id; ?>"><?php echo $name; ?></option>' +
                                 <?php endforeach; ?>
                            '</select>' +
                         '</div>' +
                         '<div class="form-group col-md-4">' +
                            '<select id="employee" name="role[]" class="form-control">' +
                            '<option selected="">Please Select</option>' +
                            '<option value="1">Class Teacher</option>' +
                            '<option value="2">Guidance Counsellor</option>' +
                            '</select>' +
                          '</div>' +
                          '<div class="form-group col-md-4">' +
                                '<a class="btn btn-danger btn-sm remove_button" href="#"><i class="fa fa-trash"></i></a>' +
                          '</div></div>';

        $('.assign_employee').append(fieldHTML); //Add field html

    });

    //Once remove button is clicked
    $('.assign_employee').on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).closest(".form-row").remove();
    });

    $("#9999").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
        if($('#9999').is(":checked")){
            $('.getAll').attr('value', 1);
        }else{
            $('.getAll').attr('value', 0);
        }
        var ids = $('input:checkbox:checked').map( function() {
            return this.id;
        }).get().join(",");
        $('#ids').val(ids);
    });

    $(".getAll").click(function () {
        var ids = $("[type=checkbox][value=1]:checked").map(function () {
            return this.id;}).get().join(",");
        $('#ids').val(ids);

    });

    $("#graduation").click(function () {
        if($('#graduation').is(":checked")){
            $("#transfer_batch_no").hide();
        }
    });
    $("#inter_batch").click(function () {
        if($('#inter_batch').is(":checked")){
            $("#transfer_batch_no").show();
        }
    });

    $(document.body).on('click', '#transfer_batch_btn', function(){
        $.ajax({
            url: $('#transfer_batch_form').attr('data-action'),
            type: 'post',
            data: $('#transfer_batch_form').serialize(),
            cache: false,
            success: function(response) {
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
            }
        });

        return false;
    });

    $(document.body).on('click', '.student_grade_link', function(){
        $('#student_id').val($(this).attr('data-href'));
        $( ".student_grade_link>li" ).addClass( "list-group-item-warning" );
        $( ".student_grade_link>li" ).removeClass( "active" );
        $(this).find("li").removeClass("list-group-item-warning").addClass( "active" );
        var term_id = $('#term_filter').val();
        $('#term_id').val(term_id);
        $.ajax({
            url: $(this).attr('data-action'),
            type: 'post',
            data: {student_id:$(this).attr('data-href'),term_id:term_id},
            cache: false,
            success: function(response) {
                $('#student_behaviour_score_model').empty();
                $('#student_behaviour_score_model').append(response.behaviour_score_html);
            }
        });

        return false;
    });
    
    $(document.body).on('change', '#term_filter', function(){
       var term_id = $('#term_filter').val();
       window.location.href = "<?php echo base_url().'batches/demographics/1?term_id=' ?>"+term_id;
       return false;
    });

</script>