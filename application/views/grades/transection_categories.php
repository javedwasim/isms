<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Finance transaction categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">finance transaction categories</li>
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
                            <h3 class="card-title">Listing finance transaction categories
</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">  
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#new-transaction-categories"><i class="fa fa-plus"></i>New transaction categories</a>
                                </div>
                            </div>
                            <table class="table table-bordered table-striped datatables" width="100%">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th data-orderable="false">Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Food</td>
                                        <td>Description</td>
                                        <td>
                                            <a class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit-transaction-categories" 
                                               href="#" data-abbreviation="" data-value="" data-href="">Edit  <i class="fa fa-edit" title="Edit"></i></a>
                                            <a class="delete-employee-position btn btn-danger btn-xs" href="#"
                                               data-href="">Delete  <i class="fa fa-trash" title="Delete"></i></a>
                                        </td>
                                    </tr>
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
<div class="modal fade" id="new-transaction-categories" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">New finance transaction category</h4>
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
            <form id="new-transaction-categories-form" method="post" role="form"
                  data-action="<?php echo site_url('') ?>" enctype="multipart/form-data">
                <div class="modal-body mx-3">
                    <div class="md-form mb-6">
                        <input type="text" id="transection-name" name="name" class="form-control validate">
                        <label><code>*</code>Name</label>
                    </div>
                    <div class="md-form mb-6">
                        <input type="text"  name="transection_discription" class="form-control validate" >
                        <label>Description</label>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id="save-transection" type="submit" class="btn btn-default">Create finance transaction category</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-transaction-categories" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Edit finance transaction category</h4>
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
            <form id="update-transaction-categories-form" method="post" role="form"
                  data-action="<?php echo site_url('') ?>" enctype="multipart/form-data">
                <div class="modal-body mx-3">
                    <div class="md-form mb-6">
                        <input type="text" id="edit-transaction-name" name="name" class="form-control validate">
                        <label><code>*</code>Name</label>
                    </div>
                    <div class="md-form mb-6">
                        <input type="text"  name="edit-transaction-description" class="form-control validate" >
                        <label>Description</label>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id="update-transaction-categories" type="submit" class="btn btn-default">Update finance transaction category</button>
                </div>
            </form>
        </div>
    </div>
</div>