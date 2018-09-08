<form id="grade_scale_level_edit_form" method="post" role="form"
      data-action="<?php echo site_url('grade_scale/update_scale_levels') ?>" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id" value="<?php echo $scale['id']; ?>">
    <input type="hidden" name="scale_id" id="scale_id" value="<?php echo $grade_scale_id ?>">
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Name:</label>
        <input type="text" class="form-control" name="level_name" value="<?php echo $scale['name']; ?>" required>
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Min percentage:</label>
        <input type="text" class="form-control" name="min_percentage" value="<?php echo $scale['min_percentage']; ?>" required>
    </div>
    <div class="form-group">
        <label for="message-text" class="col-form-label">Remarks:</label>
        <textarea class="form-control" name="remarks"><?php echo $scale['remarks']; ?></textarea>

    </div>
    <div class="modal-footer d-flex justify-content-center">
        <button id="update_scale_level" type="submit" class="btn btn-default">Update Scale Level</button>
    </div>
</form>