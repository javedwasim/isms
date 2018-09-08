<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Fee types</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">fee types</li>
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
                        <div class="card-header">
                            <h3 class="card-title">Listing Fee Types</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">  
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#add_fee"><i class="fa fa-plus"></i>New Fee Types</a>
                                </div>
                            </div>
                            <table id="account-table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th data-orderable="false">Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($fees as $fee){ ?>
                                        <tr>
                                            <td><?php echo $fee['name']; ?></td>
                                            <td><?php echo $fee['description']; ?></td>
                                            <td>
                                                <a class="edit-fee btn btn-info btn-xs"
                                                   href="javascript:void(0)"
                                                   data-href="<?php echo $fee['id']; ?>"
                                                   data-name="<?php echo $fee['name']; ?>"
                                                   data-description="<?php echo $fee['description']; ?>">
                                                   Edit  <i class="fa fa-edit" title="Edit"></i></a>
                                                <a class="delete-fee btn btn-danger btn-xs" href="javascript:void(0)"
                                                   data-href="<?php echo site_url('finance/delete_fee/').$fee['id'] ?>">Delete<i class="fa fa-trash" title="Delete"></i></a>
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
<div class="modal fade" id="add_fee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">New fee type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="fee_form_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="fee_form_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <form id="add_fee_form" method="post" role="form"
                  data-action="<?php echo site_url('finance/add_fee') ?>" enctype="multipart/form-data">
                <div class="modal-body mx-3">
                    <div class="md-form mb-6">
                        <input type="text"  name="name" class="form-control validate">
                        <label><code>*</code>Name</label>
                    </div>
                    <div class="md-form mb-6">
                        <input type="text"  name="description" class="form-control validate" >
                        <label>Description</label>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id="save_fee" type="submit" class="btn btn-default">Create Fee type</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_fee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Edit fee type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="edit_form_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="edit_form_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <form id="update_fee_form" method="post" role="form"
                  data-action="<?php echo site_url('finance/update_fee') ?>" enctype="multipart/form-data">
                <input type="hidden" name="fee_id" id="fee_id">
                <div class="modal-body mx-3">
                    <div class="form-group">
                        <label for="fee_name-name" class="col-form-label">Name:</label>
                        <input type="text"  id="fee_name" name="name" class="form-control validate">
                    </div>
                    <div class="form-group">
                        <label for="fee_description" class="col-form-label">Description:</label>
                        <textarea class="form-control" id="fee_description" name="description"></textarea>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id="update_fee" type="submit" class="btn btn-default">Update Fee type</button>
                </div>
            </form>
        </div>
    </div>
</div>

