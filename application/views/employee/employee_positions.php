<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Listing Employee Positions</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">guardian search</li>
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
                    <div id="employee_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="employee_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Employee Positions</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#employee_position_add"><i class="fa fa-plus"></i>New Employee position</a>
                                </div>
                            </div>
                            <table id="employee-table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Abbrevation</th>
                                    <th data-orderable="false">Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($positions as $position) { ?>
                                    <tr>
                                        <td><?php echo $position['name']; ?></td>
                                        <td><?php echo $position['abbrevation']; ?></td>
                                        <td>
                                            <a class="edit-employee-position btn btn-info btn-xs"
                                               href="#" data-abbreviation="<?php echo $position['abbrevation'] ?>" data-value="<?php echo $position['name']; ?>" data-href="<?php echo $position['id']; ?>">Edit  <i class="fa fa-edit" title="Edit"></i></a>
                                            <a class="delete-employee-position btn btn-danger btn-xs" href="#"
                                               data-href="<?php echo site_url('employee_setting/delete_position/').$position['id'] ?>">Delete  <i class="fa fa-trash" title="Delete"></i></a>
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
    </section>
</div>
<!-- /.content -->
<div class="modal fade" id="employee_position_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">New Employee Position</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="employee_position_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="employee_position_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <form id="employee_position_form" method="post" role="form"
                  data-action="<?php echo site_url('employee_setting/add_employee_position') ?>" enctype="multipart/form-data">
                <div class="modal-body mx-3">
                    <div class="md-form mb-6">
                        <input type="text" id="position_name" name="name" class="form-control validate" placeholder="position Name">
                    </div>
                    <hr/>
                    <div class="md-form mb-6">
                        <input type="text"  name="abbrevation" class="form-control validate" placeholder="position Abbrevation">
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id="save_employee_position" type="submit" class="btn btn-default">Create Employee position</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="employee_position_update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Update Employee Position</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="employee_cat_update_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="employee_cat_update_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <form id="employee_position_update_form" method="post" role="form"
                  data-action="<?php echo site_url('employee_setting/update_employee_position') ?>" enctype="multipart/form-data">
                <input type="hidden" id="position_id" name="position_id">
                <div class="modal-body mx-3">
                    <div class="md-form mb-6">
                        <input type="text" id="position_name_update" name="name" class="form-control validate" placeholder="position Name">
                    </div>
                    <hr>
                    <div class="md-form mb-6">
                        <input type="text" id="position_abbreviation" name="abbrevation" class="form-control validate" placeholder="position Abbrevation">
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id="update_employee_position" type="submit" class="btn btn-default">Update Employee Position</button>
                </div>
            </form>
        </div>
    </div>
</div>