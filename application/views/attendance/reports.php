<div class="content-wrapper" style="clear: both;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Attendance Reports</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">attendance</a></li>
                        <li class="breadcrumb-item active">register</li>
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
                                <li class="nav-item"><a class="nav-link active" href="#sretport" data-toggle="tab">Student Attendance Report</a></li>
                                <li class="nav-item"><a class="nav-link <?php echo isset($active_tab)&&($active_tab=='tretport')?'active':''; ?>" href="#tretport" data-toggle="tab">Teacher Attendance Report</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active show" id="sretport">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php  $this->load->view('attendance/student_attendance_report');?>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tretport">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php  $this->load->view('attendance/teacher_attendance_report');?>
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
