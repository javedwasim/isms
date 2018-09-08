<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">&nbsp;</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">SMS</a></li>
                        <li class="breadcrumb-item active">View</li>
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
                        <div class="card-header">
                            <h3 class="card-title">SMS Message</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Widget: user widget style 2 -->
                                    <div class="card card-widget widget-user-2">
                                        <!-- Add the bg color to the header using any of the bg-* classes -->
                                        <div class="widget-user-header bg-gray-light">
                                            <h5 class="widget-user-desc">Message Detail</h5>
                                        </div>
                                        <div class="card-footer p-0">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <h6 href="#" class="nav-link">
                                                        Sender Name <span
                                                                class="float-right"><?php echo $sms_detail[0]['sender_name']; ?></span>
                                                    </h6>
                                                </li>
                                                <li class="nav-item">
                                                    <h6 href="#" class="nav-link">
                                                        Units Used <span class="float-right">1</span>
                                                    </h6>
                                                </li>
                                                <li class="nav-item">
                                                    <h6 href="#" class="nav-link">
                                                        Status <span class="float-right">Sent</span>
                                                    </h6>
                                                </li>
                                                <li class="nav-item">
                                                    <h6 href="#" class="nav-link">
                                                        Created by <span
                                                                class="float-right"><?php echo $sms_detail[0]['created_by']; ?></span>
                                                    </h6>
                                                </li>
                                                <li class="nav-item">
                                                    <h6 href="#" class="nav-link">
                                                        Created at <span
                                                                class="float-right"><?php echo date('F j, Y', strtotime($sms_detail[0]['created_at'])); ?></span>
                                                    </h6>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /.widget-user -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Widget: user widget style 2 -->
                                    <div class="card card-widget widget-user-2">
                                        <!-- Add the bg color to the header using any of the bg-* classes -->
                                        <div class="widget-user-header bg-gray-light">
                                            <h5 class="widget-user-desc">Message Detail</h5>
                                        </div>
                                        <div class="card-footer p-0">
                                            <h6><?php echo $sms_detail[0]['message']; ?></h6>
                                        </div>
                                    </div>
                                    <!-- /.widget-user -->
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="com-md-12">
                                    <table id="sms_table" class="table table-bordered table-striped nowrap"
                                           style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>User</th>
                                            <th>Status</th>
                                            <th>Error</th>
                                            <th>Units</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($sms_detail as $detail): ?>
                                            <tr>
                                                <td><?php echo $detail['mobile_phone']; ?></td>
                                                <td><?php echo $detail['UserName']; ?></td>
                                                <td>Sent</td>
                                                <td></td>
                                                <td>1</td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <!-- Modal -->
    </section>
</div>
<script>
    $(document).ready(function(){
        $("#sms_table").DataTable({});
    });
</script>
