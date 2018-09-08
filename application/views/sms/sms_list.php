<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Listing Sms</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sms</li>
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
                            <h3 class="card-title">Sms</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="javascript:void(0)" data-href="<?php echo base_url()."sms/add_sms"; ?>"
                                       class="btn btn-primary add-sms btn-sm pull-right">
                                       <i class="fa fa-bullhorn"></i>Compose new SMS
                                    </a>
                                </div>
                            </div>
                            <hr/>
                            <table id="sms_table" class="table table-bordered table-striped nowrap"
                                   style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>Sender Name</th>
                                    <th>Message</th>
                                    <th>Recipients</th>
                                    <th>Units Used</th>
                                    <th>Created by</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($messages as $message): ?>
                                        <tr>
                                            <td><?php echo $message['sender_name']; ?></td>
                                            <td><?php echo $message['message']; ?></td>
                                            <td><?php echo $message['recipients']; ?></td>
                                            <td>&nbsp;</td>
                                            <td><?php echo $message['created_by']; ?></td>
                                            <td><?php echo 'sent'; ?></td>
                                            <td>
                                                <a href="javascript:void(0)" data-href="<?php echo base_url()."sms/sms_view"; ?>"
                                                   data-sms-id="<?php echo $message['id']; ?>" class="btn btn-primary btn-xs sms_view">
                                                   <i class="fa fa-folder-open"></i>Open
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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
</div>
<script>
    $(document).ready(function(){
        $('.select2').select2();
        $(".sms-select2").on("select2:select select2:unselect", function (e) {

            var selections = ( JSON.stringify($(test).select2('data')) );
            //console.log('Selected IDs: ' + ids);
            console.log('Selected options: ' + selections);
        });
        <?php if (!empty($this->session->flashdata('errors'))) { ?>
            toastr["warning"]('<?php echo $this->session->flashdata('errors'); ?>');
        <?php }elseif(!empty($this->session->flashdata('success'))){ ?>
            toastr["success"]('<?php echo $this->session->flashdata('success'); ?>');
        <?php } ?>
	
	    $("#sms_table").DataTable({});
    });
</script>