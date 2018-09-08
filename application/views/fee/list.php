<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#invoices" data-toggle="tab">Invoices</a></li>
                            <li class="nav-item"><a class="nav-link" href="#history" data-toggle="tab">History</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="invoices">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="fee_history" class="table table-bordered table-striped nowrap"
                                               style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Student</th>
                                                    <th>Batch</th>
                                                    <th>Title</th>
                                                    <th>Amount</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($payments as $payment):$session = $payment['session']; ?>
                                                    <tr>
                                                        <td><?php echo $payment['first_name']. ' '.$payment['last_name']; ?></td>
                                                        <td><?php echo $payment['code']. ' '.$payment['arm']."($session)"; ?></td>
                                                        <td><?php echo $payment['title']; ?></td>
                                                        <td><?php echo $payment['amount']; ?></td>
                                                        <td><?php echo $payment['amount_paid']; ?></td>
                                                        <td><?php echo $payment['status']; ?></td>
                                                        <td><?php echo $payment['date']; ?></td>
                                                        <td>
                                                            <a class="edit-fee-payment-btn btn btn-info btn-xs" href="javascript:void(0)"
                                                               data-action="<?php echo site_url('fee_management/edit_payment_view'); ?>"
                                                               data-payment-id="<?php echo $payment['id']; ?>"
                                                               data-batch-no="<?php echo $payment['batch_id']; ?>"
                                                               data-title="<?php echo $payment['title']; ?>"
                                                               data-description="<?php echo $payment['description']; ?>"
                                                               data-amount="<?php echo $payment['amount']; ?>"
                                                               data-amount-paid="<?php echo $payment['amount_paid']; ?>"
                                                               data-student-id="<?php echo $payment['student_id']; ?>"
                                                               data-fee="<?php echo $payment['date']; ?>"
                                                               data-method="<?php echo $payment['method']; ?>"
                                                               data-student-name="<?php echo $payment['first_name']. ' '.$payment['last_name']; ?>"
                                                               data-status="<?php echo $payment['status']; ?>">Edit</a>
                                                            <a class="delete-class btn btn-danger btn-xs" href="#" data-href="http://localhost/isms/general_setting/delete_class/3">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="history">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="fee_list" class="table table-bordered table-striped nowrap"
                                               style="width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Method</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($payments as $payment):$session = $payment['session']; ?>
                                                    <tr>
                                                        <td><?php echo $payment['title']; ?></td>
                                                        <td><?php echo $payment['description']; ?></td>
                                                        <td><?php echo $payment['method']; ?></td>
                                                        <td><?php echo $payment['amount']; ?></td>
                                                        <td><?php echo $payment['date']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>

    </div>
</section>
<div class="modal fade" id="fee_payment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Update Payment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row" style="padding: 20px 15px;">
                <div class="col-md-12" id="edit_payment"></div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#fee_history").DataTable({});
        $("#fee_list").DataTable({});
    });

</script>