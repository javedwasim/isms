<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Assessment Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Assessment/Categories</li>
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
                            <h3 class="card-title">Listing Assessment Categories</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">  
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#add_assessment_category"><i class="fa fa-plus"></i>New payment method</a>
                                </div>
                            </div>
                            <table id="account-table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Abbreviation</th>
                                    <th data-orderable="false">Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($assessments as $assessment){ ?>
                                        <tr>
                                            <td><?php echo $assessment['name']; ?></td>
                                            <td><?php echo $assessment['abbreviation']; ?></td>
                                            <td>
                                                <a class="edit-assessment-category btn btn-info btn-xs"
                                                   data-name="<?php echo $assessment['name']; ?>"
                                                   href="javascript:void(0)" data-abbreviation="<?php echo $assessment['abbreviation'] ?>"
                                                   data-href="<?php echo $assessment['id']; ?>">Edit  <i class="fa fa-edit" title="Edit"></i></a>
                                                <a class="delete-assessment-category btn btn-danger btn-xs" href="#"
                                                   data-href="<?php echo site_url('assessment/delete_assessment_category/').$assessment['id'] ?>">Delete  <i class="fa fa-trash" title="Delete"></i></a>
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
<div class="modal fade" id="add_assessment_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">New Assessment Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="assessment_category_add_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="assessment_category_add_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <form id="add_assessment_category_form" method="post" role="form"
                  data-action="<?php echo site_url('assessment/add_assessment_category') ?>" enctype="multipart/form-data">
                <div class="modal-body mx-3">
                    <div class="md-form mb-6">
                        <input type="text"  name="name" class="form-control validate">
                        <label><code>*</code>Name</label>
                    </div>
                    <div class="md-form mb-6">
                        <input type="text"  name="abbreviation" class="form-control validate" >
                        <label>Abbrevation</label>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id="save_assessment_category" type="submit" class="btn btn-default">Save Assessment Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="update_assessment_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Update Assessment Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="assessment_category_update_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="assessment_category_update_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <form id="update_assessment_category_form" method="post" role="form"
                  data-action="<?php echo site_url('assessment/update_assessment_category') ?>" enctype="multipart/form-data">
                <input type="hidden" name="assessment_category_id" id="assessment_category_id">
                <div class="modal-body mx-3">
                    <div class="form-group">
                        <label for="category_name" class="col-form-label">Description:</label>
                        <input type="text" id="assessment_category_name" name="name" class="form-control validate">

                    </div>
                    <div class="form-group">
                        <label for="category_abbreviation" class="col-form-label">Description:</label>
                        <input type="text" id="assessment_category_abbreviation" name="abbreviation" class="form-control validate" >

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button id="update_assessment" type="submit" class="btn btn-default">Save Assessment Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>