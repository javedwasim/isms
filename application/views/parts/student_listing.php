<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Students</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">students</li>
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
                    <div id="student_error" style="display: none;" class="alert alert-danger alert-dismissible"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="student_success" style="display: none;" class="alert alert-success alert-dismissible"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Students</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary"
                                            id="list_itmes_add_student" data-func-call="add_student">
                                        <i class="fa fa-plus"></i>Add Student
                                    </button>
                                </div>
                                <div class="col-md-3 offset-md-5">
                                    <div class="form-group float-right">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="" class="show-more">
                                                Show more</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <form rol="form" style="width: 100%;" id="student_form_filters">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Search</label>
                                            <input type="text" name="search-employee" id="search-employee"
                                                   onchange="student_filters()" class="form-control"
                                                   value="<?php echo isset($filters['search-employee']) ? $filters['search-employee'] : ''; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status" onchange="student_filters()">
                                                <option value="">Please select</option>
                                                <option value="1"
                                                    <?php echo isset($filters['status']) && ($filters['status'] == 1) ? 'selected' : ''; ?>>
                                                    Active
                                                </option>
                                                <option value="2"
                                                    <?php echo isset($filters['status']) && ($filters['status'] == 2) ? 'selected' : ''; ?>>
                                                    Graduated
                                                </option>
                                                <option value="3"
                                                    <?php echo isset($filters['status']) && ($filters['status'] == 3) ? 'selected' : ''; ?>>
                                                    Dropped
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Batch</label>
                                            <select prompt="Select Batch" class="form-control"
                                                    required="required" name="batch_no" onchange="student_filters()">
                                                <option value=""></option>
                                                <?php $priorGroup = "";
                                                foreach ($batches

                                                as $batch){ ?>
                                                <?php if ($batch["session"] != $priorGroup){ ?>
                                                <optgroup label="<?php echo $batch['session']; ?>">
                                                    <?php } ?>
                                                    <option value="<?php echo $batch['id']; ?>"<?php echo isset($filters['batch_no']) && ($filters['batch_no'] == $batch['id']) ? 'selected' : ''; ?> >
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
                                    <div class="col-md-3 filter-toggle">
                                        <div class="form-group">
                                            <label>Course</label>
                                            <select class="form-control">
                                                <option value="">Please select</option>
                                                <option>c1</option>
                                                <option>c2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 filter-toggle">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control" name="gender" onchange="student_filters()">
                                                <option value="">Please select</option>
                                                <option value="Male"<?php echo isset($filters['gender']) && ($filters['gender'] == 'Male') ? 'selected' : ''; ?>>
                                                    Male
                                                </option>
                                                <option value="Female"<?php echo isset($filters['gender']) && ($filters['gender'] == 'Female') ? 'selected' : ''; ?>>
                                                    Female
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 filter-toggle">
                                        <div class="form-group">
                                            <label>Student Category</label>
                                            <select class="form-control">
                                                <option value="">All</option>
                                                <option value="3">Islamiya</option>
                                                <option value="1">hostal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 filter-toggle">
                                        <div class="form-group">
                                            <label>Due Fee Balance</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <select class="form-control">
                                                        <option value="">&gt;</option>
                                                        <option value="3">&lt;</option>
                                                    </select>
                                                </div>
                                                <input type="text" class="form-control"
                                                       aria-label="Text input with dropdown button">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 filter-toggle">
                                        <div class="form-group">
                                            <label>Wallet balance</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <select class="form-control">
                                                        <option value="">&gt;</option>
                                                        <option value="3">&lt;</option>
                                                    </select>
                                                </div>
                                                <input type="text" class="form-control"
                                                       aria-label="Text input with dropdown button">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 filter-toggle">
                                        <label>Date Admitted</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                            <input type="text" class="form-control datepicker" id="admit_date"
                                                   name="admit_date" onchange="student_filters()"
                                                   value="<?php echo isset($filters['admit_date']) ? $filters['admit_date'] : ''; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3 filter-toggle">
                                        <label>Date of Birth</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                            <input type="text" class="form-control datepicker" id="emp-li-dob"
                                                   name="dob" onchange="student_filters()"
                                                   value="<?php echo isset($filters['dob']) ? $filters['dob'] : ''; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mt-3">
                                            <button type="button" class="btn btn-info btn-md" id="filter"><i
                                                        class="fa fa-search"></i>Search
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
                                                class="fa fa-print"></i>Print PDF
                                    </button>
                                </div>
                            </div>
                            <hr>
                            <table id="student-b-table" class="table table-bordered table-striped nowrap"
                                   style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th class="visibility">Address</th>
                                    <th>Adm. Date</th>
                                    <th>Batch</th>
                                    <th class="visibility">Blood grp.</th>
                                    <th class="visibility">Course set</th>
                                    <th class="visibility">Date left</th>
                                    <th class="visibility">D.O.B</th>
                                    <th class="visibility">Due fees</th>
                                    <th class="visibility">Email</th>
                                    <th class="visibility">Last Updated</th>
                                    <th class="visibility">Mobile</th>
                                    <th class="visibility">Nationality</th>
                                    <th class="visibility">Phone</th>
                                    <th class="visibility">Reg. started</th>
                                    <th class="visibility">Religion</th>
                                    <th class="visibility">Wallet bal.</th>
                                    <th data-orderable="false">Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($students as $student) { ?>
                                    <tr>
                                        <td>
                                            <a class="prof-link"
                                               href="<?php echo site_url('students/student_profile/') . $student['student_id'] ?>"><?php echo $student['surname'] . ', ' . $student['first_name'] ?></a>
                                        </td>
                                        <td class="visibility">
                                            <?php echo $student['address_line']; ?>
                                        </td>
                                        <td>
                                            <?php echo date('F d, Y', strtotime($student['admission_date'])) ?>
                                        </td>
                                        <td>
                                            <?php echo $student['code'] . '-' . $student['arm'] . '(' . $student['session'] . ')' ?>
                                        </td>
                                        <td class="visibility">
                                            <?php echo $student['blood_group']; ?>
                                        </td>
                                        <td class="visibility">

                                        </td>
                                        <td class="visibility">

                                        </td>
                                        <td class="visibility">
                                            <?php echo $student['date_of_birth']; ?>
                                        </td>
                                        <td class="visibility">

                                        </td>
                                        <td class="visibility">
                                            <?php echo $student['email']; ?>
                                        </td>
                                        <td class="visibility">
                                            <?php echo $student['updated']; ?>
                                        </td>
                                        <td class="visibility">
                                            <?php echo $student['mobile_phone']; ?>
                                        </td>
                                        <td class="visibility">
                                            <?php echo $student['nationality']; ?>
                                        </td>
                                        <td class="visibility">
                                            <?php echo $student['phone']; ?>
                                        </td>
                                        <td class="visibility">

                                        </td>
                                        <td class="visibility">
                                            <?php echo $student['religion']; ?>
                                        </td>
                                        <td class="visibility">

                                        </td>
                                        <td>
                                            <div class="material-switch pull-right">
                                                <input id="<?php echo "s".$student['student_id']; ?>" name="<?php echo "s".$student['student_id']; ?>"
                                                       type="checkbox" class="select-student"
                                                       data-student-id = "<?php  echo $student['student_id'];  ?>"
                                                       data-action="<?php echo site_url('students/select_student') ?>" />
                                                <label for="<?php  echo "s".$student['student_id'];  ?>" class="label-info switch"></label>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Student List PDF options</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="" class="form-control" placeholder="Stident List"
                                           maxlength="15">
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>Show numbering</label>
                                        <input type="checkbox" data-toggle="toggle">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12 mb-3">
                                <h5>Fields to show</h5>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Address</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Batch</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Class set</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Date of birth</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Email</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Mobile phone</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Phone</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Religion</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Admission date</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Blood group</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Date left</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Due fees balance</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Last updated</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Nationality</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Registration started</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Wallet balance</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-6 text-center">
                            <a href="<?php echo base_url(); ?>students/createPdf" target="_blank" type="button"
                               class="btn btn-primary">Generate PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
    $(document).ready(function () {
        $(document.body).on('click', '#list_itmes_add_student', function(){
            get_students($(this).attr('data-func-call'));
        });
    });
    $(function() {
        $('#toggle-event').change(function() {
            $('#console-event').html('Toggle: ' + $(this).prop('checked'))
        });
    });
</script>