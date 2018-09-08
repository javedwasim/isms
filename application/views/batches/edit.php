<div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Arm<span style="color: red">*</span></label>
    <div class="col-sm-10">
        <input type="hidden" id="id" name="id"
               value="<?php echo isset($batch['id'])?$batch['id']:''; ?>">
        <input type="text" class="form-control" id="arm" name="arm"
               value="<?php echo isset($batch['arm'])?$batch['arm']:''; ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Course</label>
    <div class="col-sm-10">
        <select class="form-control" name="course_id">
            <option value="">Please Select</option>
            <?php foreach ($classes as $class): ?>
                <option value="<?php echo $class['id'] ?>"
                    <?php echo $class['id']==$batch['course_id']?'selected':''; ?>><?php echo $class['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Academic session</label>
    <div class="col-sm-10">
        <select class="form-control" name="session">
            <option value="">Please Select</option>
            <?php foreach ($sessions as $session): ?>
                <option value="<?php echo $session['name'] ?>"
                    <?php echo $session['name']==$batch['session']?'selected':''; ?>><?php echo $session['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>