<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        display: none;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php //echo isset($students[0])?$students[0]['code'] . '-' . $students[0]['arm'] . '(' . $students[0]['session'] . ')':''; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">students</a></li>
                        <li class="breadcrumb-item active"><?php //echo isset($student['first_name']) && (!empty($student['first_name'])) ? $student['first_name'] . ', ' . $student['last_name'] : "" ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Score
                                        Sheet</a></li>
                                <li class="nav-item"><a class="nav-link" href="#assessments" data-toggle="tab">Assessments</a>
                                </li>

                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <?php //print_r($score_sheet); ?>
                                                        <table class="table table-bordered table-striped table-info">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="2" style="background-color: #31bc86; color: #fff"><strong>Name</strong></th>
                                                                    <?php $score_detail = explode(',',$score_term);
                                                                    foreach ($score_detail as $detail):  ?>
                                                                        <th style="background-color: #31bc86;color: #fff"><strong><?php echo $detail; ?></strong></th>
                                                                    <?php endforeach; ?>
                                                                </tr>
                                                                <tr>
                                                                    <?php $points = explode(',',$score_points); foreach ($points as $point):  ?>
                                                                        <th class="bg-gray-light"><strong><?php echo $point; ?></strong></th>
                                                                    <?php endforeach; ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($score_sheet as $sheet): ?>
                                                                    <tr>
                                                                        <th scope="row"><code><?php echo $sheet['surname'].", ".$sheet['first_name'][0].".".$sheet['last_name'][0] ?></code></th>
                                                                        <td class="is-visible">EX</td>
                                                                        <td class="is-hidden">EX</td>
                                                                        <td class="is-hidden">EX</td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="tab-pane" id="assessments">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-primary"
                                                    data-toggle="modal" data-target="#new_assessment">
                                                <i class="fa fa-plus"></i>New Assessment
                                            </button>
                                            <hr>
                                            <div id="subject_assessment">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Abbrev.</th>
                                                        <th>Name</th>
                                                        <th>P.Pnts</th>
                                                        <th>E.Pnts</th>
                                                        <th>Due Date</th>
                                                        <th>Category</th>
                                                        <th>Pb.Scores?</th>
                                                        <th>FG?</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($assessments as $assessment): ?>
                                                        <tr>
                                                            <td><?php echo $assessment['abbreviation'] ?></td>
                                                            <td><?php echo $assessment['assessment_name']; ?></td>
                                                            <td><?php echo $assessment['points']; ?></td>
                                                            <td><?php echo $assessment['extra_points']; ?></td>
                                                            <td><?php echo date('F j, Y', strtotime($assessment['due_date'])); ?></td>
                                                            <td><?php echo $assessment['cate_name']; ?></td>
                                                            <td>
                                                                <label class="switch">
                                                                    <input class="update_check" data-update="publish"
                                                                           type="checkbox"
                                                                           data-subject-id="<?php echo $assessment['id']; ?>"
                                                                        <?php echo ($assessment['publish_score'] == 1) ? 'checked' : ''; ?>>
                                                                    <span class="slider round"></span>
                                                                </label>

                                                            </td>
                                                            <td>
                                                                <label class="switch">
                                                                    <input type="checkbox" data-update="grade"
                                                                           data-subject-id="<?php echo $assessment['id']; ?>"
                                                                           class="update_check" <?php echo ($assessment['include_final_grade'] == 1) ? 'checked' : ''; ?>>
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-xs btn-success edit_assessment"
                                                                   data-href="<?php echo base_url() . "subjects/edit_assessment/" . $assessment['id']; ?>">
                                                                    Edit<i class="fa fa-edit"></i>
                                                                </a>
                                                                <a class="btn btn-xs btn-danger delete-assessment"
                                                                   data-assessment-id="<?php echo $assessment['id']; ?>"
                                                                   data-subject-detail-id="<?php echo $assessment['subject_detail_id']; ?>"
                                                                   data-href="<?php echo base_url() . "subjects/delete_assessment"; ?>">
                                                                    Delete<i class="fa fa-remove"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /row 2-->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        <!-- Modal -->
    </section>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" id="new_assessment"
     role="dialog" aria-labelledby="Save Assessment" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Save Assessment</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body edit_assessment_modal">
                <form id="subject_assessment_form" method="post" role="form"
                      data-action="<?php echo site_url('Subjects/save_assessment') ?>"
                      enctype="multipart/form-data">
                    <input type="hidden" name="subject_detail_id" value="<?php echo $subject_detail_id; ?>">
                    <div class="form-group row">
                        <label for="assessment_category_id" class="col-sm-2 col-form-label">Save Assessment
                            Category</label>
                        <div class="col-sm-10">
                            <select id="assessment_category_id" name="assessment_category_id" class="form-control">
                                <option value="">Please select</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="assessment_name" class="col-sm-2 col-form-label">Name<span
                                    style="color: red">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="assessment_name" name="assessment_name"
                                   required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="abbreviation" class="col-sm-2 col-form-label">Abbreviation<span
                                    style="color: red">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="abbreviation" name="abbreviation" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="points" class="col-sm-2 col-form-label">Possible points<span
                                    style="color: red">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="points" name="points" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="extra_points" class="col-sm-2 col-form-label">Extra points<span
                                    style="color: red">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="extra_points" name="extra_points" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="due_date" class="col-sm-2 col-form-label">Due date<span style="color: red">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="due_date" name="due_date" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="include_final_grade" class="col-sm-2 col-form-label">Include in final grade</label>
                        <div class="col-sm-10">
                            <input type="checkbox" class="form-check-input" id="include_final_grade"
                                   name="include_final_grade" value="1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="publish" class="col-sm-2 col-form-label">Publish</label>
                        <div class="col-sm-10">
                            <select id="publish" name="publish" class="form-control">
                                <option>Please Select</option>
                                <option value="immediately">Immediately</option>
                                <option value="due_date">Due Date</option>
                                <option value="days_before_due">Days Before Due</option>
                                <option value="specific_date">Specific Date</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="score_display_as" class="col-sm-2 col-form-label">Score display as</label>
                        <div class="col-sm-10">
                            <select id="score_display_as" name="score_display_as" class="form-control">
                                <option>Please Select</option>
                                <option value="points">Points</option>
                                <option value="percentage">Percentage</option>
                                <option value="letter_grade">Letter grade</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="publish_score" class="col-sm-2 col-form-label">Include in final grade</label>
                        <div class="col-sm-10">
                            <input type="checkbox" class="form-check-input" id="publish_score" name="publish_score"
                                   value="1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="save_assessment" class="btn btn-primary">
                            <i class="fa fa-plus fa-floppy-o"></i>Save
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

        $("#example1").DataTable();
        $('#due_date').datepicker({
            format: 'yyyy-mm-dd'
        });
    });
    $(document.body).on('click', '#save_assessment', function () {
        $.ajax({
            url: $('#subject_assessment_form').attr('data-action'),
            type: 'post',
            data: $('#subject_assessment_form').serialize(),
            cache: false,
            success: function (response) {
                if (response.success) {
                    $('#subject_assessment').empty();
                    $('#subject_assessment').append(response.subject_html);
                    $(".modal-backdrop").remove();
                    $('#new_assessment').modal('hide');
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }

            }
        });

        return false;
    });
    $(document.body).on('click', '.edit_assessment', function () {
        var url = $(this).attr('data-href');
        $.ajax({
            url: url,
            cache: false,
            success: function (response) {
                $('.edit_assessment_modal').empty();
                $('.edit_assessment_modal').append(response.subject_html);
                $('#new_assessment').modal('show');
            }
        });
        return false;
    });
    $(document.body).on('click', '.delete-assessment', function () {
        var assessment_id = $(this).attr('data-assessment-id');
        var subject_detail_id = $(this).attr('data-subject-detail-id');
        if (confirm('Are you sure to delete this record?')) {
            $.ajax({
                url: $(this).attr('data-href'),
                cache: false,
                type: 'post',
                data: {subject_detail_id: subject_detail_id, assessment_id: assessment_id},
                success: function (response) {
                    if (response.success) {
                        $('#subject_assessment').empty();
                        $('#subject_assessment').append(response.subject_html);
                        $(".modal-backdrop").remove();
                        $('#new_assessment').modal('hide');
                        toastr["success"](response.message);
                    } else {
                        toastr["warning"](response.message);
                    }
                }
            });
        } else {
            return false;
        }

        return false;
    });

</script>