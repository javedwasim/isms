<div class="emp-attendance-wrapper">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form role="form" id="emp_attendance_report_form" method="post"
                  data-action="<?php echo site_url('attendance/teacher_attendance_report'); ?>"
                  enctype="multipart/form-data">
                <input type="hidden" name="attendance_group" value="employee">
                <div class="row">
                    <div class="col-md-3">
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
                    <div class="col-md-3">
                        <select name="month" class="form-control" id="month">
                            <option>Select Month</option>
                            <option value="1"<?php echo isset($month)&&($month==1)?'selected':''; ?>>January</option>
                            <option value="2"<?php echo isset($month)&&($month==2)?'selected':''; ?>>February</option>
                            <option value="3"<?php echo isset($month)&&($month==3)?'selected':''; ?>>March</option>
                            <option value="4"<?php echo isset($month)&&($month==4)?'selected':''; ?>>April</option>
                            <option value="5"<?php echo isset($month)&&($month==5)?'selected':''; ?>>May</option>
                            <option value="6"<?php echo isset($month)&&($month==6)?'selected':''; ?>>June</option>
                            <option value="7"<?php echo isset($month)&&($month==7)?'selected':''; ?>>July</option>
                            <option value="8"<?php echo isset($month)&&($month==8)?'selected':''; ?>>August</option>
                            <option value="9"<?php echo isset($month)&&($month==9)?'selected':''; ?>>September</option>
                            <option value="10"<?php echo isset($month)&&($month==10)?'selected':''; ?>>October</option>
                            <option value="11"<?php echo isset($month)&&($month==11)?'selected':''; ?>>November</option>
                            <option value="12"<?php echo isset($month)&&($month==12)?'selected':''; ?>>December</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" name="year">
                            <option>Select Year</option>
                            <option value="2018"<?php echo isset($year)&&($year==2018)?'selected':''; ?>>2018</option>
                            <option value="2017"<?php echo isset($year)&&($year==2017)?'selected':''; ?>>2017</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button id="emp_attendance_report_btn" type="submit" class="btn btn-info btn-md">View Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <?php if (!empty($employees)): ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <small class='label pull-right bg-red'>A</small>

                            <table id="batch" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>
                                        <ul class="list-inline">
                                            <li class='list-inline-item'>1</li>
                                            <li class='list-inline-item'>2</li>
                                            <li class='list-inline-item'>3</li>
                                            <li class='list-inline-item'>4</li>
                                            <li class='list-inline-item'>5</li>
                                            <li class='list-inline-item'>6</li>
                                            <li class='list-inline-item'>7</li>
                                            <li class='list-inline-item'>8</li>
                                            <li class='list-inline-item'>9</li>
                                            <li class='list-inline-item'>10</li>
                                            <li class='list-inline-item'>11</li>
                                            <li class='list-inline-item'>12</li>
                                            <li class='list-inline-item'>13</li>
                                            <li class='list-inline-item'>14</li>
                                            <li class='list-inline-item'>15</li>
                                            <li class='list-inline-item'>16</li>
                                            <li class='list-inline-item'>17</li>
                                            <li class='list-inline-item'>18</li>
                                            <li class='list-inline-item'>19</li>
                                            <li class='list-inline-item'>20</li>
                                            <li class='list-inline-item'>21</li>
                                            <li class='list-inline-item'>22</li>
                                            <li class='list-inline-item'>23</li>
                                            <li class='list-inline-item'>24</li>
                                            <li class='list-inline-item'>25</li>
                                            <li class='list-inline-item'>26</li>
                                            <li class='list-inline-item'>27</li>
                                            <li class='list-inline-item'>28</li>
                                            <li class='list-inline-item'>29</li>
                                            <li class='list-inline-item'>30</li>
                                        </ul>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($employees as $employee): ?>
                                    <tr>
                                        <td><?php echo $employee['employee_name']; ?></td>
                                        <td>
                                            <ul class="list-inline">
                                                <?php
                                                $attendance_status = $employee['status'];
                                                $attendance_detail = explode(',', $attendance_status);
                                                //print_r($attendance_detail);
                                                foreach ($attendance_detail as $detail) {
                                                    $attendance = explode('=', $detail);
                                                    $timestamp = strtotime($attendance[0]);
                                                    $day = date('d', $timestamp);
                                                    if ($attendance[1] == 'absent') {
                                                        echo "<li class='list-inline-item'>
                                                                            <small class='label pull-right bg-red a-absent'>A</small></li>";
                                                    } elseif ($attendance[1] == 'present') {
                                                        echo "<li class='list-inline-item'><small class='label pull-right bg-green a-present'>P</small></li>";
                                                    } elseif($attendance[1] == 'late') {
                                                        echo "<li class='list-inline-item'><small class='label pull-right bg-warning a-late'>L</small></li>";
                                                    }
                                                }
                                                ?>
                                            </ul>
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