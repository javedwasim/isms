<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Compose SMS</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Compose SMS</li>
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
                        <div class="card-header">
                            <h3 class="card-title">SMS</h3>
                        </div>

                        <?php if ($this->session->flashdata('errors')!=='') { ?>
                            <span class="label label-danger"><?php print_r($this->session->flashdata('errors')); ?></span>

                        <?php } ?>
                        <!-- /.card-header -->
                        <form id="sms_form" method="post" role="form"
                              data-action="<?php echo site_url('sms/send_sms') ?>" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="title" class="col-sm-4 col-form-label">Sender Name<span style="color: red;">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="sender_name" value="<?php echo isset($event['title'])?$event['title']:''; ?>"
                                                               name="sender_name" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="start" class="col-sm-4 col-form-label">Recipients<span style="color: red;">*</span></label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control select2 sms-select2" multiple="" name="recipients[]">
                                                            <option value="selected_students">Selected students</option>
                                                            <option value="selected_students_guardians">Selected student's guardians</option>
                                                            <option value="selected_guardians">Selected guardians</option>
                                                            <option value="selected_employees">Selected employees</option>
                                                            <option value="mobile_numbers">Mobile numbers</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="description" class="col-sm-4 col-form-label">
                                                        Mobile numbers - <small>separate with commas</small>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <textarea  class="form-control" id="mobile_numbers" name="mobile_numbers" rows="2"><?php echo isset($event['description'])?$event['description']:''; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="description" class="col-sm-4 col-form-label">Message</label>
                                                    <div class="col-sm-8">
                                                        <textarea  class="form-control" id="message" name="message" rows="5"><?php echo isset($event['description'])?$event['description']:''; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer" style="text-align: center">
                                    <button type="submit" id="send_message" class="btn btn-primary">
                                        Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </div>
    </section>
</div>
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
</script>        
