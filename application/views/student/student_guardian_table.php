<table id="guardian_table" class="table table-bordered table-striped datatables">
    <thead>
    <tr>
        <th>Name</th>
        <th>Mobile</th>
        <th>Phone</th>
        <th>Email</th>
        <th data-orderable="false">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($guardians as $guardian){ ?>
        <tr>
            <td>
                <?php echo $guardian['surname'].', '.$guardian['first_name'].'('.$guardian['guardian_id'].')' ?>
            </td>
            <td><?php echo $guardian['mobile_phone']; ?></td>
            <td><?php echo $guardian['phone']; ?></td>
            <td><?php echo $guardian['email']; ?></td>
            <td>
                <a href="javascript:void(0)"
                   data-guardian-id = "<?php echo $guardian['guardian_id']; ?>"
                   data-student-id = "<?php echo $student_id ?>"
                   data-href = "<?php echo site_url('students/unassign_guardian/'); ?>"
                   class="<?php echo $guardian['student_id']>0?"btn btn-danger btn-xs unassign-guardian":"btn btn-primary btn-xs assign-guardian" ?>"><i class="fa fa-user-plus"></i>
                   <?php echo $guardian['student_id']>0?"Unassigned":"Assign Guardian" ?></a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>