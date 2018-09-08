<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Listing Classes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">classes</li>
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
                    <div id="class_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="class_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Classes</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#class_add"><i class="fa fa-plus"></i>New Course</a>
                                </div>
                            </div>
                            <table id="class-table" class="table table-bordered table-striped datatables">
                                <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Enabled?</th>
                                    <th data-orderable="false">Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($classes as $class) { ?>
                                    <tr>
                                        <td><?php echo $class['code']; ?></td>
                                        <td><?php echo $class['name']; ?></td>
                                        <td><?php echo ($class['enable']==1)?'Yes':'No';?></td>
                                        <td>
                                            <a class="edit-class btn btn-info btn-xs" data-enale="<?php echo $class['enable']; ?>"
                                               href="#" data-abbreviation="<?php echo $class['code'] ?>" data-value="<?php echo $class['name']; ?>" data-href="<?php echo $class['id']; ?>">Edit  <i class="fa fa-edit" title="Edit"></i></a>
                                            <a class="delete-class btn btn-danger btn-xs" href="#"
                                               data-href="<?php echo site_url('general_setting/delete_class/').$class['id'] ?>">Delete  <i class="fa fa-trash" title="Delete"></i></a>
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
<div class="modal fade" id="class_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">New Course</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="class_form_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="class_form_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <form id="class_form" method="post" role="form"
                  data-action="<?php echo site_url('general_setting/add_class') ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text"  name="name" class="form-control validate" placeholder="Class Name">
                    </div>
                    <div class="form-group">
                        <input type="text"  name="code" class="form-control validate" placeholder="Class Abbrevation">
                    </div>
                    <div class="checkbox">
                        <label><input name="enable" class="form-control" value="1" type="checkbox"> Is Enable?</label>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id="save_class" type="submit" class="btn btn-default">Create Class</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="class_update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
            <form id="class_update_form" method="post" role="form"
                  data-action="<?php echo site_url('general_setting/update_class') ?>" enctype="multipart/form-data">
                <input type="hidden" id="class_id" name="class_id">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" id="class_name" name="name" class="form-control validate" placeholder="Class Name">
                    </div>
                    <div class="form-group">
                        <input type="text" id="class_code" name="code" class="form-control validate" placeholder="Class Abbrevation">
                    </div>
                    <div class="checkbox">
                        <label><input name="enable" id="is_enabled" class="form-control" value="1" type="checkbox"> Is Enable?</label>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id="update_class" type="submit" class="btn btn-default">Update Employee Position</button>
                </div>
            </form>
        </div>
    </div>
</div>