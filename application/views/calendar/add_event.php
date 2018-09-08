<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Save Event</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add new Event</li>
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
                    <div class="card card-primary">
                        <?php if ($this->session->flashdata('errors')!=='') { ?>
                           <span class="label label-danger"><?php print_r($this->session->flashdata('errors')); ?></span> 
                           <hr>
                        <?php } ?>
                        <div class="card-header">
                            <h3 class="card-title">Event</h3>
                        </div>
                        <!-- /.card-header -->
                        <form id="calendar_event_form" method="post" role="form" action="<?php echo site_url('calendar/save_event') ?>"
                                                data-action="<?php echo site_url('batches/assign_employees') ?>"
                                                enctype="multipart/form-data">
                            <input type="hidden" name="event_id" value="<?php echo isset($event['id'])?$event['id']:''; ?>" >
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                              <h3 class="card-title">Event Form</h3>
                                            </div>
                                            <div class="card-body">
                                              <div class="form-group row">
                                                <label for="title" class="col-sm-4 col-form-label">Title<span style="color: red;">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="title" value="<?php echo isset($event['title'])?$event['title']:''; ?>"
                                                           name="title" placeholder="Title" required="">
                                                </div>  
                                              </div>
                                              <div class="form-group row">
                                                <label for="start" class="col-sm-4 col-form-label">Start time<span style="color: red;">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="start" value="<?php echo isset($event['start'])?$event['start']:''; ?>"
                                                           name="start" placeholder="Start Time" required="">
                                                </div>  
                                              </div>
                                              <div class="form-group row">
                                                <label for="end" class="col-sm-4 col-form-label">End time<span style="color: red;">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="end" value="<?php echo isset($event['end'])?$event['end']:''; ?>"
                                                           name="end" placeholder="End Time" required="">
                                                </div>  
                                              </div>
                                              <div class="form-group row">
                                                <label for="is_holiday" class="col-sm-4 col-form-label">Is holiday?</label>
                                                <div class="col-sm-8">
                                                    <input type="checkbox" class="form-control checkbox" id="is_holiday" <?php echo isset($event['is_holiday'])&&($event['is_holiday']==1)?'checked':''; ?>
                                                           name="is_holiday" value="1">
                                                </div>  
                                              </div>
                                              <div class="form-group row">
                                                <label for="is_common" class="col-sm-4 col-form-label">Common to all?</label>
                                                <div class="col-sm-8">
                                                    <input type="checkbox" class="form-control checkbox" id="is_common" <?php echo isset($event['is_common'])&&($event['is_common']==1)?'checked':''; ?>
                                                           name="is_common" value="1">
                                                </div>  
                                              </div>
                                              <div class="form-group row">
                                                <label for="description" class="col-sm-4 col-form-label">Description</label>
                                                <div class="col-sm-8">
                                                    <textarea  class="form-control" id="description" name="description" rows="5"><?php echo isset($event['description'])?$event['description']:''; ?></textarea>
                                                </div>  
                                              </div>

                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                    <?php if(!isset($event) && !empty($event)){ ?>
                                        <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header" data-toggle="collapse" href="#classGroup" role="button" aria-expanded="false" aria-controls="classGroup">
                                                <h3 class="card-title">Select Class Event Groups</a></h3>
                                            </div>
                                            <div class="card-body collapse show" id="classGroup">
                                               <?php foreach ($classes as $class): ?>
                                                    <div class="form-group row">
                                                        <div class="col-sm-2">
                                                            <input type="checkbox" class="form-control checkbox" id="<?php echo "class_group".$class['id']; ?>" name="class_group[]" value="<?php echo "class-".$class['id']; ?>">
                                                        </div>  
                                                        <label for="<?php echo "class_group".$class['id']; ?>" class="col-sm-10 col-form-label"><?php echo $class['name']; ?></label>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-header" data-toggle="collapse" href="#studentCategory" role="button" aria-expanded="false" aria-controls="studentCategory">
                                              <h3 class="card-title">Student Category</h3>
                                            </div>
                                            <div class="card-body collapse show" id="studentCategory">
                                               <?php foreach ($categories as $category): ?>
                                                    <div class="form-group row">
                                                        <div class="col-sm-2">
                                                            <input type="checkbox" class="form-control checkbox" id="<?php echo "student_category".$class['id']; ?>" name="student_category[]" value="<?php echo "category-".$category['id']; ?>">
                                                        </div>  
                                                        <label for="<?php echo "student_category".$category['id']; ?>" class="col-sm-10 col-form-label"><?php echo $category['category']; ?></label>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            
                                            <div class="card-header" data-toggle="collapse" href="#employeeCategory" role="button" aria-expanded="false" aria-controls="employeeCategory">
                                              <h3 class="card-title">Employee Category</h3>
                                            </div>
                                            <div class="card-body collapse show" id="employeeCategory">
                                               <?php foreach ($ecategories as $category): ?>
                                                    <div class="form-group row">
                                                        <div class="col-sm-2">
                                                            <input type="checkbox" class="form-control checkbox" id="<?php echo "employee_category".$class['id']; ?>" name="employee_category[]" value="<?php echo "ecategory-".$category['id']; ?>">
                                                        </div>  
                                                        <label for="<?php echo "employee_category".$category['id']; ?>" class="col-sm-10 col-form-label"><?php echo $category['category']; ?></label>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            
                                            <div class="card-header" data-toggle="collapse" href="#employeeDepartment" role="button" aria-expanded="false" aria-controls="employeeDepartment">
                                              <h3 class="card-title">Employee Department</h3>
                                            </div>
                                            <div class="card-body collapse show" id="employeeDepartment">
                                               <?php foreach ($departments as $department): ?>
                                                    <div class="form-group row">
                                                        <div class="col-sm-2">
                                                            <input type="checkbox" class="form-control checkbox" id="<?php echo "employee_department".$department['id']; ?>" name="employee_department[]" value="<?php echo "edepartment-".$department['id']; ?>">
                                                        </div>  
                                                        <label for="<?php echo "employee_department".$category['id']; ?>" class="col-sm-10 col-form-label"><?php echo $department['name']; ?></label>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <div class="card-header" data-toggle="collapse" href="#employeePosition" role="button" aria-expanded="false" aria-controls="employeePosition">
                                              <h3 class="card-title">Employee Positions</h3>
                                            </div>
                                            <div class="card-body collapse show" id="employeePosition">
                                               <?php foreach ($positions as $position): ?>
                                                    <div class="form-group row">
                                                        <div class="col-sm-2">
                                                            <input type="checkbox" class="form-control checkbox" id="<?php echo "employee_position".$position['id']; ?>" name="employee_position[]" value="<?php echo "eposition-".$position['id']; ?>">
                                                        </div>  
                                                        <label for="<?php echo "employee_position".$position['id']; ?>" class="col-sm-10 col-form-label"><?php echo $position['name']; ?></label>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                  </div>
                                <div class="card-footer" style="text-align: center">
                                    <button type="submit" id="save_calendar_event" class="btn btn-primary">
                                        <i class="fa fa-floppy-o"></i>Save Event</button>
                                </div>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
</div>
<script>
    $(document).ready(function(){
          
          $('#start').datepicker({
              format: 'yyyy-mm-dd'
          });
          $('#end').datepicker({
              format: 'yyyy-mm-dd'
          });
    });      
</script>        
