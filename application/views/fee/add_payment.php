<form role="form" id="add_fee_payment_form" method="post" action="<?php echo site_url('fee_management/update_payment'); ?>"
      data-action="<?php echo site_url('fee_management/add_payment'); ?>" enctype="multipart/form-data">
    <div class="row">
        <input type="hidden" name="payment_id" value="<?php echo isset($payment_id)?$payment_id:''; ?>" >
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Invoice details</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <div class="form-group">
                        <label for="batch_id">Batch</label>
                        <select class="custom-select custom-select-md" onchange="add_payment($(this).val())"
                                name="batch_id" id="batch_id" <?php echo !empty($batch_id)?'':''; ?>>
                            <option>Please select student</option>
                            <?php foreach ($batches as $batch):$session = $batch['session']; ?>
                                <option value="<?php echo $batch['id']; ?>"<?php echo $batch_id == $batch['id'] ? 'selected' : '' ?>>
                                    <?php echo $batch['code'] . '-' . $batch['arm'] . "($session)"; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="student_id">Student</label>
                        <select class="custom-select custom-select-md batch-students"
                                name="student_id" id="student_id" <?php echo isset($student_id)?'':''; ?>>
                            <option>Please select student</option>
                            <?php foreach ($students as $student): ?>
                                <option value="<?php echo $student['student_id'];?>"
                                    <?php echo isset($student_id)&&($student_id==$student['student_id'])?'selected':''; ?>>
                                    <?php echo $student['first_name'].' '.$student['last_name'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?php echo isset($title)?$title:''; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" required="" rows="5" name="description"><?php echo isset($description)?$description:''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="fee_date">Date</label>
                        <input type="text" class="form-control" id="date" name="date" value="<?php echo isset($fee_date)?$fee_date:''; ?>" />
                    </div>
                </div>
            </div>
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Payment details</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Total</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="amount" name="amount" value="<?php echo isset($amount)?$amount:''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="amount_paid" class="col-sm-3 control-label">Amount</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="amount_paid" name="amount_paid" value="<?php echo isset($amount_paid)?$amount_paid:''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" required="" name="status" id="status">
                                <option value="">Select</option>
                                <option value="completed"<?php echo isset($status)&&($status=='completed')?'selected':''; ?>>Completed</option>
                                <option value="pending"<?php echo isset($status)&&($status=='pending')?'selected':''; ?>>Pending</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="method" class="col-sm-3 control-label">Method</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="method" id="method" <?php echo isset($method)?'disabled':''; ?>>
                                <option value="">Select</option>
                                <option value="card"<?php echo isset($method)&&($method=='card')?'selected':''; ?>>Card</option>
                                <option value="cash"<?php echo isset($method)&&($method=='cash')?'selected':''; ?>>Cash</option>
                                <option value="check"<?php echo isset($method)&&($method=='check')?'selected':''; ?>>Check</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" id="<?php echo isset($payment_id)?'':'add_fee_payment_btn'; ?>" class="btn btn-success">
                        <i class="fa fa-save"></i><?php echo isset($payment_id)?'Update invoice':'Create invoice'; ?></button>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (right) -->
    </div>
</form>
<script>
    $(document).ready(function () {
        $('#date').datepicker({
            format: 'yyyy-mm-dd'
        });
    });
    function add_payment(value) {
        $.ajax({
            url: '/isms/fee_management/get_batch_students',
            data: {batch_id:value},
            type: 'post',
            cache: false,
            success: function (response) {
                if (response.employee_html != '') {
                    $('.batch-students').empty();
                    $('.batch-students').append(response);
                }
            }
        });
    }

</script>