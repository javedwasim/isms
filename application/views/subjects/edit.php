<div class="form-group row">
    <input type="hidden" name="subject_detail_id" value="<?php echo $subject_detail['id'];
    ?>">
    <label for="inputPassword" class="col-sm-4 col-form-label">Subject base</label>
    <div class="col-sm-8">
        <select class="form-control select2" name="subject_id" required>
            <option value="">Please Select</option>
            <?php foreach ($subjects as $subject): ?>
                <option value="<?php echo $subject['id'] ?>"<?php echo ($subject_detail['subject_id']==$subject['id'])?'selected':''; ?>>
                    <?php echo $subject['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Max weekly classes</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" id="max_weekly_class" name="max_weekly_class"
               value="<?php echo $subject_detail['max_weekly_class']>0?$subject_detail['max_weekly_class']:''; ?>" required>
    </div>
</div>

<div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Elective group</label>
    <div class="col-sm-8">
        <select class="form-control" name="elective_group_id">
            <option value="">Please Select</option>
            <?php foreach ($groups as $group): ?>
                <option value="<?php echo $group['id'] ?>"<?php echo ($subject_detail['elective_group_id']==$group['id'])?'selected':''; ?>>
                    <?php echo $group['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Batches</label>
    <div class="col-sm-8">
        <select class="form-control" name="batch_id">
            <option value="">Please Select</option>
            <?php foreach ($batches as $batch):$session = $batch['session']; ?>
                <option value="<?php echo $batch['id'] ?>"<?php echo ($subject_detail['batch_id']==$batch['id'])?'selected':''; ?>>
                    <?php echo $batch['code'].'-'.$batch['arm']."($session)"; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>