<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0 text-dark">Student Categories</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">student categories</li>
           </ol>
         </div><!--.col ----->
       </div><!-- .row ---->
     </div><!-- .container-fluid -->
   </div>

   <!-- /.content-header -->
   <section class="content">
     <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
             <div class="card-header">
               <h3 class="card-title">Listing Student Categories</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLoginForm"><i class="fa fa-plus"></i>New Student Category</button>
                </div>
              </div>
              <hr>
              <table class="table table-bordered table-striped nowrap datatables" >
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($categories as $category){ ?>
                      <tr>
                        <td><?php echo $category['category']; ?></td>
                        <td>
                          <a href="javascript:void(0)" class="btn btn-success btn-xs" id="<?php echo $category['category']; ?>" onclick="save_category(<?php echo $category['id']; ?>,'<?php echo $category["category"]; ?>')"><i class="fa fa-edit"></i> Edit</a>
<!--                          <a href="javascript:void(0)" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>-->
                          <a class="delete-student_cate btn btn-danger btn-xs" href="javascript:void(0)" data-href="<?php echo site_url('student_setting/delete_category/').$category['id'] ?>">Delete  <i class="fa fa-trash" title="Delete"></i></a>
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
  <div class="container">
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Student Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="student_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="student_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>

            </div>
            <form id="category_form" method="post" role="form" data-action="<?php echo site_url('student_setting/add_student_category') ?>" enctype="multipart/form-data">

                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <input type="text" id="category" name="category" value="" class="form-control validate" placeholder="Category Name">
<!--                        <label data-error="wrong" data-success="right" for="defaultForm-name"><code>*</code>Name</label>-->
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id="save_cat" type="submit" class="btn btn-default">Create Student Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

  <div class="container">
        <div class="modal fade" id="updateCategoryForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Student Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="student_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            </div>
                            <div id="student_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            </div>
                        </div>

                    </div>
                    <form id="update_category_form" method="post" role="form" data-action="<?php echo site_url('student_setting/update_student_category') ?>" enctype="multipart/form-data">
                        <input type="hidden" id="category_id" name="category_id" value="">
                        <input type="hidden" id="data_action" name="data_action" value="<?php echo site_url('student_setting/update_student_category') ?>">
                        <div class="modal-body mx-3">
                            <div class="md-form mb-5">
                                <input type="text" id="category_value" name="category" value="" class="form-control validate" placeholder="Category Name">
                                <!--                        <label data-error="wrong" data-success="right" for="defaultForm-name"><code>*</code>Name</label>-->
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button id="update_cat" type="submit" class="btn btn-default">Update Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>