<div class="teacher-content-wrapper">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>
        <div class="card-body">
            <form role="form" id="view_employee_form" method="post"
                  data-action="<?php echo site_url('attendance/view_register_employee'); ?>"
                  enctype="multipart/form-data">
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
                            <input type="text" class="form-control" id="emp_attendance_date" name="attendance_date"
                                   value="<?php echo isset($attendance_date) ? $attendance_date : ''; ?>"
                                   placeholder="date">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button id="view_emp_register" type="submit" class="btn btn-info btn-md">View Register</button>
                    </div>
                </div>
            </form>

            <?php if (!empty($employees)): ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="batch" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($employees as $employee): ?>
                                        <tr>
                                            <td><?php echo $employee['first_name'] . ' ' . $employee['middle_name']; ?></td>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input emp-radio-btn" type="radio"
                                                           name="attendance_status<?php echo $employee['employee_id']; ?>"
                                                           data-student-batch="<?php echo $employee['batch_id']; ?>"
                                                           data-action="<?php echo site_url('attendance/save_employee_attendance'); ?>"
                                                           data-attendance-status="present"
                                                           id="<?php echo $employee['employee_id']; ?>" value="present"
                                                        <?php echo isset($employee['astatus']) && ($employee['astatus'] == 'present') ? "checked" : 'checked' ?> >
                                                    <label class="form-check-label"
                                                           for="<?php echo $employee['employee_id']; ?>">Present</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input emp-radio-btn" type="radio"
                                                           name="attendance_status<?php echo $employee['employee_id']; ?>"
                                                           data-student-batch="<?php echo $employee['batch_id']; ?>"
                                                           data-action="<?php echo site_url('attendance/save_employee_attendance'); ?>"
                                                           data-attendance-status="late"
                                                           id="<?php echo $employee['employee_id']; ?>" value="late"
                                                        <?php echo isset($employee['astatus']) && ($employee['astatus'] == 'late') ? "checked" : '' ?> >
                                                    <label class="form-check-label"
                                                           for="<?php echo $employee['employee_id']; ?>">Late</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input emp-radio-btn" type="radio"
                                                           name="attendance_status<?php echo $employee['employee_id']; ?>"
                                                           data-student-batch="<?php echo $employee['batch_id']; ?>"
                                                           data-action="<?php echo site_url('attendance/save_employee_attendance'); ?>"
                                                           data-attendance-status="absent"
                                                           id="<?php echo $employee['employee_id']; ?>" value="absent"
                                                        <?php echo isset($employee['astatus']) && ($employee['astatus'] == 'absent') ? "checked" : '' ?> >
                                                    <label class="form-check-label"
                                                           for="<?php echo $employee['employee_id']; ?>">Absent</label>
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

        </div>

    </div>
</div>
<script>
    $('#attendance_date').datepicker({
        format: 'yyyy-mm-dd'
    });
</script>