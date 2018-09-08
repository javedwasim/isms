<div class="student-content-wrapper">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form role="form" id="view_register_form" method="post"
                  data-action="<?php echo site_url('attendance/view_register'); ?>" enctype="multipart/form-data">
                <!-- select -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control" name="batch">
                                <option>Select Batch</option>
                                <?php foreach ($batches as $batch):$session = $batch['session']; ?>
                                    <option value="<?php echo $batch['id']; ?>"<?php echo $batch_id == $batch['id'] ? 'selected' : '' ?>>
                                        <?php echo $batch['code'] . '-' . $batch['arm'] . "($session)"; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" id="attendance_date" name="attendance_date"
                                   value="<?php echo isset($attendance_date) ? $attendance_date : ''; ?>"
                                   placeholder="date">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button id="view_register" type="submit" class="btn btn-info btn-md">View Register</button>
                    </div>
                </div>
            </form>
        </div>
        <?php if (!empty($students)): ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="batch" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($students as $student): ?>
                                    <tr>
                                        <td><?php echo $student['first_name'] . ' ' . $student['last_name']; ?></td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input st-radio-btn" type="radio"
                                                       name="attendance_status<?php echo $student['student_id']; ?>"
                                                       data-student-batch="<?php echo $student['batch_no']; ?>"
                                                       data-action="<?php echo site_url('attendance/save_student_attendance'); ?>"
                                                       data-attendance-status="present"
                                                       id="<?php echo $student['student_id']; ?>" value="present"
                                                    <?php echo isset($student['astatus']) && ($student['astatus'] == 'present') ? "checked" : 'checked' ?> >
                                                <label class="form-check-label"
                                                       for="<?php echo $student['student_id']; ?>">Present</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input st-radio-btn" type="radio"
                                                       name="attendance_status<?php echo $student['student_id']; ?>"
                                                       data-student-batch="<?php echo $student['batch_no']; ?>"
                                                       data-action="<?php echo site_url('attendance/save_student_attendance'); ?>"
                                                       data-attendance-status="late"
                                                       id="<?php echo $student['student_id']; ?>" value="late"
                                                    <?php echo isset($student['astatus']) && ($student['astatus'] == 'late') ? "checked" : '' ?> >
                                                <label class="form-check-label"
                                                       for="<?php echo $student['student_id']; ?>">Late</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input st-radio-btn" type="radio"
                                                       name="attendance_status<?php echo $student['student_id']; ?>"
                                                       data-student-batch="<?php echo $student['batch_no']; ?>"
                                                       data-action="<?php echo site_url('attendance/save_student_attendance'); ?>"
                                                       data-attendance-status="absent"
                                                       id="<?php echo $student['student_id']; ?>" value="absent"
                                                    <?php echo isset($student['astatus']) && ($student['astatus'] == 'absent') ? "checked" : '' ?> >
                                                <label class="form-check-label"
                                                       for="<?php echo $student['student_id']; ?>">Absent</label>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
        <?php endif; ?>
        <!-- /.card-body -->
    </div>
</div>

<script>
    $('#attendance_date').datepicker({
        format: 'yyyy-mm-dd'
    });
</script>