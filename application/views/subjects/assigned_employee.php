<input type="hidden" name="subject_detail_id" id="subject_detail_id" value="<?php echo $subject_detail_id; ?>">
<?php if($assigned_employee):
    foreach ($assigned_employee as $e): ?>
    <div class="form-row">
        <div class="form-group col-md-4">
            <select id="employee" name="employee[]" class="form-control">
                <option selected="">Please Select</option>
                <?php foreach ($employees as $employee): ?>
                    <option value="<?php echo $employee['employee_id']; ?>"
                        <?php echo ($e['employee_id']==$employee['employee_id'])?"selected":''; ?>><?php echo $employee['first_name'].' '.$employee['surname'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <select id="role" name="role[]" class="form-control">
                <option selected="">Please Select</option>
                <option value="1"<?php echo ($e['role_id']==1)?"selected":''; ?>>Class Teacher</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <a class="btn btn-danger btn-sm remove_button" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
        </div>
    </div>
<?php endforeach;  else: ?>
    <div class="form-row">
        <div class="form-group col-md-4">
            <select id="employee" name="employee[]" class="form-control">
                <option selected="">Please Select</option>
                <?php foreach ($employees as $employee): ?>
                    <option value="<?php echo $employee['employee_id']; ?>"><?php echo $employee['first_name'].' '.$employee['surname'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <select id="role" name="role[]" class="form-control">
                <option selected="">Please Select</option>
                <option value="1">Class Teacher</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
        </div>
    </div>
<?php  endif; ?>