<div class="content-wrapper" style="clear: both;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Fee Management</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">fee</a></li>
                        <li class="breadcrumb-item active">management</li>
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
                    <div class="card card-primary">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link" href="#npayment" data-toggle="tab">New Payment</a></li>
                                <li class="nav-item"><a class="nav-link <?php echo isset($active_tab)&&($active_tab=='payment')?'active':''; ?>" href="#payment" data-toggle="tab">Payments</a></li>
                                <li class="nav-item"><a class="nav-link" href="#expanse" data-toggle="tab">Expanses</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active show" id="npayment">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php  $this->load->view('fee/add_payment');?>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane <?php echo isset($active_tab)&&($active_tab=='payment')?'active show':''; ?>" id="payment">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php  $this->load->view('fee/list');?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="expanse">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php  //$this->load->view('attendance/teacher_attendance_report');?>
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
</div>
