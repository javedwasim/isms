<form id="grade_scale_update_form" method="post" role="form"
      data-action="<?php echo site_url('grade_scale/update_scale') ?>" enctype="multipart/form-data">
    <input type="hidden" name="scale_id" value="<?php echo $scale['id']; ?>">
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Name:</label>
        <input type="text" class="form-control"  name="name" value="<?php echo $scale['name']; ?>" required>
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Grade scale type:</label>
        <select class="custom-select custom-select-lg mb-3" name="type">
            <option value="">Please Select</option>
            <option value="cognitive"<?php echo $scale['type']=='cognitive'?'selected':''; ?>>Cognitive</option>
            <option value="behavioural"<?php echo $scale['type']=='behavioural'?'selected':''; ?>>Behavioural</option>
        </select>
    </div>
    <div class="form-group">
        <label for="message-text" class="col-form-label">Description:</label>
        <textarea class="form-control" name="description"><?php echo $scale['description']; ?></textarea>
    </div>
    <div class="modal-footer d-flex justify-content-center">
        <button id="update_scale" type="submit" class="btn btn-default">Update Scale</button>
    </div>
</form>