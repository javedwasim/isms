<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Custom Payment Methods</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">custom payment methods</li>
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
                            <h3 class="card-title">Listing custom payment methods</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">  
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#add_payment"><i class="fa fa-plus"></i>New payment method</a>
                                </div>
                            </div>
                            <table id="account-table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Is incoming</th>
                                    <th data-orderable="false">Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($payments as $payment){ ?>
                                        <tr>
                                            <td><?php echo $payment['name']; ?></td>
                                            <td><?php echo $payment['description']; ?></td>
                                            <td><?php echo ($payment['is_incoming']==1)?'Yes':'No'; ?></td>
                                            <td>
                                                <a class="edit-payment btn btn-info btn-xs"
                                                   data-name="<?php echo $payment['name']; ?>"
                                                   href="javascript:void(0)" data-description="<?php echo $payment['description'] ?>"
                                                   data-incoming="<?php echo $payment['is_incoming']; ?>"
                                                   data-href="<?php echo $payment['id']; ?>">Edit  <i class="fa fa-edit" title="Edit"></i></a>
                                                <a class="delete-payment btn btn-danger btn-xs" href="#"
                                                   data-href="<?php echo site_url('finance/delete_payment/').$payment['id'] ?>">Delete  <i class="fa fa-trash" title="Delete"></i></a>
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
<div class="modal fade" id="add_payment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">New payment method</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="payment_add_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="payment_add_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <form id="add_payment_form" method="post" role="form"
                  data-action="<?php echo site_url('finance/add_payment') ?>" enctype="multipart/form-data">
                <div class="modal-body mx-3">
                    <div class="form-group">
                        <label><code>*</code>Name</label>
                        <input type="text"  name="name" class="form-control validate">

                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text"  name="description" class="form-control validate" >
                    </div>
                    <div class="form-group">
                        <label for="is-incoming" class="col-form-label">Is incoming?</label>
                        <input id="is-incoming" name="is_incoming" type="checkbox"/>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id="save_payment" type="submit" class="btn btn-default">Create custom payment method</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_payment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Edit payment method</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="payment_update_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="payment_update_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <form id="update_payment_form" method="post" role="form"
                  data-action="<?php echo site_url('finance/update_payment') ?>" enctype="multipart/form-data">
                <input type="hidden" name="payment_id" id="payment_id">
                <div class="modal-body mx-3">
                    <div class="form-group">
                        <label for="payment_name" class="col-form-label">Description:</label>
                        <input type="text" id="payment_name"  name="name" class="form-control validate">

                    </div>
                    <div class="form-group">
                        <label for="payment_description" class="col-form-label">Description:</label>
                        <input type="text" id="payment_description"  name="description" class="form-control validate" >

                    </div>
                    <div class="form-group">
                        <label for="is_incoming" class="col-form-label">Is incoming?</label>
                        <input id="is_incoming" name="is_incoming" type="checkbox"/>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id="update_payment" type="submit" class="btn btn-default">Update custom payment method</button>
                </div>
            </form>
        </div>
    </div>
</div>