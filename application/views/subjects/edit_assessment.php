<form id="subject_assessment_form" method="post" role="form"
      data-action="<?php echo site_url('Subjects/save_assessment') ?>"
      enctype="multipart/form-data">
    <input type="hidden" name="subject_assessment_id" value="<?php echo $subject_assessment_id; ?>">
    <input type="hidden" name="subject_detail_id" value="<?php echo $assessment['subject_detail_id']; ?>">
    <div class="form-group row">
        <label for="assessment_category_id" class="col-sm-2 col-form-label">Save Assessment Category</label>
        <div class="col-sm-10">
            <select id="assessment_category_id" name="assessment_category_id" class="form-control">
                <option value="">Please select</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['id']; ?>"<?php echo ($assessment['assessment_category_id']==$category['id'])?'selected':''; ?>>
                        <?php echo $category['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="assessment_name" class="col-sm-2 col-form-label">Name<span style="color: red">*</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="assessment_name" name="assessment_name"
                   value="<?php echo $assessment['assessment_name']; ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="abbreviation" class="col-sm-2 col-form-label">Abbreviation<span style="color: red">*</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="abbreviation" name="abbreviation"
                   value="<?php echo $assessment['abbreviation']; ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="points" class="col-sm-2 col-form-label">Possible points<span style="color: red">*</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="points" name="points"
                   value="<?php echo $assessment['points']; ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="extra_points" class="col-sm-2 col-form-label">Extra points<span style="color: red">*</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="extra_points" name="extra_points"
                   value="<?php echo $assessment['extra_points']; ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="due_date" class="col-sm-2 col-form-label">Due date<span style="color: red">*</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="due_date" name="due_date"
                   value="<?php echo $assessment['due_date']; ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="include_final_grade" class="col-sm-2 col-form-label">Include in final grade</label>
        <div class="col-sm-10">
            <input type="checkbox" class="form-check-input" id="include_final_grade"
                   name="include_final_grade" value="1" <?php echo $assessment['include_final_grade']==1?'checked':''; ?>>
        </div>
    </div>
    <div class="form-group row">
        <label for="publish" class="col-sm-2 col-form-label">Publish</label>
        <div class="col-sm-10">
            <select id="publish" name="publish" class="form-control">
                <option>Please Select</option>
                <option value="immediately"<?php echo ($assessment['publish']=='immediately')?'selected':''; ?>>Immediately</option>
                <option value="due_date"<?php echo ($assessment['publish']=='due_date')?'selected':''; ?>>Due Date</option>
                <option value="days_before_due"<?php echo ($assessment['publish']=='days_before_due')?'selected':''; ?>>Date Before Due</option>
                <option value="specific_date"<?php echo ($assessment['publish']=='specific_date')?'selected':''; ?>>Specific Date</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="publish" class="col-sm-2 col-form-label">Score display as</label>
        <div class="col-sm-10">
            <select id="publish" name="score_display_as" class="form-control">
                <option>Please Select</option>
                <option value="points"<?php echo ($assessment['score_display_as']=='points')?'selected':''; ?>>Points</option>
                <option value="percentage"<?php echo ($assessment['score_display_as']=='percentage')?'selected':''; ?>>Percentage</option>
                <option value="letter_grade"<?php echo ($assessment['score_display_as']=='letter_grade')?'selected':''; ?>>Letter grade</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="publish_score" class="col-sm-2 col-form-label">Include in final grade</label>
        <div class="col-sm-10">
            <input type="checkbox" class="form-check-input" id="publish_score"
                   name="publish_score" value="1" <?php echo $assessment['publish_score']==1?'checked':''; ?>>
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="description" name="description" rows="5"><?php echo $assessment['description']; ?></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" id="save_assessment" class="btn btn-primary">
            <i class="fa fa-plus fa-floppy-o"></i>Save</button>

    </div>
</form>