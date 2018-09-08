<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Behavioural Domain Groups</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">grades/domains</li>
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
                    <div id="domain_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="domain_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Listing Domain Groups</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">  
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="<?php echo site_url('domains/add_domain_group_view/'); ?>" class="btn btn-default btn-rounded mb-4">
                                        <i class="fa fa-plus"></i> Add Behavioural Domain Group</a>
                                </div>
                            </div>
                            <table id="account-table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th data-orderable="false">Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($domains as $domain){ ?>
                                        <tr>
                                            <td><?php echo $domain['name']; ?></td>
                                            <td><?php echo $domain['learning_domain']; ?></td>
                                            <td><?php echo $domain['description']; ?></td>
                                            <td><?php echo 'active' ?></td>
                                            <td>
                                                <a class="btn btn-info btn-xs"
                                                   href="<?php echo site_url('domains/edit_domain_group_view/').$domain['id']; ?>">
                                                   Edit<i class="fa fa-edit" title="Edit"></i>
                                                </a>
                                                <a class="delete-assessment-category btn btn-danger btn-xs" href="#"
                                                   data-href="<?php echo site_url('assessment/delete_assessment_category/').$domain['id'] ?>">Delete  <i class="fa fa-trash" title="Delete"></i></a>
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
    <?php
        $message = $this->session->flashdata('success');
        if(isset($message)):?>
            <script>
                $(document).ready(function() {
                    toastr["success"]("<?php echo $message; ?>");
                });
            </script>
    <?php endif; ?>
</div>
<!-- /.content -->
<div class="modal fade" id="add_domain_group" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">New Domain Group</h4>
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
            <div class="modal-body">
                <form id="add_assessment_category_form" method="post" role="form"
                      data-action="<?php echo site_url('domains/add_domain_group') ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control"  name="name" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Grade scale type:</label>
                        <select class="custom-select custom-select-lg mb-3" name="type">
                            <option value="">Please Select</option>
                            <option value="cognitive">Cognitive</option>
                            <option value="behavioural">Behavioural</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description:</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button id="save_assessment_category" type="submit" class="btn btn-default">Save Assessment Category</button>
                    </div>
                </form>
            </div>
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