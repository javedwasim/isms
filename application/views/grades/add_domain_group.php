<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <?php if(isset($domain_id)){ ?>
                            Update Behavioural Domain Group
                        <?php }else{ ?>
                            New Behavioural Domain Group
                        <?php } ?>

                    </h1>
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
                            <h3 class="card-title">
                                <?php if(isset($domain_id)){ ?>
                                    Update Domain Group
                                <?php } else{?>
                                    Add Domain Group
                                <?php } ?>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-body">
                                <form id="domain_group_form" method="post" role="form" action="<?php echo site_url('domains/save_domain_group') ?>"
                                      data-action="<?php echo site_url('domains/save_domain_group') ?>" enctype="multipart/form-data">
                                    <input type="hidden" name="domaingroup_id" value="<?php echo isset($domain_id)?$domain_id:''; ?>">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Name:</label>
                                        <input type="text" class="form-control"  name="name"
                                               value="<?php echo isset($domain['name'])?$domain['name']:''; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Learning Domain:</label>
                                        <select class="custom-select custom-select-lg" name="learning_domain">
                                            <option value=""></option>
                                            <option value="affective"<?php echo isset($domain['learning_domain'])&&($domain['learning_domain']=='affective')?'selected':''; ?>>Affective</option>
                                            <option value="psychomotor"<?php echo isset($domain['learning_domain'])&&($domain['learning_domain']=='psychomotor')?'selected':''; ?>>Psychomotor</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Grade Scale:</label>
                                        <select class="custom-select custom-select-lg" name="grade_scale_id">
                                            <option value=""></option>
                                            <?php foreach ($grades as $grade){ ?>
                                                <option value="<?php echo $grade['id']; ?>"<?php echo isset($domain['grade_scale_id'])&&($domain['grade_scale_id']==$grade['id'])?'selected':''; ?>><?php echo $grade['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Description:</label>
                                        <textarea class="form-control" name="description" rows="5"><?php echo isset($domain['description'])?$domain['description']:''; ?></textarea>
                                    </div>


                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Domain Indicators</label>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6">

                                    <a href="javascript:void(0)" class="btn btn-info btn-rounded mb-4" data-toggle="modal" data-target="#add_domain_group_indicator">
                                        <i class="fa fa-plus"></i>  Add Domain Indicator</a>
                                </div>
                            </div>
                            <div class="domain_indicator_table">
                                <table id="account-table" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Abbreviation</th>
                                        <th>Description</th>
                                        <th data-orderable="false">Operations</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($indicators as $indicator){ ?>
                                        <tr>
                                            <td><?php echo $indicator['name'] ?></td>
                                            <td><?php echo $indicator['code'] ?></td>
                                            <td><?php echo $indicator['description'] ?></td>
                                            <td>
                                                <a class="edit-domain-group-indicator btn btn-info btn-xs"
                                                   data-name="<?php echo $indicator['name']; ?>"
                                                   href="javascript:void(0)"
                                                   data-code="<?php echo $indicator['code'] ?>"
                                                   data-description="<?php echo $indicator['description'] ?>"
                                                   data-domain-id="<?php echo isset($domain_id)?$domain_id:''; ?>"
                                                   data-href="<?php echo $indicator['id']; ?>">Edit  <i class="fa fa-edit" title="Edit"></i></a>
                                                <a class="delete-domain-group-indicator btn btn-danger btn-xs" href="javascript:void(0)"
                                                   data-domain-id="<?php echo isset($domain_id)?$domain_id:''; ?>"
                                                   data-delete-id="<?php echo $indicator['id']; ?>"
                                                   data-href="<?php echo site_url('domains/delete_domain_indicator') ?>">Delete  <i class="fa fa-trash" title="Delete"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button id="save_domain_group" type="submit" class="btn btn-default">Save Assessment Category</button>
                            </div>
                        </form>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content -->

<div class="modal fade" id="add_domain_group_indicator" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">New Domain Indicator</h4>
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
                <form id="add_domain_indicator_form" method="post" role="form"
                      data-action="<?php echo site_url('domains/add_domain_indicator') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="domain_group_id" value="<?php echo isset($domain_id)&&($domain_id>0)?$domain_id:''; ?>">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control"  name="name" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Abbreviation:</label>
                        <input type="text" class="form-control"  name="code" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description:</label>
                        <textarea class="form-control" name="description" rows="5"></textarea>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button id="save_domain_indicator" type="submit" class="btn btn-default">Save Domain Indicator</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_domain_group_indicator" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Update Domain Indicator</h4>
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
                <form id="edit_domain_indicator_form" method="post" role="form"
                      data-action="<?php echo site_url('domains/update_domain_indicator') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="indicator_id">
                    <input type="hidden" name="domain_id" id="domain_id">
                    <input type="hidden" name="status" id="status_id" value="<?php echo isset($indicator_status)?$indicator_status:''; ?>">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="indicator_name"  name="name" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Abbreviation:</label>
                        <input type="text" class="form-control" id="indicator_code"  name="code" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description:</label>
                        <textarea class="form-control" id="indicator_description" name="description" rows="5"></textarea>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button id="update_domain_indicator" type="submit" class="btn btn-default">Update Domain Indicator</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>