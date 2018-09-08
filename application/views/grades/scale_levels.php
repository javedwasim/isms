<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Listing Grade Scale Levels</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">scale/levels</li>
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
                    <div id="assessment_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="assessment_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Grade Scale Levels</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">  
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="<?php echo site_url('grade_scale/grades')?>" class="btn btn-info btn-rounded mb-4"><i class="fa fa-angle-double-left"></i>Grades</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="" class="btn btn-default btn-rounded mb-4 pull-right" data-toggle="modal" data-target="#add_scale_level"><i class="fa fa-plus"></i>New Scale Level</a>
                                </div>
                            </div>
                            <table id="account-table" class="table table-bordered table-striped datatables" width="100%">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Min Percentage</th>
                                    <th>Remark</th>
                                    <th data-orderable="false">Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($scales as $scale){ ?>
                                        <tr>
                                            <td><?php echo $scale['name']; ?></td>
                                            <td><?php echo $scale['min_percentage']; ?></td>
                                            <td><?php echo $scale['remarks']; ?></td>
                                            <td>
                                                <a class="edit_grade_scale_level btn btn-info btn-xs"
                                                   data-name="<?php echo $scale['name']; ?>"
                                                   href="javascript:void(0)"
                                                   data-percent="<?php echo $scale['min_percentage'] ?>"
                                                   data-scale-id="<?php echo $scale['grade_scale_id'] ?>"
                                                   data-remaks="<?php echo $scale['remarks'] ?>"
                                                   data-href="<?php echo $scale['id']; ?>">Edit  <i class="fa fa-edit" title="Edit"></i></a>
                                                <a class="delete-grade-scale-level btn btn-danger btn-xs" href="javascript:void(0)"
                                                   data-href="<?php echo site_url('grade_scale/delete_scale_level/').$scale['id'] ?>">Delete  <i class="fa fa-trash" title="Delete"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content -->
<div class="modal fade" id="add_scale_level" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">New Grade Scale</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="grade_scale_add_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="grade_scale_add_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <form id="grade_scale_level_add_form" method="post" role="form"
                      data-action="<?php echo site_url('grade_scale/add_scale_level/'.$scale_id) ?>" enctype="multipart/form-data">
                    <input type="hidden" name="grade_scale_id" id="grade_scale_id" value="<?php echo $scale_id; ?>">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Min percentage:</label>
                        <input type="text" class="form-control" name="min_percentage" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Remarks:</label>
                        <textarea class="form-control" name="remarks"></textarea>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button id="save_scale_level" type="submit" class="btn btn-default">Save Scale</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_scale_level" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Update Grade Scale Level</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="grade_scale_add_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="grade_scale_add_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <div class="modal-body edit-modal-body">
                <form id="grade_scale_level_edit_form" method="post" role="form"
                      data-action="<?php echo site_url('grade_scale/update_scale_levels/') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="level_id" value="">
                    <input type="hidden" name="scale_id" id="scale_id" value="">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="level_name" name="level_name" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Min percentage:</label>
                        <input type="text" class="form-control" id="min_percentage" name="min_percentage" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Remarks:</label>
                        <textarea class="form-control" id="level_remarks" name="remarks"></textarea>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button id="update_scale_level" type="submit" class="btn btn-default">Save Scale</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
