<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Subject Names</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">subject names</li>
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
              <h3 class="card-title">Listing subject names</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="subject_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              </div>
              <div id="subject_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLoginForm"><i class="fa fa-plus"></i> Add Subject Name</button>
                </div>
              </div>
              <hr>
              <table class="table table-bordered table-striped nowrap datatables" >
                <thead>
                  <tr>
                    <th>Name Abbreviation</th>
                    <th>Name</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($subjects as $subject) { ?>
                  <tr>
                    <td><?php echo $subject['code']; ?></td>
                    <td><?php echo $subject['name']; ?></td>
                    <td>
                        <a class="edit-subject btn btn-info btn-xs"
                           href="#" data-abbreviation="<?php echo $subject['code'] ?>" data-value="<?php echo $subject['name']; ?>" data-href="<?php echo $subject['id']; ?>">Edit  <i class="fa fa-edit" title="Edit"></i></a>
                        <a class="delete-class btn btn-danger btn-xs" href="#"
                           data-href="<?php echo site_url('general_setting/delete_subject/').$subject['id'] ?>">Delete  <i class="fa fa-trash" title="Delete"></i></a>
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
<div class="container">
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Add subject name</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="subject_form_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="subject_form_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <form id="subject_form" method="post" role="form"
                  data-action="<?php echo site_url('general_setting/add_subject') ?>" enctype="multipart/form-data">
                <div class="modal-body mx-3">
                    <div class="md-form mb-3">
                        <input type="text" id="defaultForm-name" name="name" class="form-control validate" placeholder="Subject Name" required>
                    </div>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <input type="text" id="defaultForm-abbr"  name="code" class="form-control validate" placeholder="Abbreviation" required>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id="save_subject" type="submit" class="btn btn-default">Create Subject</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="subject_update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Update Subject</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="subject_update_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="subject_update_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <form id="subject_update_form" method="post" role="form"
                  data-action="<?php echo site_url('general_setting/update_subject') ?>" enctype="multipart/form-data">
                <input type="hidden" id="subject_id" name="subject_id">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" id="subject_name" name="name" class="form-control validate" placeholder="Subject Name">
                    </div>
                    <div class="form-group">
                        <input type="text" id="subject_code" name="code" class="form-control validate" placeholder="Class Abbrevation">
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id="update_subject" type="submit" class="btn btn-default">Update Subject</button>
                </div>
            </form>
        </div>
    </div>
</div>