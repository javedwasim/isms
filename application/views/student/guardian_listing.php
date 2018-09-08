<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Search</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">guardian search</li>
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
                    <div id="student_error" style="display: none;" class="alert alert-danger alert-dismissible"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="student_success" style="display: none;" class="alert alert-success alert-dismissible"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Guardians</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form rol="form" style="width: 100%;" id="guardian_form_filters" >
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Search</label>
                                            <input type="text" name="search-guardian" class="form-control"
                                                   value="<?php echo isset($filters['search-guardian']) ? $filters['search-guardian'] : ''; ?>"
                                                   onchange="guardian_filters()">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status"
                                                    onchange="guardian_filters()">
                                                <option value="">Please select</option>
                                                <option value="1">Active</option>
                                                <option value="0">Left institution</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control" name="gender" onchange="guardian_filters()">
                                                <option value="">Please select</option>
                                                <option value="male"<?php echo isset($filters['gender']) && (($filters['gender'] == 'male')) ? 'selected' : ''; ?>>Male</option>
                                                <option value="female"<?php echo isset($filters['gender']) && (($filters['gender'] == 'female')) ? 'selected' : ''; ?>>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Date Added</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="created_at" onchange="guardian_filters()"
                                                   name="created_at" value="<?php echo isset($filters['created_at'])? $filters['created_at'] : ''; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Date of Birth</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                            <input type="text" class="form-control datepicker" id="emp-li-doj">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Show more fields</label>
                                            <select class="form-control select2" multiple="multiple"
                                                    data-placeholder="Show more fields" style="width: 100%;">
                                                <option value="AL">Employee no</option>
                                                <option value="WY">Department</option>
                                                <option value="WY">Category</option>
                                                <option value="WY">Position</option>
                                                <option value="WY">Joining date</option>
                                                <option value="WY">Date left</option>
                                                <option value="WY">Date of birth</option>
                                                <option value="WY">Blood group</option>
                                                <option value="WY">Religion</option>
                                                <option value="WY">Registration started</option>
                                                <option value="WY">Last updated</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info"><i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr/>
                            <table id="guardian-table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Ward</th>
                                    <th> Activated at</th>
                                    <th data-orderable="false">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($guardians as $guardian) { ?>
                                    <tr>
                                        <td>
                                            <a class="prof-link"
                                               href="<?php echo site_url('guardians/guardian_profile/') . $guardian['guardian_id'] ?>">
                                                <?php echo $guardian['surname'] . ', ' . $guardian['first_name'] . '(' . $guardian['guardian_id'] . ')' ?></a>
                                        </td>
                                        <td>
                                            <p>
                                                <?php echo $guardian['st_name']; ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p> <?php echo $guardian['activated_at'] ?></p>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-user-plus"></i>
                                                Select</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <?php $message = $this->session->flashdata('success'); if(!empty($message)): ?>
        <script>
            $(document).ready(function(){
                toastr["success"]('<?php echo $message ?>');
            });
        </script>
    <?php endif; ?>
    <?php $message = $this->session->flashdata('error'); if(!empty($message)): ?>
        <script>
            $(document).ready(function(){
                toastr["warning"]('<?php echo $message ?>');
            });
        </script>
    <?php endif; ?>
</div>


<script>
    $(document).ready(function(){
        $('#created_at').datepicker({
            format: 'yyyy-mm-dd'
        });
    });

    function guardian_filters(){
        $.ajax({
            url: '/isms/guardians/guardian_filters',
            data: $('#guardian_form_filters').serialize(),
            type: 'post',
            cache: false,
            success: function(response) {
                if(response.guardian_html != ''){
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.guardian_html);
                    $('#guardian-table').DataTable();
                    $('.select2').select2();
                    $('#title').html('Guardian Listing | ISMS');

                }
            }
        });
    }
</script>