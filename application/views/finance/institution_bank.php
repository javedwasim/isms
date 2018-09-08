<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Institution Bank Accounts</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">institution bank accounts</li>
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
                    <div id="account_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="account_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Listing Institution Bank Accounts</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">  
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#institute_account"><i class="fa fa-plus"></i>New Bank Account</a>
                                </div>
                            </div>
                            <table id="account-table" class="table table-bordered table-striped datatables" width="100%">
                                <thead>
                                <tr>
                                    <th>Bank</th>
                                    <th>Account Name</th>
                                    <th>Account No.</th>
                                    <th data-orderable="false">Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($accounts as $account){ ?>
                                        <tr>
                                            <td><?php echo $account['bank_name']; ?></td>
                                            <td><?php echo $account['account_name']; ?></td>
                                            <td><?php echo $account['account_number']; ?></td>
                                            <td>
                                                <a class="edit-account btn btn-info btn-xs"
                                                   bank-name="<?php echo $account['bank_name']; ?>"
                                                   data-href="<?php echo $account['id']; ?>"
                                                   href="javascript:void(0)"
                                                   account-name="<?php echo $account['account_name']; ?>"
                                                   account-number="<?php echo $account['account_number']; ?>">
                                                    Edit<i class="fa fa-edit" title="Edit"></i></a>
                                                <a class="delete-account btn btn-danger btn-xs" href="#"
                                                   data-href="<?php echo site_url('finance/delete_account/').$account['id'] ?>">Delete  <i class="fa fa-trash" title="Delete"></i></a>
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
<!-- /.content -->
<div class="modal fade" id="institute_account" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">New Institution Bank Account</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="employee_position_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="employee_position_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <form id="institution_bank_account_form" method="post" role="form"
                  data-action="<?php echo site_url('finance/add_bank_institution') ?>" enctype="multipart/form-data">
                <div class="modal-body mx-3">
                    <div class="mb-6">
                        <label>Bank</label>
                        <select class="mdb-select form-control colorful-select dropdown-primary" name="bank_name">
                            <option value="">Please Select</option>
                            <option value="1">Access Bank Plc</option>
                            <option value="2">Citibank Nigeria Limited</option>
                            <option value="3">Diamond Bank Plc</option>
                            <option value="4">Ecobank Nigeria Plc</option>
                            <option value="5">Enterprise Bank</option>
                            <option value="6">Fidelity Bank Plc</option>
                            <option value="7">First Bank of Nigeria Plc</option>
                            <option value="8">First City Monument Bank Plc</option>
                            <option value="9">Guaranty Trust Bank Plc</option>
                            <option value="10">Heritage Banking Company Ltd.</option>
                            <option value="11">Key Stone Bank</option>
                            <option value="12">MainStreet Bank</option>
                            <option value="13">Skye Bank Plc</option>
                            <option value="14">Stanbic IBTC Bank Ltd.</option>
                            <option value="15">Standard Chartered Bank Nigeria Ltd.</option>
                            <option value="16">Sterling Bank Plc</option>
                            <option value="17">Union Bank of Nigeria Plc</option>
                            <option value="18">United Bank For Africa Plc</option>
                            <option value="19">Unity Bank Plc</option>
                            <option value="20">Wema Bank Plc</option>
                            <option value="21">Zenith Bank Plc</option>
                        </select>
                    </div>
                    <div class="md-form mb-6">
                        <input type="text" id="account-name" name="account_name" class="form-control validate">
                        <label><code>*</code>Account Name</label>
                    </div>
                    <div class="md-form mb-6">
                        <input type="text"  name="account_number" class="form-control validate" >
                        <label><code>*</code>Account number</label>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id="save_account" type="submit" class="btn btn-default">Create Bank Account</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="upadate_institute_account" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Edit Institution Bank Account</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="account_update_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                    <div id="account_update_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <form id="institution_bank_account_update_form" method="post" role="form"
                  data-action="<?php echo site_url('finance/update_bank_institution') ?>" enctype="multipart/form-data">
                <input type="hidden" id="account_id" name="account_id">
                <div class="modal-body mx-3">
                    <div class="mb-6">
                        <label>Bank</label>
                        <select class="mdb-select form-control colorful-select dropdown-primary" id="bank_name" name="bank_name">
                            <option value="">Please Select</option>
                            <option value="1">Access Bank Plc</option>
                            <option value="2">Citibank Nigeria Limited</option>
                            <option value="3">Diamond Bank Plc</option>
                            <option value="4">Ecobank Nigeria Plc</option>
                            <option value="5">Enterprise Bank</option>
                            <option value="6">Fidelity Bank Plc</option>
                            <option value="7">First Bank of Nigeria Plc</option>
                            <option value="8">First City Monument Bank Plc</option>
                            <option value="9">Guaranty Trust Bank Plc</option>
                            <option value="10">Heritage Banking Company Ltd.</option>
                            <option value="11">Key Stone Bank</option>
                            <option value="12">MainStreet Bank</option>
                            <option value="13">Skye Bank Plc</option>
                            <option value="14">Stanbic IBTC Bank Ltd.</option>
                            <option value="15">Standard Chartered Bank Nigeria Ltd.</option>
                            <option value="16">Sterling Bank Plc</option>
                            <option value="17">Union Bank of Nigeria Plc</option>
                            <option value="18">United Bank For Africa Plc</option>
                            <option value="19">Unity Bank Plc</option>
                            <option value="20">Wema Bank Plc</option>
                            <option value="21">Zenith Bank Plc</option>
                        </select>
                    </div>
                    <div class="md-form mb-6">
                        <input type="text" id="account_name" name="account_name" class="form-control validate">
                    </div>
                    <div class="md-form mb-6">
                        <input type="text" id="account_number"  name="account_number" class="form-control validate" >
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id="update_account" type="submit" class="btn btn-default">Update Bank Account</button>
                </div>
            </form>
        </div>
    </div>
</div>