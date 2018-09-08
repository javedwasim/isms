<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Academic Sessions</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">academic sessions</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid --->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Listing Academic Sessions</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="session_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              </div>
              <div id="session_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#session_add"><i class="fa fa-plus"></i> New Academic Sessions</button>
                </div>
              </div>
              <hr>
              <table class="table table-bordered table-striped datatables" >
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>First Term Begins</th>
                    <th>First Term Ends</th>
                    <th>Second Term Begins</th>
                    <th>Second Term Ends</th>
                    <th>Third Term Begins</th>
                    <th>Third Term Ends</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach ($sessions as $session) { ?>
                      <tr>
                        <td><?php echo $session['name']; ?></td>
                        <td><?php echo date('F j, Y',strtotime($session['first_term_start'])); ?></td>
                        <td><?php echo date('F j, Y',strtotime($session['first_term_end'])); ?></td>
                        <td><?php echo date('F j, Y',strtotime($session['second_term_start'])); ?></td>
                        <td><?php echo date('F j, Y',strtotime($session['second_term_end'])); ?></td>
                        <td><?php echo date('F j, Y',strtotime($session['third_term_start'])); ?></td>
                        <td><?php echo date('F j, Y',strtotime($session['third_term_end'])); ?></td>
                        <td>
                        <a class="edit-session btn btn-info btn-xs"
                           data-first-term-start = "<?php echo $session['first_term_start']; ?>"
                           data-first-term-end = "<?php echo $session['first_term_end']; ?>"
                           data-second-term-start = "<?php echo $session['second_term_start']; ?>"
                           data-second-term-end = "<?php echo $session['second_term_end']; ?>"
                           data-third-term-start = "<?php echo $session['third_term_start']; ?>"
                           data-third-term-end = "<?php echo $session['third_term_end']; ?>"
                           href="#"  data-value="<?php echo $session['name']; ?>"
                           data-href="<?php echo $session['id']; ?>">
                            Edit<i class="fa fa-edit" title="Edit"></i></a>
                        <a class="delete-session btn btn-danger btn-xs" href="#"
                           data-href="<?php echo site_url('general_setting/delete_session/').$session['id'] ?>">Delete  <i class="fa fa-trash" title="Delete"></i></a>

                        </td>
                      </tr>
                    <?php }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<div class="container">
    <div class="modal fade" id="session_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="session_form" method="post" role="form"
                  data-action="<?php echo site_url('general_setting/add_session') ?>" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">New Academic Session</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-3">
                            <input type="text"  name="name" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="defaultForm-name"><code>*</code>Name</label>
                        </div>
                    </div>
                    <h5 class="ml-1"><code>*</code>First Term</h5>
                    <div class="row modal-body ml-1 mr-1">
                        <div class="col-md-6" style="padding: 0px;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text"  name="first_term_start" class="form-control datepicker" />
                            </div>
                        </div>
                        <div class="col-md-6" style="padding: 0px;">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="font-size: 12px;">to</span>
                                </div>
                                <input type="text"  name="first_term_end" class="form-control datepicker" />
                            </div>
                        </div>
                    </div>
                    <h5 class="ml-1"><code>*</code>Second Term</h5>
                    <div class="row modal-body ml-1 mr-1">
                        <div class="col-md-6" style="padding: 0px;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text"  name="second_term_start" class="form-control datepicker" />
                            </div>
                        </div>
                        <div class="col-md-6" style="padding: 0px;">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="font-size: 12px;">to</span>
                                </div>
                                <input type="text"  name="second_term_end"  class="form-control datepicker" />
                            </div>
                        </div>
                    </div>
                    <h5 class="ml-1"><code>*</code>Third Term</h5>
                    <div class="row modal-body ml-1 mr-1">
                        <div class="col-md-6" style="padding: 0px;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text"  name="third_term_start" class="form-control datepicker" />
                            </div>
                        </div>
                        <div class="col-md-6" style="padding: 0px;">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="font-size: 12px;">to</span>
                                </div>
                                <input type="text"  name="third_term_end" class="form-control datepicker" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button id="save_session" class="btn btn-default">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="modal fade" id="session_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="session_update_form" method="post" role="form"
                  data-action="<?php echo site_url('general_setting/update_session') ?>" enctype="multipart/form-data">
                <input type="hidden" id="session_id" name="session_id">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Update Academic Session</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-3">
                            <input type="text" id="name" name="name" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="defaultForm-name"><code>*</code>Name</label>
                        </div>
                    </div>
                    <h5 class="ml-1"><code>*</code>First Term</h5>
                    <div class="row modal-body ml-1 mr-1">
                        <div class="col-md-6" style="padding: 0px;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="first_term_start" name="first_term_start" class="form-control datepicker" />
                            </div>
                        </div>
                        <div class="col-md-6" style="padding: 0px;">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="font-size: 12px;">to</span>
                                </div>
                                <input type="text" id="first_term_end" name="first_term_end" class="form-control datepicker" />
                            </div>
                        </div>
                    </div>
                    <h5 class="ml-1"><code>*</code>Second Term</h5>
                    <div class="row modal-body ml-1 mr-1">
                        <div class="col-md-6" style="padding: 0px;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="second_term_start" name="second_term_start" class="form-control datepicker" />
                            </div>
                        </div>
                        <div class="col-md-6" style="padding: 0px;">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="font-size: 12px;">to</span>
                                </div>
                                <input type="text" id="second_term_end" name="second_term_end"  class="form-control datepicker" />
                            </div>
                        </div>
                    </div>
                    <h5 class="ml-1"><code>*</code>Third Term</h5>
                    <div class="row modal-body ml-1 mr-1">
                        <div class="col-md-6" style="padding: 0px;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="third_term_start" name="third_term_start" class="form-control datepicker" />
                            </div>
                        </div>
                        <div class="col-md-6" style="padding: 0px;">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="font-size: 12px;">to</span>
                                </div>
                                <input type="text" id="third_term_end" name="third_term_end" class="form-control datepicker" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button id="update_session" class="btn btn-default">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>