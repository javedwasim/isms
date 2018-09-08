<table id="account-table" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Name</th>
        <th>Abbreviation</th>
        <th>Description</th>
        <th data-orderable="false">Operations</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($indicators as $indicator){ ?>
    <tr>
        <td><?php echo $indicator['name'] ?></td>
        <td><?php echo $indicator['code'] ?></td>
        <td><?php echo $indicator['description'] ?></td>
        <td>
            <a class="edit-domain-group-indicator btn btn-info btn-xs"
               data-name="<?php echo $indicator['name']; ?>"
               href="javascript:void(0)"
               data-code="<?php echo $indicator['code'] ?>"
               data-description="<?php echo $indicator['description'] ?>"
               data-domain-id="<?php echo isset($domain_id)?$domain_id:''; ?>"
               data-href="<?php echo $indicator['id']; ?>">Edit  <i class="fa fa-edit" title="Edit"></i></a>
            <a class="delete-domain-group-indicator btn btn-danger btn-xs" href="javascript:void(0)"
               data-domain-id="<?php echo isset($domain_id)?$domain_id:''; ?>"
               data-delete-id="<?php echo $indicator['id']; ?>"
               data-href="<?php echo site_url('domains/delete_domain_indicator') ?>">Delete  <i class="fa fa-trash" title="Delete"></i></a>
        </td>
    </tr>
    <?php } ?>
    </tbody>
</table>